<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickdt extends Model
{
    use HasFactory;
    protected $fillable = [
        "ticket_id",
        "user_id",
        "exhibition_id",
        "price",
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function exhibition()
    {
        return $this->belongsTo(Exhibition::class);
    }
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
