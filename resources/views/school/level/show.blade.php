<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Show classrooms for $schoolLevel->name") }}
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  gap-10 bg-gray-100 py-4 px-8">
                    <!-- Loop through each classroom -->
                    @foreach($schoolLevel->classrooms as $classroom)
                    <div class="bg-white shadow-md rounded-lg p-4 flex flex-col justify-between">
                        <div>
                            <h2 class="text-lg font-semibold mb-2">{{ $classroom->name }}</h2>
                            <h3 class="text-gray-500">{{ $classroom->school_level->name }}</h3>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <!-- Add icons -->
                            <div class="flex items-center space-x-2">
                                <!-- Icon for classroom -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 2a1 1 0 011 1v2h3a1 1 0 011 1v2a1 1 0 01-1 1h-1v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V9H6a1 1 0 01-1-1V6a1 1 0 011-1h3V3a1 1 0 011-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                <!-- Add other icons as needed -->
                            </div>
                            <!-- Add more buttons/icons or actions here -->
                            <a href="{{route('classrooms.edit',$classroom->id)}}"
                                class="text-gray-500 hover:text-indigo-600 focus:outline-none">
                                Edit
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>


            </div>
        </div>
    </div>
</x-app-layout>