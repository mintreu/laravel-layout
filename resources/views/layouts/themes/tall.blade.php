<x-layout::layout :title="$title" :keyword="$keyword" :desc="$description" :favicon="$favicon" :support="$support">
    <x-slot name="htmlClass"> class="antialiased"</x-slot>
    <x-slot name="meta">{{ $meta ?? '' }}</x-slot>
    <x-slot name="style">
        {{ $style ?? '' }}
    </x-slot>
    <x-slot name="header">{{ $header ?? '' }}</x-slot>
    {{ $slot }}
    <x-slot name="script">{{ $script ?? '' }}</x-slot>
    <x-slot name="footer">{{ $footer ?? '' }}</x-slot>
</x-layout::layout>
