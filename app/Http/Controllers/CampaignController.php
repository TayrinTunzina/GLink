<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign; // Import the Campaign model
use App\Models\Admin;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();
        return view('campaigns', compact('campaigns'));
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
            //'terms' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        $campaign = new Campaign;
        $campaign->title = $request->input('title');
        $campaign->description = $request->input('description');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $campaign->image = $imageName;
        }  //Make sure you have the public/images directory created

        $campaign->deadline = $request->input('deadline');
        $campaign->amount = $request->input('amount');
        //$campaign->terms = $request->input('terms');
        $campaign->status = $request->input('status');

        // Save the campaign instance to the database
        $campaign->save();

        return redirect()->route('admin')->with('success', 'Campaign created successfully');
    }


    public function edit($id)
    {
        $campaign = Campaign::find($id);
        return view('edit', compact('campaign'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $campaign = Campaign::find($id);
        $campaign->title = $request->input('title');
        $campaign->description = $request->input('description');
        $campaign->amount = $request->input('amount');
        $campaign->deadline = $request->input('deadline');

        $campaign->save();

        return redirect()->route('admin')->with('success', 'Campaign updated successfully');
    }


    public function destroy($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->delete();


        return redirect()->route('admin')->with('success', 'Campaign deleted successfully');
    }
}
