<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikePameran extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'exhibition_id',
        'islike'
    ];
}
