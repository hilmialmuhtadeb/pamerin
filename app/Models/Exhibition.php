<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exhibition extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'name', 'slug', 'date', 'start', 'end', 'price', 'description', 'thumbnail'];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function artist()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tickdts(){
        return $this->hasOne(Tickdt::class);
    }
    public function user()
    {
        return $this->belongsToMany(User::class)->withPivot('code', 'bukti', 'subtotal', 'unique', 'summary', 'status_id');
    }
}
