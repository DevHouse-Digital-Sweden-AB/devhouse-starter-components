{{-- 
    Component: Accordion
    Requires: Tailwind CSS, 
              Alpine.js: https://alpinejs.dev/essentials/installation, 
              Alpine.js Collapse plugin
--}}

@props([
    'items' => []
])

@if (! empty($items))
    <ul 
        class="accordion divide-y" 
        x-data="{ activeAccordion: false }"
        @keydown.escape.window="activeAccordion = false"
    >
        @foreach ($items as $item)
            @php
                $unique_id = wp_unique_ID();
                $item_title = $item['title'] ?? null;
                $item_content = $item['content'] ?? null;
            @endphp
    
            <li
                class="group"
                :class="activeAccordion === 'accordion-{{ $unique_id }}' ? 'active' : ''"
            >
                <button
                  type="button" 
                  class="w-full flex items-center justify-between py-4 cursor-pointer"
                  :aria-expanded="activeAccordion === 'accordion-{{ $unique_id }}'" 
                  aria-controls="accordion-{{ $unique_id }}" 
                  x-on:click="activeAccordion = (activeAccordion === 'accordion-{{ $unique_id }}' ? activeAccordion = null : activeAccordion = 'accordion-{{ $unique_id }}')" 
                  aria-expanded="false"
                >
                    <h4 class="flex-1 text-left group-[.active]:font-bold">{{ $item_title }}</h4>
                    <span class="shrink-0 group-[.active]:rotate-180">&uarr;</span>
                </button>
    
                <div 
                    id="accordion-{{ $unique_id }}" 
                    class="" 
                    x-show="activeAccordion === 'accordion-{{ $unique_id }}'"
                    role="region"
                    x-collapse.duration.200ms
                >
                    <div class="pb-4">{{ $item_content }}</div>
                </div>
            </li>
        @endforeach
    </ul>
@endif