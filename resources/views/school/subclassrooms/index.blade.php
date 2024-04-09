<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Subclassrooms ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Subclassrooms") }}
                </div>
                <a href="{{route('subclassrooms.create')}}"
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
                                    Classroom
                                </th>
                                <th scope="col" class="px-6 py-3 text-left dark:bg-gray-800 dark:text-gray-400">
                                    School
                                </th>

                                <th scope="col" class="px-6 py-3 text-left dark:bg-gray-800 dark:text-gray-400">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($subclassrooms as $subclassroom)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap dark:text-gray-400">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap dark:text-gray-400 text-blue-900 font-bold">
                                    <a href="{{route('subclassrooms.show',$subclassroom->class_room_id)}}">
                                        {{ $subclassroom->name }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap dark:text-gray-400 text-blue-900 font-bold">
                                    <a href="{{route('classrooms.show',$subclassroom->class_room_id)}}">
                                        {{ $subclassroom->classroom->name }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap dark:text-gray-400 text-blue-900 font-bold">
                                    <a href="{{route('levels.show',$subclassroom->classroom->school_level->id)}}">
                                        {{ $subclassroom->classroom->school_level->name }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-gray-400">
                                    <a href="{{ route('subclassrooms.edit', $subclassroom->id) }}"
                                        class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <!-- Inside your table in Blade view -->
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <form id="deleteForm-{{ $subclassroom->id }}"
                                        action="{{ route('subclassrooms.destroy', $subclassroom->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <button onclick="confirmDelete('{{ $subclassroom->id }}')"
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
    {{--delete subclassroom sweetalert message confirmation--}}
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
</x-app-layout>