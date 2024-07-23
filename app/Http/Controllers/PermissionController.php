<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\Log;

class PermissionController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Permission::class, 'permission');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $breadcrumbs = [
            ['url' => route('dashboard'), 'title' => 'Home'],
            ['url' => route('permissions.index'), 'title' => 'Permissions'],
        ];

        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');

        $permissions = QueryBuilder::for(Permission::class)
            ->allowedSorts(['name', 'created_at'])
            ->where(function ($query) use ($q) {
                $query->where('name', 'like', "%$q%")
                    ->orWhere('created_at', 'like', "%$q%");
            })
            ->latest()
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);

        return view('permissions.index', compact('permissions', 'breadcrumbs'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $breadcrumbs = [
            ['url' => route('dashboard'), 'title' => 'Home'],
            ['url' => route('permissions.index'), 'title' => 'Permissions'],
        ];

        return view('permissions.create', compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePermissionRequest $request): RedirectResponse
    {
        Permission::create([
            'name' => $request->validated('permission_name'),
            'module_name' => $request->validated('module_name'),
        ]);

        return to_route('permissions.index')->with('message', 'Permission created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission): View
    {
        $breadcrumbs = [
            ['url' => route('dashboard'), 'title' => 'Home'],
            ['url' => route('permissions.index'), 'title' => 'Permissions'],
        ];

        $permission['permissionModuleName'] = explode(' ', $permission->name)[0];
        $permission['name'] = explode(' ', $permission->name)[1];

        return view('permissions.edit', compact('breadcrumbs', 'permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePermissionRequest $request, Permission $permission): RedirectResponse
    {
        $permission->update([
            'name' => $request->validated('permission_name'),
            'module_name' => $request->validated('module_name'),
        ]);

        return to_route('permissions.index')->with('message', 'Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Permission $permission): RedirectResponse
    {
        $permission->delete();
        return to_route('permissions.index')->with('message', 'Permission deleted successfully');
    }

}
