<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Classrooms') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
                <a href="{{route('classrooms.create')}}"
                    class="text-white hover:bg-blue-900 ml-4 bg-blue-950 py-2 px-4 rounded-lg cursor-pointer mb-10 inline-block">Add
                    new
                    Level</a>

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
                            @foreach($classrooms as $classroom)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap dark:text-gray-400">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap dark:text-gray-400">
                                    <a href="{{route('classrooms.show',$classroom->id)}}"
                                        class="text-blue-500 font-bold cursor-pointer"> {{ $classroom->name }}</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap dark:text-gray-400">
                                    <a class="text-blue-900 font-bold "
                                        href="{{route('levels.show',$classroom->school_level_id)}}"> {{
                                        $classroom->school_level->name }}</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-gray-400">
                                    <a href="{{ route('classrooms.edit', $classroom->id) }}"
                                        class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <!-- Inside your table in Blade view -->
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <form id="deleteForm-{{ $classroom->id }}"
                                        action="{{ route('classrooms.destroy', $classroom->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <button onclick="confirmDelete('{{ $classroom->id }}')"
                                        class="text-red-600 hover:text-red-900 ml-4 focus:outline-none">
                                        Delete
                                    </button>

                                </td>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this record!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    document.getElementById('deleteForm-' + id).submit();
                } else {
                    swal("The record is safe!");
                }
            });
        }
    </script>
    <!-- Add this script block at the end of your Blade layout or view -->
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
        @if(session('success'))
            swal({
                title: "Success",
                text: "{{ session('success') }}",
                icon: "success",
                button: "OK",
            });
        @endif
    });
    </script>
</x-app-layout>