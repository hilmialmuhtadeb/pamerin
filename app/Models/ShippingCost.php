<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCost extends Model
{
    use HasFactory;

    protected $fillable = [
        'artwork_id',
        'jawa',
        'kalimantan',
        'sulawesi',
        'papua',
    ];
    
}