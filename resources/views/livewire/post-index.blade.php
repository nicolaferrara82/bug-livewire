<div class="max-w-lg mx-auto p-6">
    <div class="mt-8 flex items-end justify-between space-x-2">
        <div class="flex">
            <select wire:model="filters.category">
                <option value="">Select...</option>
                @foreach($categories as $category)
                    <option value="{{$category}}">{{ucFirst($category)}}</option>
                @endforeach
            </select>
            <input wire:model="filters.search" class="px-2 py-1 border rounded" type="search" placeholder="Search..." />
        </div>
        <button wire:click.prevent="resetAllFilters" class="text-xs">Reset filters</button>
    </div>
    <div class="flex flex-col divide-y">
        @forelse($posts as $post)
            <div class="text-gray-900 font-semibold px-4 py-2">{{ $post->title }}</div>
        @empty
            <span>No posts...</span>
        @endforelse
    </div>
</div>
