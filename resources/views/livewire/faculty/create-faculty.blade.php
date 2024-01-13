<x-modal>
    <x-slot name="title">
        {{ $this->form->editMode ? 'Update' : 'Create'}} Faculty
    </x-slot>

    <x-slot name="content">
        <form wire:submit.prevent="save">
            <div class="flex items-center justify-start">
                <label for="name" class="text-md font-medium text-gray-900 mr-4">Faculty Name:</label>
                <div class="flex ml-3">
                    <input
                        wire:model="form.name"
                        type="text"
                        id="name"
                        placeholder="Enter faculty name"
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
