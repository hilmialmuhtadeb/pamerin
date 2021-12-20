<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'subtotal',
        'ongkir',
        'unique_number',
        'summary',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function details()
    {
        return $this->hasMany(Detail::class);
    }
    
    public function getDetailsCountAttribute()
    {
        $detailsCount = Detail::where('cart_id', $this->id)->count();
        return $detailsCount;
    }
}
