<div>
    <input
        wire:model.live.debounce.300ms="query"
        wire:keyup.debounce.300ms="queryUpdated"
        wire:focus="toggleList(true)"
        wire:blur="toggleList(false)"
        type="text"
        placeholder="Search by name, roll etc"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
    />

    @if($showList)
        @foreach($students as $student)
         <option wire:click="selectStudent({{ $student->id }})">{{ $student->roll }} - {{ $student->name }}</option>
        @endforeach
    @endif
</div>
