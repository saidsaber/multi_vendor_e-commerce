<?php

namespace App\Http\Controllers\Vendor;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Invalid credentials.',
            ])->withInput();
        }

        if ($user->role != 'vendor') {
            abort(401);
        }

        if (Auth::guard('vendor')->attempt($credentials)) {
            Auth::shouldUse('vendor');
            return redirect('/vendor');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('vendor')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/vendor/login');
    }
}
