<x-layout>
    <x-slot:content>
        <div class="bg-gray-800 max-w-screen-xl mx-auto rounded-3xl">
            <div class="bg-gray-800 rounded-t-3xl">
                <img class="rounded-t-3xl w-full h-96 object-cover" src="{{ asset('img/' . $job->image) }}" alt="{{ $job->title }}">
            </div>
            <div class="p-8">
                <div class="flex justify-between">
                    <h1 class="text-5xl font-extrabold text-white">{{ $job->title }}</h1>
                    @auth
                    @if (auth()->user()->id == $job->user_id)
                        <div class="flex gap-4">
                            <a href="{{ route('cafeOwner.postingjob.applicants', $job->id) }}">
                                <x-primarybutton>View Applicants</x-primarybutton>
                            </a>
                            
                            <a href="{{ route('cafeOwner.postingjob.edit', $job) }}">
                                <x-primarybutton>Edit</x-primarybutton>
                            </a>
                            
                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" 
                                    class="text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800" type="button">
                                Delete
                            </button>
                        </div>      
                    @endif
                    @endauth
                </div>

                <p class="text-gray-400 text-lg mt-4">Posted at {{ $job->created_at->format('Y-m-d') }} by {{ $job->user->firstName }} {{ $job->user->lastName }}</p>
                                
                <p class="text-white text-lg font-bold mt-8">Date and time</p>
                <p class="text-white text-lg font-light">{{ $job->date }}, {{ substr($job->time, 0, 5) }}</p>
                
                <p class="text-white text-lg font-bold mt-8">Overview</p>
                <p class="text-white text-lg font-light">{{ $job->description }}</p>
                
                <p class="text-white text-lg font-bold mt-8">Preferences</p>
                <div class="flex flex-wrap mt-4 gap-4">
                    @foreach (array_slice(explode(',', $job->preferences), 0, -1) as $preference)
                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            {{ $preference }}
                        </button>
                    @endforeach
                </div>
                
            </div>
        </div>

        <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this job?</h3>
                        <div class="flex justify-center">
                            <form action="{{ route('cafeOwner.postingjob.destroy', $job) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Yes, I'm sure
                                </button>
                            </form>
    
                            <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                No, cancel
                            </button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </x-slot:content>
</x-layout>