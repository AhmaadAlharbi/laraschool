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
                    {{ __("You're logged in!") }}
                </div>
                @livewire('assign-subject-to-classroom')

                {{-- <form action="" method="POST" class="max-w-md mx-auto py-6">
                    @csrf
                    <div class="mb-4">
                        <label for="classroom" class="block text-sm font-medium text-gray-700">Select Classroom</label>
                        <select id="classroom" name="classroom"
                            class="mt-1 block w-full p-2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">Select Classroom</option>
                            <!-- Populate with classrooms from the database -->
                            @foreach($classrooms as $classroom)
                            <option value="{{ $classroom->id }}">{{ $classroom->name }} -
                                {{$classroom->school_level->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Select Subjects</label>
                        <!-- Populate with subjects from the database -->
                        <div class="w-full">
                            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3  gap-4">
                                @foreach($departments as $department)
                                <div class="bg-white shadow-md rounded-lg p-4">
                                    <p class="text-sm font-medium text-gray-700">{{ $department->name }}</p>
                                    @foreach($subjects as $subject)
                                    @if ($subject->department_id === $department->id)
                                    <div class="flex items-center mt-2">
                                        <input type="checkbox" id="subject_{{ $subject->id }}" name="subjects[]"
                                            value="{{ $subject->id }}" class="mr-2">
                                        <label for="subject_{{ $subject->id }}" class="text-sm">{{ $subject->name
                                            }}</label>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Assign
                            Subjects</button>
                    </div>
                </form> --}}

            </div>
        </div>
    </div>
</x-app-layout>