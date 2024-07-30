<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Auth\Access\Response;

class WarehousePolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user): bool
    {

        if ($user->can('warehouse index')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Warehouse $warehouse
     * @return bool
     */
    public function view(User $user, Warehouse $warehouse): bool
    {
        if ($user->can('warehouse show')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        if ($user->can('warehouse create')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param  Warehouse  $warehouse
     * @return bool
     */
    public function update(User $user, Warehouse $warehouse): bool
    {
        if ($user->can('warehouse update')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param  Warehouse  $warehouse
     * @return bool
     */
    public function delete(User $user, Warehouse $warehouse): bool
    {
        if ($user->can('warehouse delete')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param  Warehouse  $warehouse
     * @return void
     */
    public function restore(User $user, Warehouse $warehouse)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param  Warehouse  $warehouse
     * @return void
     */
    public function forceDelete(User $user, Warehouse $warehouse)
    {
        //
    }

    public function updateOrderStatus(User $user, Warehouse $warehouse): bool
    {
        if ($user->can('warehouse-order-status-update')) {
            return true;
        }
        return false;
    }
}
