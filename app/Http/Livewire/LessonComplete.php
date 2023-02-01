<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Events\CourseCompleted;
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

        $lesson = Material::find($this->lesson_id);
        $course = $lesson->course;

        $completed = $course->completedMaterialCount() / $course->materialCount() * 100;

        if ($completed == 100) {
            CourseCompleted::dispatch(Auth::user()->id, $course->id);
        }    

        return redirect()->route('lesson', ['id' => $this->lesson_id])->with('status', 'Completed');
    }
}
