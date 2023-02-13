@extends('layouts.main')

@section('title', 'Practice Logs | ' . Auth::user()->username)

@section('content')
    <div class="w-full lg:w-4/5 flex flex-col items-center lg:ml-[20%] mt-6">
        <h1 class="text-6xl tracking-tighter font-abel">Practice Logs</h1>

        @if(session()->has('practice-deleted'))
            <div class="px-5 mt-10 text-xl text-purple-900 rounded-md font-abel bg-purple-50 fade-out">
                {{ session()->get('practice-deleted') }}
            </div>
        @endif

        <!-- Practice -->
        <div class="w-11/12 mb-12 mt-28">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-gray-900 font-abel">Practice Logs</h1>
                        <p class="mt-2 text-sm text-gray-700">A list of all of your practice sessions</p>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        <button type="button" class="inline-flex items-center justify-center px-4 py-2 font-medium text-white border border-transparent rounded-md shadow-sm bg-main sm:w-auto font-abel" @click="practice = true">Practice</button>
                    </div>
                </div>
                <div class="mt-8 mb-4 -mx-4 overflow-hidden rounded-lg shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0">
                    <table class="min-w-full divide-y divide-gray-300 font-abel">
                        <thead class="bg-gray-50">
                            <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Date</th>
                            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Duration</th>
                            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">Name</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                <span class="sr-only">Remove</span>
                            </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($logs as $log )
                                <tr>
                                    <td class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-900 max-w-0 sm:w-auto sm:max-w-none sm:pl-6">
                                        {{ date("m/d/Y", strtotime($log->created_at)) }}
                                        <dl class="font-normal lg:hidden">
                                        <dt class="sr-only">Time</dt>
                                        <dd class="mt-1 text-gray-700 truncate">{{ $log->duration }}</dd>
                                        <dt class="sr-only sm:hidden">Description</dt>
                                        <dd class="mt-1 text-gray-500 truncate sm:hidden">{{ $log->name }}</dd>
                                        </dl>
                                    </td>
                                    <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ $log->duration }}</td>
                                    <td class="hidden px-3 py-4 text-sm text-gray-500 sm:table-cell">{{ $log->name }}</td>
                                    <td class="py-4 pl-3 pr-4 text-sm font-medium text-right sm:pr-6">
                                        <a href="/practice/delete/{{ $log->id }}" class="p-2 font-mono text-purple-900 rounded-md bg-purple-50 hover:bg-purple-100" onclick="event.preventDefault(); document.getElementById('delete-practice').submit();">Remove</a>
                                        <form id="delete-practice" action="{{ route('delete-practice', ['id' => $log->id]) }}" method="POST" style="display: none;"> @csrf @method('delete')</form>  
                                    </td>
                                </tr>
                            @empty
                                 <tr>
                                    <td class="py-4 pl-4 pr-3 text-sm font-medium text-center text-gray-900" colspan="4">
                                        You have not recorded any practice sessions.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <x-back-button class="top-4 right-4"/>
@endsection