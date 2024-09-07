<?php

namespace App\Livewire;

use App\Models\Option;
use App\Models\Poll;
use Livewire\Attributes\On;
use Livewire\Component;

class Polls extends Component
{

    public function voteFor(int $optionID)
    {
        Option::findOrFail($optionID)->votes()->create();
    }


    #[On('poll-created')] // escucha por el evento y ejecuta la funcion render
    public function render()
    {
        $polls = Poll::with('options.votes')->latest()->get();
        return view('livewire.polls', ['polls'=>$polls]);
    }
}
