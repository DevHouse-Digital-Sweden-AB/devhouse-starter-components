{{-- 
    Component: Section
    Requires: Tailwind CSS
--}}

<section {{ $attributes->merge(['class' => 'py-20 px-4 lg:px-8']) }}>{{ $slot }}</section>