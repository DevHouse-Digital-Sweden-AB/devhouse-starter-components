{{-- 
    Component: Post grid example code
    Requires: Tailwind CSS
--}}

@php
    $args = [
        'post_type' => 'post',
        'posts_per_page' => 6, // -1 for all items
        'order' => 'DESC',
        'orderby' => 'date',
        'fields' => 'ids', // return only post IDs
        // 'facetwp' => true
    ];
    
    $query_results = new WP_QUERY($args);
    $posts = $query_results->posts ?? [];
@endphp

@if (! empty($posts))
    <div class="space-y-8">
        <ul @class([
            'grid grid-cols-12 gap-8',
            'facetwp-template' => array_key_exists('facetwp', $args)
        ])>
            @foreach ($posts as $id)
                <li class="w-full col-span-full md:col-span-6 lg:col-span-4">
                    <x-card :$id />
                </li>
            @endforeach
        </ul>
        
        {{-- Example facetwp pagination --}}
        @if (array_key_exists('facetwp', $args))
            <div class="">{!! do_shortcode('[facetwp facet="post_pagination"]') !!}</div>
        @endif
    </div>
@endif