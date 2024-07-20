<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\QueryBuilder\QueryBuilder;
class RoleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Role::class, 'role');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request) : View
    {
        $breadcrumbs = [
            ['url' => route('dashboard'), 'title' => 'Home'],
            ['url' => route('roles.index'), 'title' => 'Roles'],
        ];

        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');

        $roles = QueryBuilder::for(Role::class)
            ->allowedSorts(['name', 'created_at'])
            ->where('name', 'like', "%$q%")
            ->latest()
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);

        return view('roles.index', compact('breadcrumbs','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create() : View
    {
        $breadcrumbs = [
            ['url' => route('dashboard'), 'title' => 'Home'],
            ['url' => route('roles.index'), 'title' => 'Roles'],
        ];
        $permissionModules = Permission::all()->groupBy('module_name');

        return view('roles.create', compact('breadcrumbs','permissionModules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRoleRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreRoleRequest $request): RedirectResponse
    {
        $createdRole = Role::create(['name' => $request->validated('name')]);
        $permissionNames = Permission::find($request->validated('permissions'))->pluck('name');
        $createdRole->syncPermissions($permissionNames);

        return to_route('roles.index')->with('message', 'Role created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param Role $role
     * @return View
     */
    public function show(Role $role) : View
    {
        $breadcrumbs = [
            ['url' => route('dashboard'), 'title' => 'Home'],
            ['url' => route('roles.index'), 'title' => 'Roles'],
        ];

        $permissionModules = Permission::all()->groupBy('module_name');
        $rolePermissions = $role->permissions()->pluck('id')->toArray();

        return view('roles.show',compact('role','breadcrumbs','permissionModules','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return View
     */
    public function edit(Role $role) : View
    {
        $breadcrumbs = [
            ['url' => route('dashboard'), 'title' => 'Home'],
            ['url' => route('roles.index'), 'title' => 'Roles'],
        ];

        $permissionModules = Permission::all()->groupBy('module_name');
        $rolePermissions = $role->permissions()->pluck('id')->toArray();

        return view('roles.edit', compact('role','breadcrumbs','permissionModules','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRoleRequest  $request
     * @param  Role  $role
     * @return RedirectResponse
     */
    public function update(UpdateRoleRequest $request, Role $role): RedirectResponse
    {
        $role->update(['name' => $request->validated('name')]);
        $permissionNames = Permission::find($request->validated('permissions'))->pluck('name');
        $role->syncPermissions($permissionNames);
        return to_route('roles.index')->with('message', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role  $role
     * @return RedirectResponse
     */
    public function destroy(Role $role): RedirectResponse
    {
        $role->delete();

        return to_route('roles.index')->with('message', 'Role deleted successfully');
    }
}
