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
use App\Models\Donation;


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
    
    
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'category' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for image upload
        ]);
    
        // Create a new Donation instance
        $donation = new Donation();
        $donation->user_id = $request->session()->get('user_id'); // Assuming 'user_id' is stored in the session
        $donation->category = $request->input('category');
        $donation->description = $request->input('description');
    
        // Handle file upload if needed
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $donation->image = $imageName; // Save the image path in the database
        }
    
        $donation->save();
    
        // Return a success response
        return response()->json(['success' => true]);
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