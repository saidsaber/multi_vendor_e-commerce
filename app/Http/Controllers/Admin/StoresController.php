<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoresController extends Controller
{
    public function index(){
        $stores = Store::with('user')->where('isActive' , 1)->get();
        return view('admin.stores' , ['stores' => $stores]);
    }
    public function requestStore(){
        $stores = Store::with('user')->where('isActive' , 0)->get();
        return view('admin.joinrequest' , ['stores' => $stores]);
    }

    public function accept(Store $store){
        $store->update(['isActive' => 1]);
        $user = User::where('id' , $store->user->id)->first();
        $user->update(['role' => 'vendor']);
        return back();
    }   
}
