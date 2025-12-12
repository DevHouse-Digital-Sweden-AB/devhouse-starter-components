{{-- 
    Component: Hero
    Requires: Tailwind CSS
--}}

@props([
    // empty
])

{{-- Hero content --}}
<x-container class="dh-hero space-y-8 relative z-1">
    <h1 class="text-6xl font-bold text-pretty">Example heading text</h1>
    
    <p class=" text-xl text-pretty">Example intro text</p>
    
    <ul class="flex flex-wrap items-center gap-4">
        <li>
            <x-button href="#">Example 1</x-button>
        </li>
        
        <li>
            <x-button el="button">Example 2</x-button>
        </li>
    </ul>
</x-container>

{{-- Hero media --}}
<div 
    class="absolute inset-0 z-0" 
    aria-hidden="true"
>
    <x-image id="11" />
</div>