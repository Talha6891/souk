<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $breadcrumbs = [
            ['url' => route('dashboard'), 'title' => 'Home'],
            ['url' => route('users.index'), 'title' => 'Users'],
        ];

        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');

        $users = QueryBuilder::for(User::class)
            ->allowedSorts(['first_name', 'last_name', 'whatsapp_no', 'email', 'store_name', 'verified', 'bank_name', 'iban_number', 'branch_code', 'city', 'referral_code', 'country_id'])
            ->where(function ($query) use ($q) {
                $query->where('first_name', 'like', "%$q%")
                    ->orWhere('last_name', 'like', "%$q%")
                    ->orWhere('email', 'like', "%$q%")
                    ->orWhere('store_name', 'like', "%$q%")
                    ->orWhere('bank_name', 'like', "%$q%")
                    ->orWhere('iban_number', 'like', "%$q%")
                    ->orWhere('branch_code', 'like', "%$q%")
                    ->orWhere('city', 'like', "%$q%")
                    ->orWhere('referral_code', 'like', "%$q%");
            })
            ->WithoutAuthUser()
            ->WithoutSuperAdmin()
            ->with('country')
            ->with('roles')
            ->latest()
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);

        return view('users.index', compact('users', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $countries = Country::all();
        $roles = Auth::user()->hasRole('super-admin') ? Role::all() : Role::where('name', '!=', 'super-admin')->get();
        $breadcrumbs = [
            ['url' => route('dashboard'), 'title' => 'Home'],
            ['url' => route('users.index'), 'title' => 'Users'],
        ];

        return view('users.create', compact('breadcrumbs', 'countries', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        // Validate and hash the password and find role
        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);
        $role = Role::find($validated['role_id']);

        $user = User::create(Arr::except($validated, 'role_id'));
        $user->assignRole($role);

        return to_route('users.index')->with('message', 'User Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        $breadcrumbs = [
            ['url' => route('dashboard'), 'title' => 'Home'],
            ['url' => route('users.index'), 'title' => 'Users'],
        ];

        $user->load('country', 'roles');

        return view('users.show', compact('breadcrumbs', 'user'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        $roles = Role::all();
        $countries = Country::all();
        $breadcrumbs = [
            ['url' => route('dashboard'), 'title' => 'Home'],
            ['url' => route('users.index'), 'title' => 'Users'],
        ];
        $user->load('country', 'roles');

        return view('users.edit', compact('breadcrumbs', 'user', 'roles', 'countries'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // Validate find role
        $validated = $request->validated();
        $role = Role::find($validated['role_id']);
        $user->update(Arr::except($validated, 'role_id'));

        $user->syncRoles([$role]);

        return to_route('users.index')->with('message', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return to_route('users.index')->with('message', 'User Deleted Successfully');
    }
}
