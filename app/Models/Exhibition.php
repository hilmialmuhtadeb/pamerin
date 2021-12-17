<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exhibition extends Model
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

    public function tickdts(){
        return $this->hasOne(Tickdt::class);
    }
    public function user()
    {
        return $this->belongsToMany(User::class)->withPivot('code');
    }
}
