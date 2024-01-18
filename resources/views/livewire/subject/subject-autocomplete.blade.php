<div class="relative">
    <input
        wire:model="query"
        wire:keyup.debounce.300ms="queryUpdated"
        wire:focus="toggleList(true)"
        wire:blur="toggleList(false)"
        type="text"
        placeholder="Search by name, code etc"
        class=" bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
    />

    @if($showList)
        <div class="absolute bg-gray-100 shadow-2xl shadow-gray-400 w-full mt-1 rounded-sm z-30 max-h-32 overflow-y-scroll">
            @foreach($subjects as $subject)
             <div
                 wire:click="selectSubject({{ $subject->id }})"
                 class="cursor-pointer p-2 hover:bg-blue-100 {{$query === sprintf('%s - %s', $subject->code, $subject->name) ? 'bg-blue-200' : ''}}"
             >
                 {{ $subject->code }} - {{ $subject->name }}
             </div>
            @endforeach
        </div>
    @endif
</div>
