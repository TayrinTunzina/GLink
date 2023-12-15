<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemRequest extends Model
{
    use HasFactory;
    
    protected $table = 'item_requests';
    //protected $primaryKey = 'id';

    // ItemRequest.php (Model)
    public function donation()
    {
        return $this->belongsTo(Donation::class, 'donation_id', 'd_id');
    }
}
