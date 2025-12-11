{{-- 
    Component: Card
    Requires: Tailwind CSS
--}}

@props([
    'id' => null
])

@php
    $featured_image_id = get_post_thumbnail_id($id);
    $title = get_the_title($id);
    $content = apply_filters('the_content', get_post_field('post_content', $id));
    $excerpt = wp_trim_words(strip_tags($content), 20, '...');
    $permalink = get_the_permalink($id);
@endphp

@if ($id)
    <article 
        class="space-y-6 h-full flex flex-col items-start justify-between gap-4"
        tabindex="0"
    >
        <div>
            @if ($featured_image_id)
                <div class="w-full h-0 pb-[56.25%] relative">
                    <figure class="absolute inset-0">
                        <x-image :id="$featured_image_id"/>
                    </figure>
                </div>
            @endif
            
            @if ($title)
                <h3>{{ $title }}</h3>
            @endif
            
            @if ($excerpt)
                <p>{{ $excerpt }}</p>
            @endif
        </div>
        
        <x-button href="{{ $permalink }}">Läs mer</x-button>
    </article>
@endif