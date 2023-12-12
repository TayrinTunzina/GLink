<?php

namespace App\Http\Controllers;

use App\Models\cr;
use App\Models\Donors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import the Auth facade

class DonorsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('donors');
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
    public function destroy($id)
    {
        $user = Donors::findOrFail($id);
        
        //$user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
