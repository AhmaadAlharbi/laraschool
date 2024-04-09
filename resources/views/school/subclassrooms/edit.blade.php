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
                    {{ __("Update the name of subclassroom") }}
                </div>
                <form action="{{ route('subclassrooms.update', $subclassroom->id) }}" method="post"
                    class="max-w-md mx-auto">
                    @csrf
                    @method('PATCH')
                    <div class="mb-4">
                        <label for="subclassroom-name" class="block text-sm font-medium text-gray-700">Subclassroom
                            Name</label>
                        <input type="text" id="subclassroom-name" name="name" value="{{ $subclassroom->name }}"
                            class="mt-1 block w-full p-2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div class="mb-4">
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>