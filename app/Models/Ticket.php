<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public $fillable = [
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function tickdt()
    {
        return $this->hasMany(Tickdt::class);
    }
    public function getDetailsCountAttribute()
    {
        $detailsCount = Detail::where('ticket_id', $this->id)->count();
        return $detailsCount;
    }
}
