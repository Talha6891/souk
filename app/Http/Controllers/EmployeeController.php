<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\QueryBuilder;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

public function index(Request $request): View
{
    $breadcrumbs = [
        ['url' => route('dashboard'), 'title' => 'Home'],
        ['url' => route('employees.index'), 'title' => 'Employees'],
    ];

    $q = $request->get('q');
    $perPage = $request->get('per_page', 10);
    $sort = $request->get('sort');
    $user = auth()->user();

    $employees = QueryBuilder::for(Employee::class)
        ->allowedSorts(['first_name', 'last_name', 'email', 'gender', 'religion', 'blood_group', 'dob', 'joining_date'])
        ->where(function (Builder $query) use ($q) {
            $query->where('first_name', 'like', "%$q%")
                ->orWhere('last_name', 'like', "%$q%")
                ->orWhere('email', 'like', "%$q%")
                ->orWhere('gender', 'like', "%$q%")
                ->orWhere('religion', 'like', "%$q%")
                ->orWhere('blood_group', 'like', "%$q%")
                ->orWhereDate('dob', 'like', "%$q%")
                ->orWhereDate('joining_date', 'like', "%$q%");
        })
        ->with(['department', 'designation'])
        ->with('user')
        ->when(!$user->hasRole('super-admin'), function (Builder $query) {
            $query->whereDoesntHave('roles', function (Builder $query) {
                $query->where('name', 'super-admin');
            });
        })
        ->where('user_id', '!=', $user->id)
        ->latest()
        ->paginate($perPage)
        ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);

    return view('employees.index', compact('employees', 'breadcrumbs'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['url' => route('dashboard'), 'title' => 'Home'],
            ['url' => route('employees.index'), 'title' => 'Employee'],
        ];

        $departments = Department::all();
        $designations = Designation::all();
        $roles = Auth::user()->hasRole('super-admin') ? Role::all() : Role::where('name', '!=', 'super-admin')->get();

        return view('employees.create', compact('breadcrumbs', 'departments', 'designations','roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $role = Role::findOrFail($validated['role_id']);

        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        $employeeData = Arr::except($validated, ['role_id', 'password']);
        $employeeData['user_id'] = $user->id;

        Employee::create($employeeData);

        $user->assignRole($role);
        $user->sendEmailVerificationNotification();

        return to_route('employees.index')->with('message', 'employee Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $breadcrumbs = [
            ['url' => route('dashboard'), 'title' => 'Home'],
            ['url' => route('employees.index'), 'title' => 'Employee'],
        ];

        $employee->load('department','designation','user');

        return view('employees.show', compact('breadcrumbs', 'employee'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $breadcrumbs = [
            ['url' => route('dashboard'), 'title' => 'Home'],
            ['url' => route('employees.index'), 'title' => 'Employee'],
        ];
        $departments = Department::all();
        $designations = Designation::all();
        $roles = Auth::user()->hasRole('super-admin') ? Role::all() : Role::where('name', '!=', 'super-admin')->get();
        $employee->load('department','designation','user');

        return view('employees.edit', compact('breadcrumbs',
         'employee','departments','designations','roles'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {

        $validated = $request->validated();
        $user = $employee->user;
        $user->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
        ]);

        $role = Role::find($validated['role_id']);
        $user->syncRoles([$role]);
        $employee->update($validated);

        return to_route('employees.index')->with('message', 'Employee Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $user = $employee->user;

        if ($user) {
            $user->delete();
        }

        $employee->delete();

        return to_route('employees.index')->with('message', 'Employee deleted successfully');
    }
}
