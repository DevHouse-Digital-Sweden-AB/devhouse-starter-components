{{-- 
    Component: Section
    Requires: Tailwind CSS
--}}

<section {{ $attributes->merge(['class' => 'py-20']) }}>{{ $slot }}</section>