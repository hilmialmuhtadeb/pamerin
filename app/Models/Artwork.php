<?php

namespace App\Models;

use Database\Seeders\CategorySeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'user_id',
        'name',
        'slug',
        'thumbnail',
        'price',
        'size',
        'media',
        'year',
        'status',
        'description',
        'isReady'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getTakeImageAttribute()
    {
        return '/storage/' . $this->thumbnail;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function artist()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function detail()
    {
        return $this->hasOne(Detail::class);
    }
    public function shippingCost()
    {
        return $this->hasOne(ShippingCost::class);
    }
    public function user()
    {
        return $this->belongsToMany(User::class)->withPivot('code', 'bukti')->withTimeStamps();
    }
    public function exhibitions()
    {
        return $this->belongsToMany(Exhibition::class);
    }
}
