<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign; // Import the Campaign model
use App\Models\Admin;
use Monolog\Handler\ElasticaHandler;

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
        // $campaign->save();

        // return redirect()->route('admin')->with('success', 'Campaign created successfully');

        if ($campaign->save()) {
            return response()->json('success', 200);
        } else {
            return response()->json('fail', 400);
        }
    }


    public function edit($id)
    {
        $campaign = Campaign::find($id);
        if ($campaign) {
            return response()->json([
                'status' => 200, 'campaign' => $campaign,
            ]);
        } else {
            return response()->json([
                'status' => 400, 'message' => 'Not found'
            ]);
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $campaign = Campaign::findOrFail($id);

        // Update campaign properties based on the request
        $campaign->title = $request->input('title');
        $campaign->description = $request->input('description');
        $campaign->amount = $request->input('amount');
        $campaign->status = $request->input('status');

        $campaign->save();

        return response()->json(['message' => 'Campaign updated successfully']);
    }


    public function destroy($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->delete();


        return redirect()->back()->with('success', 'Campaign deleted successfully');
    }

    public function fetchCampaigns()
    {
        $campaigns = Campaign::all(); // Fetch all campaigns

        return response()->json(['campaigns' => $campaigns]);
    }
}
