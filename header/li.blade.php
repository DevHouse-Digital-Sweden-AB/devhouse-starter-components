{{-- 
    Component: Header list item
    Requires: Tailwind CSS
--}}

<li {{ $attributes->merge(['class' => 'menu-item relative h-full flex items-center']) }}>{{ $slot }}</li>