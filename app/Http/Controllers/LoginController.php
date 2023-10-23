<?php

namespace App\Http\Controllers;

use App\HttpModels\login;
use Illuminate\Http\Request;
use App\admin;


class LoginController extends Controller
{
    //
    public function index()
    {
        return view('home.login');
    }

    public function auth(Request $request)
    {
        $email = $request->post('email');
        $password = $request->post('password');
        $role = $request->post('login-role'); // Assuming you have a role field in your form
    
        if (Auth::login(['email' => $email, 'password' => $password])) {
            // Authentication passed for the provided email and password
    
            if ($role === 'admin') {
                return redirect()->route('admin.dashboard'); // Redirect to the admin dashboard route
            } elseif ($role === 'donor') {
                return redirect()->route('donor.dashboard'); // Redirect to the donor dashboard route
            }
        } else {
            // Authentication failed
            return redirect()->back()->with('error', 'Invalid credentials'); // Redirect back with an error message
        }
    }
}
