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
                    {{ __("This is sublasses for class ") }}
                    <p class="text-lg font-bold text-gray-400">{{$classrooms->name}}</p>

                </div>
                <div class="overflow-x-auto shadow-md sm:rounded-lg">
                    <table
                        class="w-full text-sm text-left rtl:text-right divide-y bg-white divide-gray-200 dark:divide-gray-700">
                        <thead class="text-xs uppercase dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left dark:bg-gray-800 dark:text-gray-400">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3 text-left dark:bg-gray-800 dark:text-gray-400">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left dark:bg-gray-800 dark:text-gray-400">
                                    School Level
                                </th>
                                <th scope="col" class="px-6 py-3 text-left dark:bg-gray-800 dark:text-gray-400">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($classrooms->subclassrooms as $subclassroom)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap dark:text-gray-400">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap dark:text-gray-400">
                                    <a href="{{ route('classrooms.show', $subclassroom->id) }}"
                                        class="text-blue-500 font-bold cursor-pointer">
                                        {{ $subclassroom->name }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap dark:text-gray-400">
                                    {{$subclassroom->classroom->school_level->name}}

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    {{$subclassroom->classroom->name}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
    </div>
</x-app-layout>