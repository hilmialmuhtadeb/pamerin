<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $fillable = [
        "cart_id",
        "artwork_id",
        "price",
    ];

    public function commission()
    {
        return $this->belongsTo(commission::class);
    }
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function artwork()
    {
        return $this->belongsTo(Artwork::class);
    }
}
