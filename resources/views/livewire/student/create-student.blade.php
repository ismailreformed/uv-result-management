<x-ui-modal>
    <x-slot name="title">
        {{ $this->form->editMode ? 'Update' : 'Create'}} Student
    </x-slot>

    <x-slot name="content">
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 gap-3 items-start justify-start">
                <div class="grid-cols-1">
                    <h5 class="text-md text-start font-medium text-gray-900">Select Department</h5>
                    <select
                        wire:model="form.department_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    >
                        <option value="">Select Department</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="grid-cols-1  items-start">
                    <h5 class="text-md text-start font-medium text-gray-900">Student Name:</h5>
                    <input
                        wire:model="form.name"
                        type="text"
                        id="name"
                        placeholder="Enter student name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full px-4 p-2 "
                    >
                    @error('form.name') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="grid-cols-1  items-start">
                    <h5 class="text-md text-start font-medium text-gray-900">Student Roll:</h5>
                    <input
                        wire:model="form.roll"
                        type="text"
                        id="roll"
                        placeholder="Enter student roll"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full px-4 p-2 "
                    >
                    @error('form.roll') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="grid-cols-1  items-start">
                    <h5 class="text-md text-start font-medium text-gray-900">Session:</h5>
                    <input
                        wire:model="form.session"
                        type="number"
                        id="session"
                        placeholder="Enter session"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full px-4 p-2 "
                    >
                    @error('form.session') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex items-center justify-end mt-5 ">
                <button
                    type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg"
                >
                    Submit
                </button>
            </div>
        </form>
    </x-slot>

{{--    <x-slot name="buttons">--}}
{{--       --}}
{{--    </x-slot>--}}
</x-ui-modal>
