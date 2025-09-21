<?php

namespace App\Policies\Vendor;

use App\Models\User;
use App\Models\Vendor_Order;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class VendorOrderPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Vendor_Order $vendorOrder): bool
    {
        if(Auth::guard('vendor')->user()->store->id === $vendorOrder->store_id){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Vendor_Order $vendorOrder): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Vendor_Order $vendorOrder): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Vendor_Order $vendorOrder): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Vendor_Order $vendorOrder): bool
    {
        return false;
    }
}
