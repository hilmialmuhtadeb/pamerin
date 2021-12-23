<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function exhibition()
    {
        return $this->belongsToMany(Exhibition::class)->withPivot('code', 'bukti', 'subtotal', 'unique', 'summary', 'status_id')->withTimeStamps();
    }

    public function artwork()
    {
        return $this->belongsToMany(Artwork::class)->withPivot('code', 'bukti')->withTimeStamps();
    }

    public function carts() {
        return $this->belongsToMany(Cart::class);
    }

    public function ticket(){
        return $this->belongsToMany(Ticket::class);
    }
    
    public function address() {
        return $this->hasOne(Address::class);
    }

    public function auction()
    {
        return $this->belongsToMany(Auction::class, 'auction_user', 'user_id', 'auction_id')->withPivot(['id', 'user_id', 'auction_id', 'bidder', 'name', 'status', 'bukti'])->withTimeStamps();
    }

    public function bank() {
        return $this->hasOne(Bank::class);
    }


    public function getCartAttribute()
    {
        $cart = Cart::where('user_id', $this->id)->latest()->first();
        return $cart;
    }

    public function getRegionAttribute()
    {
        $address = Address::where('user_id', $this->id)->first();
        return $address->region;
    }
    public function getTicketAttribute()
    {
        $ticket = Ticket::where('user_id', $this->id)->first();
        return $ticket;
    }
    
}
