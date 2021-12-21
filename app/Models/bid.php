<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bid extends Model
{
    use HasFactory;

    protected $table = 'bid';

    public function user()
    {
        return $this->belongsToMany(user::class)->withPivot(['bidder']);
    }
}
