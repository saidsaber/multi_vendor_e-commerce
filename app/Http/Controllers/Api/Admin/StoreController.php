<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\User;
use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Trait\ApiResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{

    public function getAcceptStores()
    {
        $stores = Store::where('isActive', 1)->get();
        return ApiResponse::success(['stores' => $stores]);
    }

    public function getRequestStores()
    {
        $stores = Store::where('isActive', 0)->get();
        return ApiResponse::success(['stores' => $stores]);
    }

    public function acceptRequestStores(Store $store)
    {
        DB::beginTransaction();

        try {
            $store->update(['isActive' => 1]);

            $user = User::findOrFail($store->user_id);
            $user->update(['role' => 'vendor']);

            DB::commit();

            return ApiResponse::success(['stores' => 'تمت العملية بنجاح']);
        } catch (\Exception $e) {
            DB::rollBack();
            return ApiResponse::error(['error' => $e->getMessage()]);
        }
        // return ApiResponse::success(['stores' => '']);
    }
}
