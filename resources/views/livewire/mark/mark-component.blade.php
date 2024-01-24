<div>
    <section >
        <div class="max-w-screen-xl">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="grid grid-cols-4 gap-4 p-4 justify-end items-end">
                    <div class="grid-cols-2">
                        <label class="text-md font-medium text-gray-900">Search</label>
                        <input
                            wire:model.live.debounce.300ms="search" type="text"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full px-4 p-2 "
                               placeholder="search name" required="">
                    </div>

                    <div class="grid-cols-2">
                        <button
                            type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-lg justify-center items-end"
                            wire:click="$dispatch('openModal', { component: 'mark.create-mark' })"
                        >
                            Add Marks
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                        <tr>
                            @include('livewire.includes.table-sortable-th',[
                                'name' => 'student_id',
                                'displayName' => 'Student Name'
                            ])
                            @include('livewire.includes.table-sortable-th',[
                                'name' => 'semester_id',
                                'displayName' => 'Semester Name'
                            ])
                            @include('livewire.includes.table-sortable-th',[
                                'name' => 'exam_id',
                                'displayName' => 'Exam Name'
                            ])
                            @include('livewire.includes.table-sortable-th',[
                                'name' => 'subject_id',
                                'displayName' => 'Subject Name'
                            ])
                            @include('livewire.includes.table-sortable-th',[
                                'name' => 'grade_id',
                                'displayName' => 'Grade'
                            ])
                            @include('livewire.includes.table-sortable-th',[
                                'name' => 'credit_earned',
                                'displayName' => 'Credit Earned'
                            ])
                            @include('livewire.includes.table-sortable-th',[
                               'name' => 'created_by_user_id',
                               'displayName' => 'Created By'
                           ])
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($marks as $item)
                            <tr wire:key="{{ $item->id }}" class="border-b dark:border-gray-700">
                                <td class="px-4 py-3">{{ $item->student->name }}</td>
                                <td class="px-4 py-3">{{ $item->semester->name }}</td>
                                <td class="px-4 py-3">{{ $item->exam->name }}</td>
                                <td class="px-4 py-3">{{ $item->subject->name }}</td>
                                <td class="px-4 py-3">{{ $item->grade->grade_letter }}</td>
                                <td class="px-4 py-3">{{ $item->credit_earned }}</td>
                                <td class="px-4 py-3">{{ $item->created_by_user->name }}</td>
                                <td class="px-4 py-3 flex items-start justify-center">
                                    <button
                                        type="submit"
                                        wire:click="$dispatch('openModal', { component: 'mark.update-mark', arguments: { mark: {{ $item->id }} } })"
                                    >
                                        <x-heroicons::mini.solid.pencil-square class="w-5 h-5 text-blue-600" />
                                    </button>

{{--                                    <button--}}
{{--                                        onclick="confirm('Are you sure you want to delete {{ $item->name }} ?') || event.stopImmediatePropagation()"--}}
{{--                                        wire:click="delete({{ $item->id }})"--}}
{{--                                    >--}}
{{--                                        <x-heroicons::mini.solid.trash class="w-5 h-5 text-red-600" />--}}
{{--                                    </button>--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="py-4 px-3">
                    <div class="flex ">
                        <div class="flex space-x-2 items-center">
                            <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                            <select
                                wire:model.live='perPage'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            >
                                <option value="5">5</option>
                                <option value="7">7</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                    {{ $marks->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
