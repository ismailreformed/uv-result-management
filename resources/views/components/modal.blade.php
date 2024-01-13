@props(['formAction' => false])

<div>
    @if($formAction)
        <form wire:submit.prevent="{{ $formAction }}">
            @endif
            <div class="flex bg-white px-4 py-3 border-b border-gray-150 justify-between">
                @if(isset($title))
                    <h3 class="text-lg text-start leading-6 font-medium text-gray-900">
                        {{ $title }}
                    </h3>
                @endif
                <button
                    class="text-black px-2 border border-gray-100 rounded-full"
                    wire:click="$dispatch('closeModal')"
                >
                    X
                </button>
            </div>

            <div class="bg-white px-4 sm:p-6">
                <div class="space-y-6">
                    {{ $content }}
                </div>
            </div>

            <div class="flex bg-white px-4 py-3 border-t border-gray-150 justify-end">
                {{ $buttons }}
            </div>

            @if($formAction)
        </form>
    @endif
</div>
