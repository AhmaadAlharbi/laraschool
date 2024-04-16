<div>
    <form wire:submit.prevent="assignTeachers">
        <h2 class="text-xl font-bold mb-4">Subject: {{$subject->name}}</h2>
        <p class="mb-4">Department: {{$subject->department->name}}</p>
        @foreach($teachers as $teacher)
        <label class="block mb-2">
            <div class="bg-white shadow-md rounded-lg p-4">
                <div class="flex items-center">
                    <input type="checkbox" wire:model="selectedTeachers" value="{{$teacher->id}}"
                        class="form-checkbox h-4 w-4 @if(in_array($teacher->id, $selectedTeachers)) font-semibold text-green-600 @endif"
                        text-indigo-600 transition duration-150 ease-in-out">
                    <span
                        class="ml-2 @if(in_array($teacher->id, $selectedTeachers)) font-semibold text-green-600 @endif">{{$teacher->name}}</span>
                </div>
            </div>
        </label>
        @endforeach

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-10">
            Submit
        </button>
    </form>


</div>