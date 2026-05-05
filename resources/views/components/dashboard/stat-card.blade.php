@props([
    'title' => '',
    'value' => '0',
    'icon' => 'document',
    'color' => 'cyan',
    'trend' => null,
    'trendLabel' => '',
])

@php
    $colorMap = [
        'cyan' => [
            'bg' => 'bg-pens-cyan/10',
            'text' => 'text-pens-cyan',
            'gradient' => 'from-pens-cyan to-pens-light',
        ],
        'blue' => [
            'bg' => 'bg-pens-blue/10',
            'text' => 'text-pens-blue',
            'gradient' => 'from-pens-blue to-pens-cyan',
        ],
        'green' => [
            'bg' => 'bg-emerald-50',
            'text' => 'text-emerald-600',
            'gradient' => 'from-emerald-400 to-emerald-600',
        ],
        'amber' => [
            'bg' => 'bg-amber-50',
            'text' => 'text-amber-600',
            'gradient' => 'from-amber-400 to-amber-600',
        ],
        'purple' => [
            'bg' => 'bg-purple-50',
            'text' => 'text-purple-600',
            'gradient' => 'from-purple-400 to-purple-600',
        ],
    ];
    $c = $colorMap[$color] ?? $colorMap['cyan'];
@endphp

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-300">
    <div class="flex items-start justify-between">
        <div class="flex-1">
            <p class="text-sm font-medium text-gray-500 mb-1">{{ $title }}</p>
            <p class="text-3xl font-bold text-pens-navy tracking-tight">{{ $value }}</p>
            @if($trend !== null)
                <div class="flex items-center mt-2 gap-1">
                    @if($trend >= 0)
                        <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
                        </svg>
                        <span class="text-xs font-semibold text-emerald-600">+{{ $trend }}%</span>
                    @else
                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                        </svg>
                        <span class="text-xs font-semibold text-red-600">{{ $trend }}%</span>
                    @endif
                    <span class="text-xs text-gray-400">{{ $trendLabel }}</span>
                </div>
            @endif
        </div>

        {{-- Icon --}}
        <div class="w-12 h-12 rounded-xl bg-gradient-to-br {{ $c['gradient'] }} flex items-center justify-center flex-shrink-0 shadow-lg shadow-{{ $color === 'cyan' ? 'pens-cyan' : ($color === 'blue' ? 'pens-blue' : $color) }}/20">
            @if($icon === 'document')
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            @elseif($icon === 'check')
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            @elseif($icon === 'pencil')
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
            @elseif($icon === 'eye')
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
            @elseif($icon === 'users')
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            @elseif($icon === 'category')
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                </svg>
            @endif
        </div>
    </div>
</div>
