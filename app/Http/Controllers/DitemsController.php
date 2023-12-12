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
        $user_id = session()->get('user_id'); // Retrieve user ID from session
        $donation_id = $request->donation_id;
    
        // Check the number of existing requests for the donation
        $requestsCount = ItemRequest::where('donation_id', $donation_id)->count();
    
        // If more than 3 requests exist, prevent further requests
        if ($requestsCount >= 1) {
            return redirect()->back()->with('error', 'Sorry, maximum requests reached for this item.');
        }
    
        // Check if the user has already requested this item
        $existingRequest = ItemRequest::where('donation_id', $donation_id)
            ->where('user_id', $user_id)
            ->exists();
    
        // If the user has already requested, prevent duplicate requests
        if ($existingRequest) {
            return redirect()->back()->with('info', 'You have already requested this item.');
        }
    
        // Create a new request
        $itemRequest = new ItemRequest();
        $itemRequest->user_id = $user_id;
        $itemRequest->donation_id = $donation_id;
        $itemRequest->save();
    
        // Additional logic if needed...
    
        return response()->json(['status' => 'pending']);
    }
    
    

}

