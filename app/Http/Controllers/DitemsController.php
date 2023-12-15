<?php

namespace App\Http\Controllers;
use App\Models\ItemRequest;

use App\Models\cr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Donors;
use App\Models\Campaign;
use App\Models\Donation;

class DitemsController extends Controller
{
    public function index()
    {
        $user_id = session()->get('user_id'); // Get the session user ID

        $books = Donation::where('category', 'books')
            ->where('post_status', 'accepted')
            ->where('user_id', '!=', $user_id) // Filter out books where user_id doesn't match the session user ID
            ->get();


        $electronics = Donation::where('category', 'electronics')
            ->where('post_status', 'accepted')
            ->where('user_id', '!=', $user_id)
            ->get();

        $furniture = Donation::where('category', 'furniture')
            ->where('post_status', 'accepted')
            ->where('user_id', '!=', $user_id)
            ->get();

        $clothes = Donation::where('category', 'clothes')
            ->where('post_status', 'accepted')
            ->where('user_id', '!=', $user_id)
            ->get();

        return view('ditems', compact('books','electronics', 'furniture', 'clothes'));    
    }


    public function handleButtonClick(Request $request)
    {
        $user_id = session()->get('user_id'); // Retrieve user ID from session
        $donation_id = $request->donation_id;
    
        // Check the number of existing requests for the donation
        $requestsCount = ItemRequest::where('donation_id', $donation_id)->count();
    
        // If more than 3 requests exist, prevent further requests
        if ($requestsCount >= 3) {
            return response()->json(['error' => 'Sorry, maximum requests reached for this item.'], 422);
        }
    
        // Check if the user has already requested this item
        $existingRequest = ItemRequest::where('donation_id', $donation_id)
            ->where('user_id', $user_id)
            ->exists();
    
        // If the user has already requested, prevent duplicate requests
        if ($existingRequest) {
            return response()->json(['info' => 'You have already requested this item.'], 200);
        }
    
        // Create a new request
        $itemRequest = new ItemRequest();
        $itemRequest->user_id = $user_id;
        $itemRequest->donation_id = $donation_id;
        $itemRequest->save();
    
        // Additional logic if needed...
    
        return response()->json(['status' => 'pending'], 200);
    }

    public function getReqStatus(Request $request)
    {
        $user_id = session()->get('user_id');
        $donation_id = $request->donation_id;

        $req_status = ItemRequest::where('donation_id', $donation_id)
            ->where('user_id', $user_id)
            ->value('req_status');

        return response()->json(['req_status' => $req_status]);
    }

    
    

}

