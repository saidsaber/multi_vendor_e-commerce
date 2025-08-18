<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function index(){
        $user = Store::where('user_id' , Auth::id())->first();
        if($user && $user->isActive == 0){
            return view('vendor.createstore', ['message' => 'Your store is under review.']);
        }elseif($user && $user->isActive == 1){
            return to_route('vendor');
        }
        return view('vendor.createstore');
    }
    public function create(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|max:50|unique:stores,name',
            'description' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('images/stores', 'public'); // يخزن في storage/app/public/images
        }
        $validation['logo'] = $path;
        $validation['user_id'] = Auth::id();

        Store::create($validation);
        return redirect()->back();
    }
}
