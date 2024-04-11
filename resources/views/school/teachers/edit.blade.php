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
                    {{ __("Edit Subject") }}
                </div>

                <form action="{{ route('subjects.update', $subject->id) }}" method="POST"
                    class="max-w-sm mx-auto pb-10">
                    @csrf
                    @method('PUT')

                    <!-- Subject Name Input -->
                    <div class="mb-5">
                        <label for="name" class="block text-sm font-medium text-gray-700">Subject Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $subject->name) }}"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                        <!-- Validation Error -->
                        @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Department Selection -->
                    <div class="mb-5">
                        <label for="school_level" class="block text-sm font-medium text-gray-700">Select A
                            Department</label>
                        <select name="department" id="department"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="{{ $subject->department_id }}">{{ $subject->department->name }}</option>
                            @foreach($departments as $department)
                            @if($department->id != $subject->department_id)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endif
                            @endforeach
                        </select>

                        <!-- Validation Error -->
                        @error('department')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="inline-flex items-center justify-center w-full px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Update Subject
                    </button>
                </form>


            </div>
        </div>
    </div>
</x-app-layout>