<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuctionUser extends Model
{
    use HasFactory;
    protected $table = 'auction_user';
    protected $primary = 'id';

    protected $fillable = [
        "auction_id",
        "transaksi_id",
        "bidder",
        "name",
        "status",
    ];

    public function auction(){
        return $this->hasOne(
            'App\Models\Auction', 'id', 'auction_id'
        );
    }

    public function user(){
        return $this->hasOne(
            'App\Models\User', 'id', 'user_id'
        );
    }
    

}
