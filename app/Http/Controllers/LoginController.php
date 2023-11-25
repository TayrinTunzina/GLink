<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\DonorsController;
use App\Models\Login;
use App\Models\Donors;


class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
    
        // Fetch user data from the database based on the provided email
        $user = DB::table('users')->where('email', $email)->first();
    
        if ($user && $user->role === 'Donor') {
            // Use the 'donors' guard to authenticate the user
            if (Auth::guard('donors')->attempt(['email' => $email, 'password' => $password])) {
                // Authentication successful
                return redirect('/donors')->with('success', 'Login successful.');
            }
        }
    
        return redirect()->route('login')->with('error', 'Invalid email or password.');
    }
    
    
    
    
    
    // // Handle user logout.
    // public function logout(Request $request)
    // {
    //     auth()->logout();
    //     $request->session()->invalidate();
    //     return redirect('/');
    // }
       
    
}