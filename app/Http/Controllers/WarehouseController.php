<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWarehouseRequest;
use App\Http\Requests\UpdateWarehouseRequest;
use App\Models\Country;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\QueryBuilder\QueryBuilder;

class WarehouseController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Warehouse::class, 'warehouse');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $breadcrumbs = [
            ['url' => route('dashboard'), 'title' => 'Home'],
            ['url' => route('warehouses.index'), 'title' => 'Warehouses'],
        ];

        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');

        $warehouses = QueryBuilder::for(Warehouse::class)
            ->allowedSorts(['name','email','contact_no','city','address', 'user_id', 'country_id'])
            ->where(function ($query) use ($q) {
                $query->where('name', 'like', "%$q%")
                    ->orWhere('email', 'like', "%$q%")
                    ->orWhere('contact_no', 'like', "%$q%")
                    ->orWhere('address', 'like', "%$q%")
                    ->orWhere('city', 'like', "%$q%")
                    ->orWhere('user_id', 'like', "%$q%")
                    ->orWhere('country_id', 'like', "%$q%");
            })
            ->with('country')
            ->with('user')
            ->latest()
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);

        return view('warehouses.index', compact('warehouses', 'breadcrumbs'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $breadcrumbs = [
            ['url' => route('dashboard'), 'title' => 'Home'],
            ['url' => route('warehouses.index'), 'title' => 'Warehouses'],
        ];

        $users = User::role('supervisor')->get();
        $countries = Country::all();

        return view('warehouses.create', compact('breadcrumbs', 'users', 'countries'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWarehouseRequest $request) : RedirectResponse
    {
        Warehouse::create($request->validated());

        return to_route('warehouses.index')->with('message','Warehouse created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Warehouse $warehouse) : View
    {
        $breadcrumbs = [
            ['url' => route('dashboard'), 'title' => 'Home'],
            ['url' => route('warehouses.index'), 'title' => 'Warehouses'],
        ];
        $warehouse->load('user', 'country');

        return view('warehouses.show', compact('breadcrumbs','warehouse'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Warehouse $warehouse) : View
    {
        $breadcrumbs = [
            ['url' => route('dashboard'), 'title' => 'Home'],
            ['url' => route('warehouses.index'), 'title' => 'Warehouses'],
        ];
        $warehouse->load('user', 'country');
        $users = User::role('supervisor')->get();
        $countries = Country::all();

        return view('warehouses.edit', compact('breadcrumbs','warehouse','users','countries'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWarehouseRequest $request, Warehouse $warehouse): RedirectResponse
    {
        $warehouse->update($request->validated());

        return to_route('warehouses.index')->with('message','Warehouse update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warehouse $warehouse): RedirectResponse
    {
        $warehouse->delete();

        return to_route('warehouses.index')->with('message','Warehouse update successfully.');
    }
}
