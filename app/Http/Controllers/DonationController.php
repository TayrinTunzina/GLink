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
        $donation = Donation::findOrFail($id);

        $donation->post_status = $request->input('post_status');
        $donation->delivery_status = $request->input('delivery_status');

        $donation->save();

        return redirect()->back()->with('success', 'Status updated successfully');


        // $donations = $request->input('donations');

        // foreach ($donations as $donation) {
        //     //$id = $donation['id'];
        //     $postStatus = $donation['post_status'];
        //     $deliveryStatus = $donation['delivery_status'];

        //     // Update the status in the database
        //     Donation::where('d_id', $id)->update([
        //         'post_status' => $postStatus,
        //         'delivery_status' => $deliveryStatus
        //     ]);
        // }

        // return response()->json(['message' => 'Status updated successfully']);
    }

    public function destroy($id)
    {
        $donation = Donation::findOrFail($id);
        $donation->delete();


        return redirect()->route('admin')->with('success', 'Donation deleted successfully');
    }

    // Add other methods (edit, destroy, etc.) as needed
}
