<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PracticeModal extends Component
{
    public $duration = "00:00:00";

    protected $listeners = ['updateDuration'];

    public function render()
    {
        return view('livewire.practice-modal');
    }

    public function updateDuration($value)
    {
        $this->duration = $value;
    }

    public function savePracticeSession(){
        dd($this->duration);
    }
}
