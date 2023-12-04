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
        $books = Donation::where('category', 'books')
            ->where('post_status', 'accepted')
            ->get(); // Fetch books with post_status as 'accepted'

        return view('ditems', compact('books'));
    }
}
