<div class="inline-block relative" x-data="{ open: true }">
    <input @click.away="{ open = false; @this.resetIndex(); }" @click="{ open = true }" type="text" name="search"
        class="bg-gray-200 text-gray-700 border-2 focus:outline-none w-64 mr-5 rounded-md px-2 py-1"
        placeholder=" Recherche une mission..." wire:model="query"
        wire:keydown.enter.prevent="showJob" ;
        wire:keydown.backspace="resetIndex" ;
        wire:keydown.arrow-down.prevent="incrementIndex" ;
        wire:keydown.arrow-up.prevent="decrementIndex" ;>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500 absolute top-0 right-0 mr-7 mt-2 focus:search"
        viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd"
            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
            clip-rule="evenodd" />
    </svg>

    @if (strlen($query) > 2)
        <div x-show="open" class="absolute rounded border bg-gray-100 w-64 text-md mt-1">
            @if (count($jobs) > 0)
                @foreach ($jobs as $index => $job)
                    <p class="p-1 {{ $index === $selectedIndex ? 'text-green-500' : '' }}">{{ $job->title }}</p>
                @endforeach
            @else
                <span class="p-1 text-orange-500">0 résultats pour {{ $query }}</span>
            @endif
        </div>
    @endif
</div>
