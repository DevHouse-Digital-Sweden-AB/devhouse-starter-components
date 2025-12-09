{{-- 
    Component: Container
    Requires: Tailwind CSS
--}}

<div {{ $attributes->merge(['class' => 'max-w-screen-container px-4 lg:px-8 mx-auto']) }}>{{ $slot }}</div>