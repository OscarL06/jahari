<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{Progress, Material};
use Illuminate\Support\Facades\Auth;

class LessonComplete extends Component
{
    public $lesson_id;

    public function render()
    {
        return view('livewire.lesson-complete');
    }

    public function complete(){

        $progress = Progress::firstOrCreate([
            'user_id' => Auth::user()->id,
            'material_id' => $this->lesson_id,
        ]);

        $progress->update(['completed' => 1]);

        return redirect()->route('lesson', ['id' => $this->lesson_id])->with('status', 'Completed');
    }
}
