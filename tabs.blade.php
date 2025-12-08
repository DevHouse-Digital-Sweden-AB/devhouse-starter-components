{{-- 
    Component: Tabs
    Requires: Tailwind CSS, Alpine.js, Alpine.js Collapse plugin, Alpine.js Focus plugin
--}}

@props([
    'items' => []
])

@php
    $unique_id = wp_unique_ID();
@endphp

@if (! empty($items))
    <div x-data="{ selectedTab: 'tab-{{ $unique_id }}-0' }" class="w-full">

        {{-- Tab buttons --}}
    	<ul 
    	    x-on:keydown.right.prevent="$focus.wrap().next()" 
    	    x-on:keydown.left.prevent="$focus.wrap().previous()" 
    	    class="flex gap-2 overflow-x-auto border-b border-outline" 
    	    role="tablist" 
    	    aria-label="tab options"
        >
            @foreach($items as $item)
                @php
                    $item_title = $item['title'] ?? null;
                @endphp
                
                <li>
                    <button 
                        x-on:click="selectedTab = 'tab-{{ $unique_id }}-{{ $loop->index }}'" 
                        :aria-selected="selectedTab === 'tab-{{ $unique_id }}-{{ $loop->index }}'" 
                        :class="selectedTab === 'tab-{{ $unique_id }}-{{ $loop->index }}' ? 'font-bold border-b' : 'font-normal'" 
                        class="h-min px-4 py-2 text-sm cursor-pointer" 
                        type="button" 
                        role="tab" 
                        aria-controls="tabpanel-{{ $unique_id }}-{{ $loop->index }}"
                    >
                        {{ $item_title }}
                    </button>
                </li>
            @endforeach
    	</ul>
    	
    	{{-- Tab content divs --}}
    	<div class="px-2 py-4">
            @foreach($items as $item)
               @php
                    $item_title = $item['title'] ?? null;
                    $item_content = $item['content'] ?? null;
                @endphp
                
                <div 
                    x-cloak 
                    x-show="selectedTab === 'tab-{{ $unique_id }}-{{ $loop->index }}'" 
                    id="tabpanel-{{ $unique_id }}-{{ $loop->index }}" 
                    role="tabpanel" 
                    aria-label="{{ $item_title }} content"
                >
                    {{ $item_content }}
                </div>
            @endforeach
    	</div>
    </div>
@endif