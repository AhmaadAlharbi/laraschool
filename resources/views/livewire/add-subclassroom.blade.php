<div>
    <h1>Add new subclass</h1>
    <form wire:submit.prevent="submitForm" class="max-w-md mx-auto">
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
            <select id="classroom" name="classroom" wire:model="classroomId"
                class="mt-1 block w-full p-2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">-</option>
                @foreach($classrooms as $classroom)
                <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                @endforeach
            </select>
            @error('classroomId') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- New Subclassroom input -->
        <div class="mb-4">
            <label for="new-subclassroom" class="block text-sm font-medium text-gray-700">New Subclassroom</label>
            <input id="new-subclassroom" name="new-subclassroom" type="text" wire:model="newSubclassroom"
                class="mt-1 block w-full p-2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @error('newSubclassroom') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Submit button -->
        <div class="mb-4">
            <button type="submit"
                class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600">
                Add Subclassroom
            </button>
        </div>
    </form>

    <!-- Success message -->
    @if(session()->has('success'))
    <div class="text-green-500">{{ session('success') }}</div>
    @endif
</div>
<!-- SweetAlert script -->
<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('showSuccessMessage', function () {
            Swal.fire({
                title: 'Success',
                text: '{{ $successMessage }}',
                icon: 'success',
                timer: 3000
            });
        });
    });
</script>