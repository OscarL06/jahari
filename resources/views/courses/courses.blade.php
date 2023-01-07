@extends('layouts.main')

@section('title', $course->name . ' | ' . Auth::user()->username)

@section('content')
    <div class="w-full lg:w-4/5 flex flex-col items-center lg:ml-[20%] mt-6">
        <h1>{{ $course->name }}</h1>
        <div class="flex flex-col">
            @foreach($course->materials as $lesson)
                <a href="/courses/lesson/{{ $lesson->id }}" @class(['rounded-md px-2','bg-green-500' => Request::route()->parameter('id') == $lesson->id])>{{ $lesson->name }}</a>
            @endforeach
        </div>
    </div>
@endsection