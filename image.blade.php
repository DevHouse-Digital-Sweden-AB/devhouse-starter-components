{{-- 
    Component: Image
    Requires: Tailwind CSS
--}}

@props([
    'id' => null,
    'size' => 'large',
    'class' => 'dh-image w-full h-full object-cover',
    'loading' => 'lazy' // or eager
])

@if ($id)
    {!! wp_get_attachment_image(
        $id, 
        $size, 
        '', 
        [
            'class' => $class, 
            'loading' => $loading
        ]
    ) !!}
@endif