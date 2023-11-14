<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
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

        if ($user) {
            // Check if the provided password matches the hashed password from the database
            if ($password === $user->password && $user->role === 'Donor') {
                // Authentication successful
                //return redirect()->route('donors')->with('success', 'Login successful.');
                return view('donors', ['user' => $user])->with('success', 'Login successful.');
            }
        }

        // Authentication failed
        return redirect()->route('login')->with('error', 'Invalid email or password.');
    }
    
    
    // Handle user logout.
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        return redirect('/');
    }
       
    
}
