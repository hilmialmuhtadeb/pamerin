<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Auction;

class Bidding extends Component
{
    public $bid=[
        [
            
        ]
    ];
    public function render(Auction $auction)
    {
        // $auction = Auction::where('slug', $auction->slug)->get();
        return view('livewire.bidding', compact('auction'));
    }
}
