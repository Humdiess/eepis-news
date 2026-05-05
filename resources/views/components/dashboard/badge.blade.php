@props([
    'type' => 'default',
    'variant' => 'status',
])

@php
    // Status badge colors
    $statusColors = [
        'published' => 'bg-emerald-50 text-emerald-700 ring-1 ring-emerald-600/20',
        'draft' => 'bg-amber-50 text-amber-700 ring-1 ring-amber-600/20',
        'archived' => 'bg-gray-100 text-gray-600 ring-1 ring-gray-500/20',
    ];

    // Role badge colors
    $roleColors = [
        'admin' => 'bg-pens-blue/10 text-pens-blue ring-1 ring-pens-blue/20',
        'penulis' => 'bg-pens-cyan/10 text-pens-cyan ring-1 ring-pens-cyan/20',
    ];

    // Category badge colors
    $categoryColors = [
        'Akademik' => 'bg-blue-50 text-blue-700 ring-1 ring-blue-600/20',
        'Teknologi' => 'bg-violet-50 text-violet-700 ring-1 ring-violet-600/20',
        'Kemahasiswaan' => 'bg-emerald-50 text-emerald-700 ring-1 ring-emerald-600/20',
        'Prestasi' => 'bg-amber-50 text-amber-700 ring-1 ring-amber-600/20',
        'Penelitian' => 'bg-rose-50 text-rose-700 ring-1 ring-rose-600/20',
        'Pengabdian' => 'bg-teal-50 text-teal-700 ring-1 ring-teal-600/20',
        'Kegiatan' => 'bg-orange-50 text-orange-700 ring-1 ring-orange-600/20',
        'Pengumuman' => 'bg-red-50 text-red-700 ring-1 ring-red-600/20',
    ];

    if ($variant === 'status') {
        $classes = $statusColors[$type] ?? $statusColors['draft'];
    } elseif ($variant === 'role') {
        $classes = $roleColors[$type] ?? $roleColors['penulis'];
    } else {
        $classes = $categoryColors[$type] ?? 'bg-gray-50 text-gray-700 ring-1 ring-gray-600/20';
    }
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold {$classes}"]) }}>
    @if($variant === 'status')
        <span class="w-1.5 h-1.5 rounded-full mr-1.5
            @if($type === 'published') bg-emerald-500
            @elseif($type === 'draft') bg-amber-500
            @else bg-gray-400
            @endif
        "></span>
    @endif
    {{ $type === 'published' ? 'Published' : ($type === 'draft' ? 'Draft' : ($type === 'archived' ? 'Archived' : $type)) }}
</span>
