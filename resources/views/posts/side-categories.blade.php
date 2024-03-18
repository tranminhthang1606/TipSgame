<div id="recommended-topics-box">
    <h3 class="text-lg font-semibold text-gray-900 mb-3">Bài viết liên quan</h3>
    <div class="topics flex flex-wrap justify-start gap-2">
        @foreach ($categories as $category)
            <x-badge href="{{ route('blog.index', ['category' => $category->title]) }}" wire:navigate :background_color="$category->background_color" :text_color="$category->text_color" href="{{ route('blog.index', ['category' => $category->title]) }}">
                {{ $category->title }}
            </x-badge>
        @endforeach
    </div>
</div>
