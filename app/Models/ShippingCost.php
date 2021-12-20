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
        'sumatera',
        'kalimantan',
        'sulawesi',
        'papua',
    ];
    
    public function artwork()
    {
        return $this->hasOne(Artwork::class, 'artwork_id');
    }
}
