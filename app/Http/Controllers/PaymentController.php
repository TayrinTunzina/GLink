<?php

namespace App\Http\Controllers;

use App\Models\cr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Donors;
use App\Models\Campaign;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index($camp_id, $user_id)
    {
        // Retrieve the campaign based on $camp_id
        $campaigns = Campaign::find($camp_id);
    
        // Pass the $campaign variable to the view
        return view('payment', ['campaigns' => $campaigns]);
    }
}
