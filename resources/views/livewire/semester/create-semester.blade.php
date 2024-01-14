<x-modal>
    <x-slot name="title">
        {{ $this->form->editMode ? 'Update' : 'Create'}} Semester
    </x-slot>

    <x-slot name="content">
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 gap-3 items-start justify-start">
                <div class="grid-cols-1">
                    <h5 class="text-md text-start font-medium text-gray-900">Semester Name:</h5>
                    <input
                        wire:model="form.name"
                        type="text"
                        id="code"
                        placeholder="Enter semester name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full px-4 p-2 "
                    >
                    @error('form.name') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="grid-cols-1">
                    <h5 class="text-md text-start font-medium text-gray-900">Duration in Month:</h5>
                    <input
                        wire:model="form.duration_in_month"
                        type="number"
                        id="code"
                        placeholder="Enter semester name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full px-4 p-2 "
                    >
                    @error('form.duration_in_month') <span class="error">{{ $message }}</span> @enderror
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
</x-modal>
