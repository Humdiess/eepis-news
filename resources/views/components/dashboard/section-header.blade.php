@props([
    'title' => '',
    'action' => null,
    'actionUrl' => '#',
    'actionLabel' => 'Lihat Semua',
])

<div class="flex items-center justify-between">
    <div class="flex items-center gap-3">
        <h2 class="text-xl font-bold text-pens-navy">{{ $title }}</h2>
    </div>
    @if($action)
        <a href="{{ $actionUrl }}" class="text-sm font-medium text-pens-cyan hover:text-pens-blue transition-colors flex items-center gap-1">
            {{ $actionLabel }}
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
    @endif
</div>
