{{-- 
    Component: Container
    Requires: Tailwind CSS
--}}

<div {{ $attributes->merge(['class' => 'max-w-screen-container mx-auto']) }}>{{ $slot }}</div>