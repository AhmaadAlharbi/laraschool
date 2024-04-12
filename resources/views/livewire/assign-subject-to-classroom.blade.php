<div>
    <form wire:submit.prevent="assignSubjectsToClassroom" class="max-w-md mx-auto">
        <!-- School Level select -->
        <div class="mb-4">
            <label for="school-level" class="block text-sm font-medium text-gray-700">Select School Level</label>
            <select id="school-level" name="school-level" wire:model="schoolLevelId" wire:change="getClassrooms"
                class="mt-1 block w-full p-2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">Select School Level</option>
                @foreach($schoolLevels as $schoolLevel)
                <option value="{{ $schoolLevel->id }}">{{ $schoolLevel->name }}</option>
                @endforeach
            </select>
            @error('schoolLevelId') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Classroom select -->
        <div class="mb-4">
            <label for="classroom" class="block text-sm font-medium text-gray-700">Select Classroom</label>
            <select id="classroom" name="classroom" wire:model="classroomId" wire:change="checkSelectedSubjects"
                class="mt-1 block w-full p-2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">-</option>
                @foreach($classrooms as $classroom)
                <option value="{{ $classroom->id }}">{{ $classroom->name }} - id => {{$classroom->id}}</option>
                @endforeach
            </select>
            @error('classroomId') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- New Subclassroom input -->
        <div class="mb-4">

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Select Subjects</label>
                <!-- Populate with subjects from the database -->
                <div class="w-full">
                    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 gap-4">
                        @foreach($departments as $department)
                        <div class="bg-white shadow-md rounded-lg p-4">
                            <p class="text-sm font-medium text-gray-700">{{ $department->name }}</p>
                            @foreach($subjects as $subject)
                            @if ($subject->department_id === $department->id)
                            <div class="flex items-center mt-2">
                                <input type="checkbox" id="subject_{{ $subject->id }}" wire:model="selectedSubjects"
                                    value="{{ $subject->id }}" class="mr-2" @if(in_array($subject->id,
                                $assignedSubjects[$classroomId] ?? []))
                                checked="checked"
                                @endif>



                                <label for="subject_{{ $subject->id }}"
                                    class="text-sm @if(in_array($subject->id, $assignedSubjects[$classroomId] ?? [])) text-gray-500 @endif">{{
                                    $subject->name }} - {{$subject->id}}</label>
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

        </div>
    </form>
</div>