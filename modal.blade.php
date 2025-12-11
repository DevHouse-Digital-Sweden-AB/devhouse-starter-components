{{-- 
    Component: Modal
    Requires: Tailwind CSS, 
              Alpine.js, 
              Alpine.js Focus plugin
    
    Installation Guide: https://github.com/DevHouse-Digital-Sweden-AB/devhouse-starter-components
    
    Note: Add the following to global.css:
    
    [x-cloak] { display: none !important; }
--}}

@props([
    'button_text' => 'Open Modal',
    'modal_title' => null,
    'modal_content' => null
])

@if ($button_text && $modal_content)
    <div x-data="{ modalIsOpen: false }">
        
        {{-- Modal button --}}
        <x-button 
            x-ref="openButton"
            x-on:click="modalIsOpen = true; $focus.focus($refs.modalDialog);"
            type="button"
            el="button"
            aria-haspopup="dialog"
        >
            {{ $button_text }}
        </x-button>
        
        <div 
            x-cloak 
            x-show="modalIsOpen" 
            x-transition.opacity.duration.200ms 
            x-trap.inert.noscroll="modalIsOpen" 
            x-on:keydown.esc.window="modalIsOpen = false" 
            x-on:click.self="modalIsOpen = false" 
            class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8" 
            role="dialog" 
            aria-modal="true" 
            aria-label="{{ $modal_title }}"
        >
            {{-- Modal dialog --}}
            <div
                x-ref="modalDialog"
                x-show="modalIsOpen" 
                x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" 
                x-transition:enter-start="opacity-0 translate-y-full" 
                x-transition:enter-end="opacity-100 translate-y-0" 
                class="bg-white relative flex max-w-lg flex-col gap-4 overflow-hidden"
            >
                {{-- Modal close --}}
                <div class="absolute top-2 right-2">
                    <button 
                        type="button"
                        class="cursor-pointer"
                        x-on:click="modalIsOpen = false; $focus.focus($refs.openButton);" 
                        aria-label="Close modal"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                
                {{-- Dialog body --}}
                <div class="p-7 space-y-4">
                    @if ($modal_title)
                        <h3 class="text-center font-bold">{{ $modal_title }}</h3>
                    @endif
                    
                    <div>{!! $modal_content !!}</div>
                </div>
            </div>
        </div>
    </div>
@endif