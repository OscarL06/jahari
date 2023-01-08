@extends('layouts.main')

@section('title', 'Subscribe | ' . Auth::user()->username)

@section('content')
    <div class="w-full lg:w-4/5 flex flex-col items-center lg:ml-[20%] mt-6">
        <x-paddle-button :url="$payLink" class="px-8 py-4">Monthly</x-paddle-button>
        <x-paddle-button :url="$payLinkSix" class="px-8 py-4">Six</x-paddle-button>
        <x-paddle-button :url="$lifetime" class="px-8 py-4">Lifetime</x-paddle-button>
        <x-paddle-button :url="$yearly" class="px-8 py-4">Yearly</x-paddle-button>
    </div>
@endsection