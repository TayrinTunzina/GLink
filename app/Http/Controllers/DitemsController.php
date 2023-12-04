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
        $books = Donation::where('category', 'books')
            ->where('post_status', 'accepted')
            ->get(); // Fetch books with post_status as 'accepted'

        return view('ditems', compact('books'));
    }

    public function handleButtonClick(Request $request)
    {
        // Get the logged-in user ID
        $user_id = $request->user_id;
        $donation_id = $request->donation_id;
    
        // Check if the user has already requested for this donation
        $existingRequest = ItemRequest::where('user_id', $user_id)
            ->where('donation_id', $donation_id)
            ->first();
    
        if ($existingRequest) {
            return response()->json(['error' => 'You have already requested this item.']);
        }
    
        // Check the count of requests for this donation
        $requestCount = ItemRequest::where('donation_id', $donation_id)->count();
    
        if ($requestCount >= 3) {
            return response()->json(['error' => 'Requests for this item are full.']);
        }
    
        // Create a new item request record
        $itemRequest = new ItemRequest();
        $itemRequest->user_id = $user_id;
        $itemRequest->donation_id = $donation_id;
        $itemRequest->req_status = 'pending'; // Set status to pending
        $itemRequest->save();
    
        return response()->json(['success' => 'Request sent successfully!']);
    }

}

