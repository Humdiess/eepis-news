@props([
    'id' => 'modal',
    'title' => 'Konfirmasi',
    'maxWidth' => 'md',
])

@php
    $widthClass = match($maxWidth) {
        'sm' => 'max-w-sm',
        'md' => 'max-w-md',
        'lg' => 'max-w-lg',
        'xl' => 'max-w-xl',
        default => 'max-w-md',
    };
@endphp

<template x-teleport="body">
    <div
        x-show="{{ $id }}"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-[99] flex items-center justify-center p-4"
        style="display: none;"
    >
        {{-- Backdrop --}}
        <div class="absolute inset-0 bg-pens-navy/50 backdrop-blur-sm" @click="{{ $id }} = false"></div>

        {{-- Modal Content --}}
        <div
            x-show="{{ $id }}"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95 translate-y-4"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95 translate-y-4"
            class="relative bg-white rounded-2xl shadow-2xl {{ $widthClass }} w-full overflow-hidden"
        >
            {{-- Header --}}
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
                <h3 class="text-lg font-bold text-pens-navy">{{ $title }}</h3>
                <button @click="{{ $id }} = false" class="text-gray-400 hover:text-gray-600 transition-colors p-1 rounded-lg hover:bg-gray-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- Body --}}
            <div class="px-6 py-4">
                {{ $slot }}
            </div>

            {{-- Footer --}}
            @isset($footer)
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-end gap-3">
                    {{ $footer }}
                </div>
            @endisset
        </div>
    </div>
</template>
