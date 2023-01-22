@extends('layouts.main')

@section('title', $lesson->name . ' | ' . Auth::user()->username)

@section('content')
    <div class="w-full lg:w-4/5 flex flex-col items-center lg:ml-[20%] mt-16 lg:mt-6">
        <h1 class="text-5xl tracking-tighter font-abel">{{ $lesson->course->name }} | {{ $lesson->name }}</h1>

        
        @livewire('progress-video', ['lesson_id' => $lesson->id ])

        <div class="w-5/6 rounded-md lg:w-3/5">
            @foreach($lesson->slices as $slices)
                <iframe src="{{ $slices->url }}" width="100%" height="500" frameBorder="0" allowfullscreen class="my-10 rounded-lg"></iframe>
            @endforeach  
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var video = document.getElementById('video');
            video.addEventListener('timeupdate', function() {
                if (this.currentTime >= 5) {
                    Livewire.emit('updateProgress');
                    this.removeEventListener('timeupdate', arguments.callee);
                }
            });
        });
    </script>
@endsection