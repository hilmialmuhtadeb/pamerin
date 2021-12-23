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
    public function user()
    {
        return $this->belongsToMany(User::class)->withPivot('id', 'user_id', 'auction_id', 'bidder', 'name', 'status', 'bukti')->withTimeStamps();
    }
    
    protected $fillable=[
        'user_id',
        'name',
        'slug',
        'date',
        'start',
        'end',
        'price',
        'description',
        'thumbnail',
    ];
}
