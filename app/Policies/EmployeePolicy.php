<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EmployeePolicy
{
    /**
     * Determine whether the user can view any employees.
     */
    public function viewAny(User $user): bool
    {
        if ($user->can('employee index')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the employee.
     *
     * @param  User  $user
     * @param  Employee  $employee
     * @return bool
     */
    public function view(User $user, Employee $employee): bool
    {
        if ($user->can('employee show')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create employees.
     *
     * @param  User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        if ($user->can('employee create')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the employee.
     *
     * @param  User  $user
     * @param  Employee  $employee
     * @return bool
     */
    public function update(User $user, Employee $employee): bool
    {
        if ($user->can('employee update')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the employee.
     *
     * @param  User  $user
     * @param  Employee  $employee
     * @return bool
     */
    public function delete(User $user, Employee $employee): bool
    {
        if ($user->can('employee delete')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the employee.
     *
     * @param  User  $user
     * @param  Employee  $employee
     * @return bool
     */
    public function restore(User $user, Employee $employee)
    {
        // if ($user->can('employee restore')) {
        //     return true;
        // }
        // return false;
    }

    /**
     * Determine whether the user can permanently delete the employee.
     *
     * @param  User  $user
     * @param  Employee  $employee
     * @return bool
     */
    public function forceDelete(User $user, Employee $employee)
    {
        // if ($user->can('employee force-delete')) {
        //     return true;
        // }
        // return false;
    }
}
