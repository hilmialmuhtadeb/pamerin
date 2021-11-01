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

    public function exhibitions()
    {
        return $this->hasMany(Exhibition::class);
    }

    public function artworks()
    {
        return $this->hasMany(Artwork::class);
    }

    public function carts() {
        return $this->hasMany(Cart::class);
    }

    public function address() {
        return $this->hasOne(Address::class);
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
}
