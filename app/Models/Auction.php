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
        return $this->belongsToMany(User::class, 'auction_user', 'user_id', 'auction_id')->withPivot(['bidder']);
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
