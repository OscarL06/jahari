<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @paddleJS
</head>
<body class="h-full flex justify-between" x-data="{sidebar:false}">

    <div class="relative z-30 lg:hidden">
        <button class="bg-sky-700 w-12 h-12 rounded-md flex justify-center items-center fixed cursor-pointer top-2 left-2 border-2 border-sky-900" @click="sidebar= true">
            <svg x-show="!sidebar" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <svg x-show="sidebar" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <nav class="bg-sky-700 text-white w-3/4 md:w-1/3 lg:w-1/5 fixed h-full flex flex-col items-center rounded-r-xl z-20" x-show="sidebar" @click.away="sidebar = false" x-cloak x-transition:enter="slide-in-left" x-transition:leave="slide-out-left">
        <img src="/images/logo.png" alt="Logo" class="w-48">

        <div class="mt-4">
            <button class="text-2xl flex items-end">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
                {{ Auth::user()->username }}
            </button>
        </div>

        <div class="flex flex-col items-start w-full">
            <div class="flex flex-col items-start w-full mt-10 text-lg space-y-1">
            <a href="" class="w-full pl-3 hover:border-l-4 hover:border-white hover:bg-sky-800 hover:text-white">Profile</a>
            <a href="{{ route('categories') }}" class="w-full pl-3 hover:border-l-4 hover:border-white hover:bg-sky-800 hover:text-white">Courses</a>
            <a href="" class="w-full pl-3 hover:border-l-4 hover:border-white hover:bg-sky-800 hover:text-white">Subscribe</a>
            <a href="" class="w-full pl-3 hover:border-l-4 hover:border-white hover:bg-sky-800 hover:text-white">Practice Logs</a>
            <a href="" class="w-full pl-3 hover:border-l-4 hover:border-white hover:bg-sky-800 hover:text-white">Settings</a>
            <a href="{{ route('logout') }}" class="w-full pl-3 hover:border-l-4 hover:border-white hover:bg-sky-800 hover:text-white" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>   
        </div>
        </div>
    </nav>

    <nav class="hidden bg-sky-700 text-white lg:w-1/5 lg:fixed h-full lg:flex flex-col items-center rounded-r-xl z-20">
        <img src="/images/logo.png" alt="Logo" class="w-48">

        <div class="mt-4">
            <button class="text-2xl flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
                {{ Auth::user()->username }} {{ Auth::user()->points->points }} pts
            </button>
        </div>

        <div class="flex flex-col items-start w-full mt-10 text-lg space-y-1">
            <a href="" class="w-full pl-3 hover:border-l-4 hover:border-black hover:bg-white hover:text-black">Profile</a>
            <a href="{{ route('categories') }}" class="w-full pl-3 hover:border-l-4 hover:border-white hover:bg-sky-800 hover:text-white">Courses</a>
            <a href="" class="w-full pl-3 hover:border-l-4 hover:border-white hover:bg-sky-800 hover:text-white">Subscribe</a>
            <a href="" class="w-full pl-3 hover:border-l-4 hover:border-white hover:bg-sky-800 hover:text-white">Practice Logs</a>
            <a href="" class="w-full pl-3 hover:border-l-4 hover:border-white hover:bg-sky-800 hover:text-white">Settings</a>
            <a href="{{ route('logout') }}" class="w-full pl-3 hover:border-l-4 hover:border-white hover:bg-sky-800 hover:text-white" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>   
        </div>
    </nav>

    @yield('content')
</body>
</html>