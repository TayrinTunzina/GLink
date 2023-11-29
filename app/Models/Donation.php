<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Campaign;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',
        'name',
        'email',
        'phone',
        'amount',
        'payment_method',
        'status',
        // add other fields as needed
    ];

    public function campaign()
    {
        return $this->belongsTo(\App\Models\Campaign::class);
    }
}
