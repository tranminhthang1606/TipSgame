<div class=" px-3 lg:px-7 py-6">
    <div class="flex justify-between items-center border-b border-gray-100">
        <div id="filter-selector" class="flex items-center space-x-4 font-light transition">
            <button
                class="{{ $sort === 'desc' ? 'border-b border-yellow-700 text-yellow-500' : 'text-gray-500' }} py-4 transition"
                wire:click="setSort('desc')">Latest</button>
            <button
                class="{{ $sort === 'asc' ? 'border-b border-yellow-700 text-yellow-500' : 'text-gray-500' }} py-4 transition"
                wire:click="setSort('asc')">Oldest</button>
        </div>
    </div>
    <div class="py-4">
        @foreach ($this->posts as $post)
            <x-post-item :post='$post' />
        @endforeach

    </div>

    <div class="my-3 ">
        {{ $this->posts->onEachSide(1)->links() }}
    </div>
</div>
