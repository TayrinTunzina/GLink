<?php

namespace App\Http\Controllers;

use App\Models\cr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Donors;
use App\Models\Campaign;
use App\Models\Login;


class DonorsController extends Controller
{

    public function index(Request $request)
    {
        // Retrieve user from session using 'users' key
        $user = Auth::guard('donors')->user();
    
        if ($user && $user->role === 'Donor') {
            // Store user ID in session (if needed)
            // $request->session()->put('user_id', $user->user_id);
    
            $campaigns = DB::table('campaigns')->get();
            return view('donors', ['campaigns' => $campaigns, 'user' => $user]);
        }
    
        // Handle unauthorized access
        return redirect()->route('login')->with('error', 'Unauthorized access.');
    }
    
    

    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(cr $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cr $cr)
    {
        //
    }
}