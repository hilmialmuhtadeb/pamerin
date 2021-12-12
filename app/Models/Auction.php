<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function artist() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
