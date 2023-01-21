@extends('layouts.main')

@section('title', $lesson->name . ' | ' . Auth::user()->username)

@section('content')
    <div class="w-full lg:w-4/5 flex flex-col items-center lg:ml-[20%] mt-6">
        <h1 class="text-5xl tracking-tighter font-abel">{{ $lesson->course->name }} | {{ $lesson->name }}</h1>
        {{-- <a href="/courses/{{ $lesson->course->id }}">back</a> --}}

        {{-- <div class="flex flex-col">
            @foreach( $lesson->course->materials as $less)
                <a href="/courses/lesson/{{ $less->id }}" @class(['rounded-md px-2','bg-green-500' => Request::route()->parameter('id') == $less->id])>{{ $less->name }}</a>
            @endforeach
            
        </div> --}}
        
        <div class="flex justify-center mt-16">
            <video src="/videos/{{ $lesson->video->url }}" class="w-1/2 rounded-lg" controls></video> 
        </div>

        <div class="w-3/5 rounded-md">
            @foreach($lesson->slices as $slices)
                <iframe src="{{ $slices->url }}" width="100%" height="500" frameBorder="0" allowfullscreen class="my-10 rounded-lg"></iframe>
            @endforeach  
        </div>
    </div>
@endsection