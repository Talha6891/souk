<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
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

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $breadcrumbs = [
            ['url' => route('dashboard'), 'title' => 'Home'],
            ['url' => route('clients.index'), 'title' => 'Clients'],
        ];

        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');

        $clients = QueryBuilder::for(Client::class)
            ->allowedSorts(['first_name', 'last_name', 'whatsapp_no', 'email', 'store_name', 'verified', 'bank_name', 'iban_number', 'branch_code', 'city', 'referral_code', 'country_id'])
            ->where(function ($query) use ($q) {
                $query->where('first_name', 'like', "%$q%")
                    ->orWhere('last_name', 'like', "%$q%")
                    ->orWhere('email', 'like', "%$q%")
                    ->orWhere('store_name', 'like', "%$q%")
                    ->orWhere('bank_name', 'like', "%$q%")
                    ->orWhere('iban_number', 'like', "%$q%")
                    ->orWhere('branch_code', 'like', "%$q%")
                    ->orWhere('city', 'like', "%$q%");
            })
            ->with('country')
            ->with('user')
            ->latest()
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);

        return view('clients.index', compact('clients', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        $breadcrumbs = [
            ['url' => route('dashboard'), 'title' => 'Home'],
            ['url' => route('users.index'), 'title' => 'Users'],
        ];

        return view('clients.create', compact('breadcrumbs', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);

        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'referral_code' => $validated['referral_code'],
            'email_verified_at' => now()
        ]);


        $clientData = Arr::except($validated, ['role_id', 'password', 'referral_code']);
        $clientData['user_id'] = $user->id;

        Client::create($clientData);

        $user->assignRole('client');

        return to_route('clients.index')->with('message', 'Client Created Successfully');
    }



    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        $breadcrumbs = [
            ['url' => route('dashboard'), 'title' => 'Home'],
            ['url' => route('clients.index'), 'title' => 'Client'],
        ];

        $client->load('country','user');

        return view('clients.show', compact('breadcrumbs', 'client'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
{
    $roles = Auth::user()->hasRole('super-admin') ? Role::all() : Role::where('name', '!=', 'super-admin')->get();
    $countries = Country::all();
    $breadcrumbs = [
        ['url' => route('dashboard'), 'title' => 'Home'],
        ['url' => route('users.index'), 'title' => 'Users'],
    ];
    $client->load('country', 'user');

    return view('clients.edit', compact('breadcrumbs', 'client', 'roles', 'countries'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
{
    $validated = $request->validated();
    $user = $client->user;
    $user->update([
        'first_name' => $validated['first_name'],
        'last_name' => $validated['last_name'],
        'email' => $validated['email'],
        'referral_code' => $validated['referral_code'] ?? $user->referral_code,
    ]);

    $role = Role::find($validated['role_id']);
    $user->syncRoles([$role]);
    $client->update($validated);

    return to_route('clients.index')->with('message', 'Client Updated Successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
{
    $user = $client->user;

    if ($user) {
        $user->delete();
    }

    $client->delete();

    return to_route('clients.index')->with('message', 'Client deleted successfully');
}


public function search_order(Request $request)
{

}

}
