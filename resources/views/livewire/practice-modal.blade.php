<div x-show.transition.duration.500ms="practice"class="fixed inset-0 flex items-center justify-center px-4 bg-black bg-opacity-75 md:px-0">
    <div class="flex flex-col max-w-lg p-6 bg-white rounded-lg shadow-2xl" @click.away="practice = false">
        <div class="flex justify-between mb-4">
            <h3 class="text-3xl font-abel">Practice</h3>
            <button @click="practice = false">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-purple-700">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </button>
        </div>
        <div class="py-2 rounded-md shadow lg:p-4 watch font-abel bg-main">
            <div class="px-2 text-white rounded-lg text-7xl time lg:text-8xl bg-main">00:00:00</div>
            <div class="flex justify-around mt-6 text-black">
                <button id="start" class="px-2 py-1 bg-white rounded-md lg:px-8">Start</button>
			    <button id="stop" class="px-2 py-1 bg-white rounded-md lg:px-8">Stop</button>
			    <button id="reset" class="px-2 py-1 bg-white rounded-md lg:px-8">Reset</button>
            </div>
        </div>
        <input type="text" placeholder="Practice Session Name" class="mt-4 border border-purple-700 rounded-md font-abel focus:ring-1 focus:ring-purple-700">
        <button class="w-full py-2 mt-8 text-white rounded-md shadow bg-main hover:opacity-90">Save</button>
    </div>
</div>
