<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; // Import the Auth facade
use App\Http\Models\Login;
use Illuminate\Http\Request;
use App\Http\Models\Admin;
use App\Http\Models\Donors;

class LoginController extends Controller
{
    public function index()
    {
        return view('home.login');
    }

    public function auth(Request $request)
    {
        $email = $request->post('email');
        $password = $request->post('password');
        $role = $request->post('login-role'); // Assuming you have a role field in your form

        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password])) {
            // Authentication for admin
            session(['admin_logged_in' => true]);
            return redirect()->route('admin');
        } elseif (Auth::guard('donors')->attempt(['email' => $email, 'password' => $password])) {
            // Authentication for donor
            session(['donor_logged_in' => true]);
            return redirect()->route('donors');
        } else {
            // Authentication failed
            return redirect()->back()->with('error', 'Invalid credentials');
        }
        
    }
}
