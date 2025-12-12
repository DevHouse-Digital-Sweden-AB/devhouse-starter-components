{{-- 
    Component: Section
    Requires: Tailwind CSS
--}}

<section {{ $attributes->merge(['class' => 'dh-section py-20']) }}>{{ $slot }}</section>