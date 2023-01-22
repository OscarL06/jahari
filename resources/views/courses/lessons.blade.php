@extends('layouts.main')

@section('title', $lesson->name . ' | ' . Auth::user()->username)

@section('content')
    <div class="w-full lg:w-4/5 flex flex-col items-center lg:ml-[20%] mt-16 lg:mt-6">
        <h1 class="text-5xl tracking-tighter font-abel">{{ $lesson->course->name }} | {{ $lesson->name }}</h1>

        
        @livewire('progress-video', ['lesson_id' => $lesson->id ])

        <div class="flex justify-center w-5/6 p-1 mt-2 space-x-10 text-white rounded-md shadow lg:w-3/5 bg-main" wire:click="updateProgress">
            <button class="px-2 py-0.5 text-white bg-main rounded-md font-abel shadow shadow-purple-500 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
                Complete
            </button>
            <button class="px-2 py-0.5 text-white bg-main rounded-md font-abel shadow shadow-purple-500 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                </svg>
                Notes
            </button>
            <button class="px-2 py-0.5 text-white bg-main rounded-md font-abel shadow shadow-purple-500 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 9l10.5-3m0 6.553v3.75a2.25 2.25 0 01-1.632 2.163l-1.32.377a1.803 1.803 0 11-.99-3.467l2.31-.66a2.25 2.25 0 001.632-2.163zm0 0V2.25L9 5.25v10.303m0 0v3.75a2.25 2.25 0 01-1.632 2.163l-1.32.377a1.803 1.803 0 01-.99-3.467l2.31-.66A2.25 2.25 0 009 15.553z" />
                </svg>
                Practice
            </button>
            <button class="px-2 py-0.5 text-white bg-main rounded-md font-abel shadow shadow-purple-500 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                </svg>
                Reset
            </button>
        </div>

        <div class="mt-12 text-purple-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25L12 21m0 0l-3.75-3.75M12 21V3" />
            </svg>
        </div>

        <div class="w-5/6 rounded-md lg:w-3/5">
            @foreach($lesson->slices as $slices)
                <iframe src="{{ $slices->url }}" width="100%" height="500" frameBorder="0" allowfullscreen class="my-10 rounded-lg"></iframe>
            @endforeach  
        </div>

        <div class="text-purple-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25L12 21m0 0l-3.75-3.75M12 21V3" />
            </svg>
        </div>

        <div class="my-6">
            <button class="px-2 py-0.5 text-white bg-main rounded-md font-abel shadow shadow-purple-500 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
                Complete
            </button>
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