<?php

namespace App\Http\Controllers;

use App\Models\Adress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdressController extends Controller
{
    public function index(){
        $adresses = Adress::where('user_id' , Auth::id())->get();
        // dd(add);
        return view('dashboard', ['adresses' => $adresses, 'page' => 'adresses']);
    }

    public function createAddress(Request $request){
        $validation = $request->validate([
            'city'   => ['required', 'string', 'max:100'],
            'street' => [  'max:150'],
            'adress' => ['required', 'string', 'max:255'], 
            'phone'  => ['required', 'string', 'regex:/^01[0-9]{9}$/'], 
        ]);

        $validation['user_id'] = Auth::id();
        Adress::create($validation);
        return to_route('adresses');
    }

    public function delete(Adress $adress){
        $adress->delete();
        return to_route('adresses');
    }
}
