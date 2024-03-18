@props(['background_color', 'text_color'])
<button {{ $attributes }}
    class="bg-{{ $background_color }}-600 text-{{ $text_color }}-50 rounded-xl px-3 py-1 text-base">
    {{ $slot }}</button>
