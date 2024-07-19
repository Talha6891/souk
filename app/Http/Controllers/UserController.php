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

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class,'user');
    }

    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $users = User::with('country')->paginate(10);
        $breadcrumbs = [
            ['url' => route('dashboard'), 'title' => 'Home'],
            ['url' => route('users.index'), 'title' => 'Users'],
        ];
        return view('users.index', compact('users','breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $countries = Country::all();
        $roles = Auth::user()->hasRole('super-admin') ? Role::all() : Role::where('name', '!=', 'super-admin')->get();
        $breadcrumbs = [
            ['url' => route('dashboard'), 'title' => 'Home'],
            ['url' => route('users.index'), 'title' => 'Users'],
        ];
        return view('users.create', compact('breadcrumbs','countries','roles'));
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
    public function show(User $user) : View

    {
        $breadcrumbs = [
            ['url' => route('dashboard'), 'title' => 'Home'],
            ['url' => route('users.index'), 'title' => 'Users'],
        ];

        $user->load('country', 'roles');
        return view('users.show', compact('breadcrumbs','user'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user) : View
    {
        $roles = Role::all();
        $countries = Country::all();
        $breadcrumbs = [
            ['url' => route('dashboard'), 'title' => 'Home'],
            ['url' => route('users.index'), 'title' => 'Users'],
        ];
        $user->load('country', 'roles');

        return view('users.edit', compact('breadcrumbs','user','roles','countries'));

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
