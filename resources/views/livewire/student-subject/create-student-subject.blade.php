<x-ui-modal>
    <x-slot name="title">
        {{ $this->form->editMode ? 'Update' : 'Create'}} Student Subject
    </x-slot>

    <x-slot name="content">
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 gap-3 items-start justify-start">
                <div class="grid-cols-1">
                    <h5 class="text-md text-start font-medium text-gray-900">Select Student</h5>
                    <livewire:student.student-autocomplete :selectedStudent="$selectedStudent"  />
                    @error('form.student_id') <span class="error text-red-600">{{ $message }}</span> @enderror
                </div>

                <div class="col-cols-1 items-start">
                    <h5 class="text-md text-start font-medium text-gray-900">Select Semester</h5>
                    <select
                        wire:model="form.semester_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    >
                        <option value="">Select Semester</option>
                        @foreach($semesters as $semester)
                            <option value="{{ $semester->id }}">{{ $semester->name }}</option>
                        @endforeach
                    </select>
                    @error('form.semester_id') <span class="error text-red-600">{{ $message }}</span> @enderror
                </div>

                <div class="grid-cols-1">
                    <h5 class="text-md text-start font-medium text-gray-900">Select Subject</h5>
                    <livewire:subject.subject-autocomplete :selectedSubject="$selectedSubject" />
                    @error('form.subject_id') <span class="error text-red-600">{{ $message }}</span> @enderror
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

