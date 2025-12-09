{{-- 
    Component: Modal
    Requires: Tailwind CSS, 
              Alpine.js: https://alpinejs.dev/essentials/installation, 
              Alpine.js Focus plugin
    
    Note: Add the following to global.css:
    
    [x-cloak] { display: none !important; }
--}}

@props([
    'title' => 'Open Modal',
    'content' => null
])

<div x-data="{ modalIsOpen: false }">
    
    {{-- Modal button --}}
    <x-button 
        x-on:click="modalIsOpen = true" 
        type="button"
        el="button"
        aria-haspopup="dialog"
    >
        {{ $title }}
    </x-button>
    
    <div 
        x-cloak 
        x-show="modalIsOpen" 
        x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen" 
        x-on:keydown.esc.window="modalIsOpen = false" 
        x-on:click.self="modalIsOpen = false" 
        class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8" 
        role="dialog" 
        aria-modal="true" 
        aria-labelledby="defaultModalTitle"
    >
        {{-- Modal dialog --}}
        <div
            x-show="modalIsOpen" 
            x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" 
            x-transition:enter-start="opacity-0 translate-y-full" 
            x-transition:enter-end="opacity-100 translate-y-0" 
            class="bg-white relative flex max-w-lg flex-col gap-4 overflow-hidden rounded-radius border border-outline"
        >
            {{-- Modal close --}}
            <div class="absolute top-2 right-2">
                <button 
                    type="button"
                    class="cursor-pointer"
                    x-on:click="modalIsOpen = false" 
                    aria-label="Close modal"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            
            {{-- Dialog body --}}
            <div class="px-4 py-8">{!! $content !!}</div>
        </div>
    </div>
</div>