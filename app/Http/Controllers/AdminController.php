<?php

namespace App\Http\Controllers;

use App\Models\cr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Login;
use App\Models\Admin;
use App\Models\Campaign;

class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $users = Admin::where('role', 'admin')->get(); // Fetch users where role is 'admin'
        $activeCampaignsCount = Campaign::where('status', 'active')->count();
        $completedCampaignsCount = Campaign::where('status', 'inactive')->count();

        return view('admin', [
            'users' => $users,
            'completedCampaignsCount' => $completedCampaignsCount,
            'activeCampaignsCount' => $activeCampaignsCount,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        // $validatedData = $request->validate([
        //     'title' => 'required|string',
        //     'description' => 'required|string',
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'deadline' => 'required|date',
        //     'amount' => 'required|numeric',
        //     //'terms' => 'required|string',
        //     'status' => 'required|in:active,inactive',
        // ]);

        // $campaign = new Campaign;
        // $campaign->title = $request->input('title');
        // $campaign->description = $request->input('description');
        // $campaign->image = $request->input('image');
        // $campaign->deadline = $request->input('deadline');
        // $campaign->amount = $request->input('amount');
        // //$campaign->terms = $request->input('terms');
        // $campaign->status = $request->input('status');

        // // Save the campaign instance to the database
        // $campaign->save();

        // return redirect()->route('admin')->with('success', 'Campaign created successfully');
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
