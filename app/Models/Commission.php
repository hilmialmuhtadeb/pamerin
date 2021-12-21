<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function details()
    {
        return $this->belongsToMany(Detail::class);
    }

    public function cart()
    {
        return $this->belongsToMany(Cart::class);
    }

}
