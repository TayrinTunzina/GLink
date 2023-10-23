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

    public function login(Request $request)
    {

        if (Auth::user() && Auth::user()->role) {
            $role = Auth::user()->role;
        
            if ($role === 'donor') {
                return redirect('donors.auth');
            } else if ($role === 'admin') {
                return redirect('admin.auth');
            } else {
                return redirect('/');
            }
        }
        
    }
}
