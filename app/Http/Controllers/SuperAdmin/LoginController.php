<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function login(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('user_id', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();

            if ($user->hasRole('admin')) {
                return redirect()->intended(route('dashboard'));
            } else if ($user->hasRole('user')) {
                return redirect()->intended(route('dashboard'));
            } 
        }

        return back()->withInput()->withErrors([
            'user_id' => 'Invalid credentials',
        ]);
    }

    


    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect()->route('signin');
    }
}
