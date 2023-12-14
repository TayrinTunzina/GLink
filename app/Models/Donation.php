<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Campaign;
use app\Models\User;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_status',
        'delivery_status',
    ];


    protected $table = 'donations';
    protected $primaryKey = 'd_id';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
