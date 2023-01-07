@extends('layouts.main')

@section('title', 'Courses | ' . Auth::user()->username)

@section('content')
    <div class="w-full lg:w-4/5 flex flex-col items-center lg:ml-[20%] mt-6">
        <div>
            <h2>Courses...</h2>
            @foreach($categories as $category)
                <a href="#{{ $category->name }}" class="bg-sky-700 text-white rounded-md px-2 py-1">{{ $category->name }}</a>
            @endforeach
        </div>

        <div class="w-full flex flex-col items-center mt-10">
             @foreach($categories as $category)
                <h3 id="{{ $category->name }}" class="mt-8">{{ $category->name }}</h3>
                <div class="w-10/12 grid grid-cols-4 gap-4 bg-green-600">
                    @foreach($category->courses as $course)
                        <a href="/courses/{{ $course->id }}" class="w-4/5 bg-sky-700 rounded-md">
                            {{ $course->name }}
                        </a>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection