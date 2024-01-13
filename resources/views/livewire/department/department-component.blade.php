<div>
    <section class="mt-10">
        <div class="mx-auto max-w-screen-xl px-6 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="grid grid-cols-6 gap-4 items-center justify-between px-4 py-3">
                    <div class="col-start-1 col-end-2 ">
                        <label class="text-md font-medium text-gray-900">Search</label>
                        <input
                            wire:model.live.debounce.300ms="search" type="text"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                               placeholder="search name, amount etc" required="">
                    </div>

                    <div class="col-start-2 col-end-4 mt-6 ">
                        <button
                            type="submit"
                            class="px-4 py-2 bg-red-500 text-white rounded-lg justify-center items-end"
                            wire:click="$dispatch('openModal', { component: 'department.create-department' })"
                        >
                            Create Department
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                        <tr>
                            @include('livewire.includes.table-sortable-th',[
                                'name' => 'name',
                                'displayName' => 'Name'
                            ])
                            @include('livewire.includes.table-sortable-th',[
                                'name' => 'faculty_id',
                                'displayName' => 'Faculty Name'
                            ])
                            @include('livewire.includes.table-sortable-th',[
                               'name' => 'created_by_user_id',
                               'displayName' => 'Created By'
                           ])
                            @include('livewire.includes.table-sortable-th',[
                               'name' => 'created_at',
                               'displayName' => 'Created'
                           ])
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($departments as $item)
                            <tr wire:key="{{ $item->id }}" class="border-b dark:border-gray-700">
                                <td class="px-4 py-3">{{ $item->name }}</td>
                                <td class="px-4 py-3">{{ $item->faculty->name }}</td>
                                <td class="px-4 py-3">{{ $item->created_by_user->name }}</td>
                                <td class="px-4 py-3">{{ $item->created_at }}</td>
                                <td class="px-4 py-3 flex items-start justify-center">
                                    <button
                                        type="submit"
                                        wire:click="$dispatch('openModal', { component: 'department.update-department', arguments: { department: {{ $item->id }} } })"
                                    >
                                        <x-heroicons::mini.solid.pencil-square class="w-5 h-5 red-text" />
                                    </button>

                                    <button
                                        onclick="confirm('Are you sure you want to delete {{ $item->name }} ?') || event.stopImmediatePropagation()"
                                        wire:click="delete({{ $item->id }})"
                                    >
                                        <x-heroicons::mini.solid.trash class="w-5 h-5 red-text" />
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="py-4 px-3">
                    <div class="flex ">
                        <div class="flex space-x-4 items-center mb-3">
                            <label class="w-44 text-sm font-medium text-gray-900">Per Page</label>
                            <select wire:model.live='perPage'
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="5">5</option>
                                <option value="7">7</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                    {{ $departments->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
