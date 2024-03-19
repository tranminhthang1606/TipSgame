@props(['post'])
<article class="[&:not(:last-child)]:border-b border-gray-100 pb-10">
    <div class="article-body grid grid-cols-12 gap-3 mt-5 items-start">
        <div class="article-thumbnail col-span-4 flex items-center">
            <a wire:navigate href="{{route('blog.show',$post->slug)}}">
                <img class="mw-100 mx-auto rounded-xl" src="{{$post->getThumbnailUrl() }}" alt="thumbnail">
            </a>
        </div>
        <div class="col-span-8">
            <div class="article-meta flex py-1 text-sm items-center">
                <img class="w-7 h-7 rounded-full mr-3" src="{{ $post->author->profile_photo_url }}"
                    alt="{{ $post->author->name }}">
                <span class="mr-1 text-xs">{{ $post->author->name }}</span>
                <span class="text-gray-500 text-xs">. {{ $post->published_at->diffForHumans() }}</span>
            </div>
            <h2 class="text-xl font-bold text-gray-900">
                <a href="{{route('blog.show',$post->slug)}}">
                    {{ $post->title }}
                </a>
            </h2>

            <p class="mt-2 text-base text-gray-700 font-light">
                {{ $post->getThumbContent() }}
            </p>
            <div class="article-actions-bar mt-6 flex items-center justify-between">
                <div class="flex gap-1">

                    @foreach ($post->category as $category)
                        <x-badge href="{{ route('blog.index', ['category' => $category->title]) }}" wire:navigate
                            :background_color="$category->background_color" :text_color="$category->text_color">
                            {{ $category->title }}
                        </x-badge>
                    @endforeach
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-500 text-sm">{{ $post->getReadingTime() }} phút</span>
                    </div>
                </div>
                <div>
                    <livewire:like-button :key='$post->id' :$post/>
                </div>
            </div>
        </div>
    </div>
</article>
