{{-- 
    Component: Header link
    Requires: Tailwind CSS
--}}

@props([
    'item' => null
])

@php 
    $class = 'pointer-cursor font-bold !no-underline';
    $isButton = get_field('button', $item->objectId); // ACF Field Created on Menu Item Location
@endphp

{{-- Menu item --}}
@if (!$item->children && !$isButton)
    <a 
        @class([
            $class,
            'current-menu-item' => $item->active
        ])
        href="{{ $item->url }}"
        aria-current="{{ $item->active ? 'true' : null }}"
    >{{ $item->label }}</a>
@endif

{{-- Menu button --}}
@if (!$item->children && $isButton)
    <x-button
        href="{{ $item->url }}"
        aria-current="{{ $item->active ? 'true' : null }}"
    >{{ $item->label }}</x-button>
@endif

{{-- Menu item with submenu --}}
@if ($item->children)
    <button
        @class([
            $class,
            'flex gap-2 items-center'
        ])
        type="button"
        :aria-expanded="selectedDesktopMenuItem === 'menuItem-{{ $item->objectId }}'"
        aria-controls="submenu-{{ $item->objectId }}"
        @click="selectedDesktopMenuItem = (selectedDesktopMenuItem === 'menuItem-{{ $item->objectId }}' ? null : 'menuItem-{{ $item->objectId }}')"
    >
        {{ $item->label }}
        <span 
            class="block"
            :class="selectedDesktopMenuItem === 'menuItem-{{ $item->objectId }}' ? 'rotate-180' : ''"
        >
            &uarr;
        </span>
    </button>
    
    {{-- Submenu --}}
    <ul 
        id="submenu-{{ $item->objectId }}"
        class="submenu bg-white p-4 absolute z-1 top-full opacity-0 invisible transition-visibility"
        :class="selectedDesktopMenuItem === 'menuItem-{{ $item->objectId }}' ? '!opacity-100 !visible' : ''"
        :aria-hidden="selectedDesktopMenuItem !== 'menuItem-{{ $item->objectId }}'" 
        aria-label="{{ $item->label }} submenu"
    >
        
        {{-- Menu depth 1 --}}
        @foreach ($item->children as $child)
            <x-header.li :class="$child->classes">
                <a 
                    href="{{ $child->url }}"
                    aria-current="{{ $child->active ? 'true' : null }}"
                    @class([
                        'current-menu-item' => $child->active
                    ])
                >{{ $child->label }}</a>
            </x-header.li>  
        @endforeach
    </ul>
@endif
