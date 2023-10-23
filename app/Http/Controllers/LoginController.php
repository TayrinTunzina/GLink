<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; // Import the Auth facade
use App\Http\Models\login;
use Illuminate\Http\Request;
use App\Http\Models\admin;
use App\Http\Models\donors;

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
            return redirect()->route('admin');
        } elseif (Auth::guard('donors')->attempt(['email' => $email, 'password' => $password])) {
            // Authentication for donor
            return redirect()->route('donors');
        } else {
            // Authentication failed
            return redirect()->back()->with('error', 'Invalid credentials');
        }
        
    }
}
