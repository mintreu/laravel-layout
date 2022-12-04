<x-layout::layout :title="$title" :keyword="$keyword" :desc="$description" :favicon="$favicon" :support="$support">
    <x-slot name="meta">{{ $meta ?? '' }} @yield('meta')</x-slot>
    <x-slot name="style">
        {{ $style ?? '' }}
        @stack('$style')
    </x-slot>
    <x-slot name="header">{{ $header ?? '' }} @yield('header')</x-slot>
    {{ $slot ?? '' }}
    @yield('content')
    <x-slot name="script">{{ $script ?? '' }} @stack('script')</x-slot>
    <x-slot name="footer">{{ $footer ?? '' }} @yield('footer')</x-slot>
</x-layout::layout>
