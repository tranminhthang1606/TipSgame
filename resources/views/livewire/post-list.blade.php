<div class=" px-3 lg:px-7 py-6">
    <div class="flex items-center justify-between border-b border-gray-100">
        <div>
            @if ($this->activeCategory || $search)
                <button class="mr-3 text-xs gray-500" wire:click="clearFilters()">X</button>
            @endif
            @if ($this->activeCategory)
            Phân loại: 
            <x-badge href="{{ route('blog.index', ['category' => $this->activeCategory->title]) }}" :background_color="$this->activeCategory->background_color"
                    :text_color="$this->activeCategory->text_color">
                    {{ $this->activeCategory->title }}
                </x-badge>
            @endif
            @if ($search)
                <span class="ml-2">
                    Từ khóa: <strong>{{ $search }}</strong>
                </span>
            @endif
        </div>
        <div id="filter-selector" class="flex items-center space-x-4 font-light transition">
            <button
                class="{{ $sort === 'desc' ? 'border-b border-yellow-700 text-yellow-500' : 'text-gray-500' }} py-4 transition"
                wire:click="setSort('desc')">Mới nhất</button>
            <button
                class="{{ $sort === 'asc' ? 'border-b border-yellow-700 text-yellow-500' : 'text-gray-500' }} py-4 transition"
                wire:click="setSort('asc')">Cũ nhất</button>
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
