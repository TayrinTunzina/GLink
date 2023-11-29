<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::with('campaign')->get();

        return view('donation.index', compact('donations'))->with('donations', $donations);
    }

    public function edit($id)
    {
        $donation = Donation::find($id);
        return view('donationEdit', compact('donation'));
    }

    // public function show($id)
    // {
    //     $donation = Donation::find($id);
    //     return view('donation.show', compact('donation'));
    // }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $donation = Donation::find($id);
        $donation->campaign_id = $request->campaign_id;
        $donation->name = $request->input('name');
        $donation->amount = $request->input('amount');
        $donation->status = $request->input('status');

        $donation->save();

        return redirect()->route('admin')->with('success', 'Donation updated successfully');
    }

    public function destroy($id)
    {
        $donation = Donation::findOrFail($id);
        $donation->delete();


        return redirect()->route('admin')->with('success', 'Donation deleted successfully');
    }

    // Add other methods (edit, destroy, etc.) as needed
}
