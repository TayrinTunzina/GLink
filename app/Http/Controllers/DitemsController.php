<?php

namespace App\Http\Controllers;

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
        $donations = Donation::all();

        return view('ditems', compact('donations'));
    }
}
