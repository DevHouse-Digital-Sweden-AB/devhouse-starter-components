{{-- 
    Component: Button
    Requires: Tailwind CSS
--}}

@props([
    'el' => 'a',
    'style' => null
])

@php ($class = match($style) {
    'example' => 'bg-red-600 text-white hover:opacity-50 focus:opacity-50',
    default => 'bg-black text-white hover:opacity-50 focus:opacity-50'
})

<{{ $el }} {{ $attributes->merge(['class' => "dh-button inline-flex items-center p-4 !no-underline cursor-pointer {$class}"]) }}>{{ $slot }}</{{ $el }}>


{{-- Example button group list
    
    <ul class="flex flex-wrap items-center gap-4">
        <li>
            <x-button>Example 1</x-button>
        </li>
        
        <li>
            <x-button el="button">Example 2</x-button>
        </li>
    </ul>

--}}