@extends('layouts.main')

@section('title', 'Subscribe | ' . Auth::user()->username)

@section('content')
    <div class="w-full lg:w-4/5 flex flex-col items-center lg:ml-[20%] mt-6">
        
        <h1 class="text-6xl">Pricing Plans</h1>
        <p class="w-3/4 mt-6 text-center">
            Welcome! We offer four separate subscription plans to choose from.
            No matter which plan you choose, you will have access to our expertly-crafted piano lessons and interactive exercises. 
            Sign up today and start your journey to becoming a skilled pianist!
        </p>

        <div class="grid grid-cols-3 gap-6 px-6 mt-20">
            <div class="flex flex-col justify-between w-full p-5 bg-white rounded-md shadow-xl">
                <h2 class="text-2xl tracking-tighter text-purple-800">Monthly</h2>
                <h3 class="pt-5 text-5xl font-semibold">$80<span class="text-base text-gray-600">/mo</span></h3>
                <p class="py-4">
                    With this plan, you will have access to all of our piano lessons and resources for a monthly fee. This is a great option for those who want 
                    to try out our platform or only need access for a short period of time.
                </p>
                <x-paddle-button :url="$payLink" class="px-4 py-1 text-center text-white rounded-md hover:bg-purple-900 bg-main" data-theme="none">Get Access</x-paddle-button>
            </div>
            <div class="flex flex-col justify-between w-full p-5 bg-white rounded-md shadow-xl">
                <h2 class="text-2xl tracking-tighter text-purple-800">Biannual</h2>
                <h3 class="pt-5 text-5xl font-semibold">$450<span class="text-base text-gray-600">/6-mos</span></h3>
                <p class="py-4">
                    This plan offers a discounted rate for a six-month subscription. It is a good choice for those who are committed to their piano studies 
                    and want to save money over the long term.
                </p>
                <x-paddle-button :url="$payLinkSix" class="px-4 py-1 text-center text-white rounded-md bg-main" data-theme="none">Get Access</x-paddle-button>
            </div>
            <div class="flex flex-col justify-between w-full p-5 bg-white rounded-md shadow-xl">
                <h2 class="text-2xl tracking-tighter text-purple-800">Annualy</h2>
                <h3 class="pt-5 text-5xl font-semibold">$900<span class="text-base text-gray-600">/yr</span></h3>
                <p class="py-4">
                    This plan offers a discounted rate for a six-month subscription. It is a good choice for those who are committed to their piano studies 
                    and want to save money over the long term.
                </p>
                <x-paddle-button :url="$yearly" class="px-4 py-1 text-center text-white rounded-md hover:bg-purple-900 bg-main" data-theme="none">Get Accesss</x-paddle-button>
            </div>
        </div>

        <div class="flex justify-center my-16">
            <div class="flex flex-col p-5 mx-6 bg-white rounded-md shadow-xl items-between">
                <div class="flex items-center justify-between">
                    <div class="flex flex-col items-center order-2 w-1/4">
                        <h3 class="pt-5 text-5xl font-semibold">$999</h3>
                        <x-paddle-button :url="$lifetime" class="w-3/4 px-4 py-1 mt-4 text-center text-white rounded-md bg-main hover:bg-purple-900" data-theme="none">Get Access</x-paddle-button>
                    </div>
                    <div class="order-1 w-3/4 py-4">
                        <h2 class="mb-5 text-2xl tracking-tighter text-purple-800">Lifetime</h2>
                        <p>
                            Our lifetime subscription gives you access to all of our piano lessons and resources for as long as our platform is in operation. 
                            This is the ultimate option for those who want to dedicate themselves to their piano studies and have a lifetime of learning at their fingertips.
                        </p>
                    </div>  
                </div>  
            </div>
        </div>
    </div>
@endsection