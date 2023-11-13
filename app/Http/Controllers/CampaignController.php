<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign; // Import the Campaign model
use App\Models\Admin;

class CampaignController extends Controller
{
    public function index()
    {
        // Your code to retrieve and display campaigns goes here
        $users = Admin::where('role', 'admin')->get(); // Fetch users where role is 'admin'

        return view('admin', ['users' => $users]);
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deadline' => 'required|date',
            'amount' => 'required|numeric',
            'terms' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        $campaign = new Campaign;
        $campaign->title = $request->input('title');
        $campaign->description = $request->input('description');
        $campaign->image = $request->input('image');
        $campaign->deadline = $request->input('deadline');
        $campaign->amount = $request->input('amount');
        $campaign->terms = $request->input('terms');
        $campaign->status = $request->input('status');

        // Save the campaign instance to the database
        $campaign->save();

        return redirect()->route('admin.index')->with('success', 'Campaign created successfully');
    }
}
