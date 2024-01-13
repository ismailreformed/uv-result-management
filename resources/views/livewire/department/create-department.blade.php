<x-modal>
    <x-slot name="title">
        {{ $this->form->editMode ? 'Update' : 'Create'}} Department
    </x-slot>

    <x-slot name="content">
        <form wire:submit.prevent="save">
            <div class="grid columns-1 items-start justify-start">
                <div class="col-start-1 col-end-12  items-start">
                    <h5 class="text-md text-start font-medium text-gray-900">Select Faculty</h5>
                    <select
                        wire:model="form.faculty_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    >
                        <option value="">Select Faculty</option>
                        @foreach($faculties as $faculty)
                            <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid columns-1 items-start justify-start mt-5">
                <div class="col-start-1 col-end-12  items-start">
                    <h5 class="text-md text-start font-medium text-gray-900">Department Name:</h5>
                    <input
                        wire:model="form.name"
                        type="text"
                        id="name"
                        placeholder="Enter department name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                    >
                    @error('form.name') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex items-center justify-center mt-5 ">
                <button
                    type="submit"
                    class="px-4 py-2 bg-red-600 text-white rounded-lg justify-center items-end"
                >
                    Submit
                </button>
            </div>
        </form>
    </x-slot>

{{--    <x-slot name="buttons">--}}
{{--       --}}
{{--    </x-slot>--}}
</x-modal>
