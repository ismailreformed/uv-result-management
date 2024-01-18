<div class="relative">
    <input
        wire:model="query"
        wire:keyup.debounce.300ms="queryUpdated"
        wire:focus="toggleList(true)"
        wire:blur="toggleList(false)"
        type="text"
        placeholder="Search by name, roll etc"
        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
    />

    @if($showList)
        <div class="absolute bg-gray-100 shadow-2xl shadow-gray-400 w-full mt-1 rounded-sm z-30 max-h-32 overflow-y-scroll">
            @foreach($students as $student)
             <div
                 wire:click="selectStudent({{ $student->id }})"
                 class="cursor-pointer p-2 hover:bg-blue-100 {{$query === sprintf('%s - %s', $student->roll, $student->name) ? 'bg-blue-200' : ''}}"
             >
                 {{ $student->roll }} - {{ $student->name }}
             </div>
            @endforeach
        </div>
    @endif
</div>
