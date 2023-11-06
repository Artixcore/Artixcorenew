<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    public function loginPage()
    {
        return view('js/components/Auth/Login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication was successful
            return redirect()->intended('dashboard'); // Redirect to the dashboard or desired page
        } else {
            // Authentication failed
            return redirect()->back()->withErrors(['login' => 'Invalid credentials']); // Redirect back with an error message
        }
    }
}
