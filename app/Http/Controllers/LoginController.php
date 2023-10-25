<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Login;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Donors;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }


    public function login(Request $request)
    {
        // Validate the login credentials.
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Authentication was successful.
            $user = Auth::user(); // Get the authenticated user.
    
            // Log a successful login attempt.
            \Log::info('User successfully authenticated: ' . $user->email);
    
            // Redirect the user based on their role.
            if ($user->role === 'donor') {
                return redirect()->route('donors');
            } else {
                // Handle other roles or provide a default route.
                return redirect()->route('admin');
            }
        } else {
            // Authentication failed.
            \Log::warning('Login failed for email: ' . $request->email);
    
            return redirect()->route('login')->with('error', 'Invalid email or password.');
        }
    
}

    
    // Handle user logout.
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        return redirect('/');
    }
       
    
}
