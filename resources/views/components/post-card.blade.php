@props(['post'])
<div class="">
    <a href="http://127.0.0.1:8000/blog/laravel-34">
        <div>
            <img class="w-full rounded-xl" src="{{$post->getThumbnailUrl() }}">
        </div>
    </a>
    <div class="mt-3">
        <div class="flex flex-col mb-2 gap-2">
            <p class="text-gray-500 text-sm">{{ $post->published_at }}</p>
            <div>
                @foreach ($post->category as $category)
                    <x-badge wire:navigate href="{{ route('blog.index', ['category' => $category->title]) }}"
                        :background_color="$category->background_color" :text_color="$category->text_color">
                        {{ $category->title }}
                    </x-badge>
                @endforeach
            </div>

        </div>
        <a class="text-xl font-bold text-gray-900">{{ $post->title }}</a>
    </div>

</div>
