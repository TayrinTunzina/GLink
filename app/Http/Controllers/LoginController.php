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
    
        // Get the user's data from the database.
        $email = $request->input('email'); // Get email input from the form
        $user = Login::where('email', $email)->first();
    
        // Check if the user exists and their password is correct.
        if ($user && Hash::check($request->password, $user->password)) {
            // Redirect the user to the "donors" page upon successful authentication.
            return redirect()->route('donors');
        }
    
        // Redirect to the login page with an error message if login fails.
        //return redirect()->route('login')->with('error', 'Invalid email or password.');
        echo $user->name;
        dd('User authenticated successfully.');
    } 
    

    
    // Handle user logout.
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        return redirect('/');
    }
       
    
}
