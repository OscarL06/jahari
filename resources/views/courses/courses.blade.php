@extends('layouts.main')

@section('title', $course->name . ' | ' . Auth::user()->username)

@section('content')
    <div class="w-full lg:w-4/5 flex flex-col items-center lg:ml-[20%] mt-6">
        <div class="w-[95%]">
            <h1 class="text-5xl">{{ $course->name }}</h1>
            <p class="px-2 mt-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero placeat ipsam laboriosam fuga veritatis, et minus optio accusantium magnam culpa officia ad error</p>

            <div class="flex justify-center w-full">
                <div class="flex flex-col items-start w-3/5">
                    <h2 class="mt-20 text-2xl">Lessons</h2>
                    <div class="flex flex-col items-center w-full py-12 space-y-6 border border-gray-200 rounded-lg shadow">
                        @foreach($course->materials as $lesson)
                            <a class="w-4/5 px-4 py-3 text-white rounded-md bg-gradient-to-r from-purple-700 to-purple-600" href="/courses/lesson/{{ $lesson->id }}">{{ $lesson->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection