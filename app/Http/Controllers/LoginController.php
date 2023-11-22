<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Login;
use App\Models\Donors;
use App\Http\Controllers\DonorsController;


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
    
        if ($user) {
            if ($password === $user->password && $user->role === 'Donor') {

                $request->session()->put('users', $user); // Store the user information using 'users' key
                $request->session()->put('user_id', $user->user_id); // Store the user ID


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