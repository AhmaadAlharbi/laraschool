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
                    {{ __("Edit Department") }} - {{$department->name}}
                </div>
                @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-10 py-3 rounded relative my-2"
                    role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li class="list-disc">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('departments.update', $department->id) }}" method="POST"
                    class="max-w-sm mx-auto pb-10">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" value="{{ $department->name }}"
                        class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-1/2 py-2 px-3">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>