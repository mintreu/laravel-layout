<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head {{ $headAttribute ?? '' }}>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="og:url" content="{{ request()->url() }}" />
    <meta property="og:site_name" content="{{ $title ?? config('app.name') }}" />
    {{-- Open Graph (Default) --}}
    @if(!empty($title))<meta property="og:title" content="{{ $title ."\n".$title ?? config('app.name') }}" />@endif
    @if(!empty($description))<meta property="og:description" content="{{ $description }}" />@endif
    @if(!empty($favicon))<meta property="og:image" content="{{ asset($favicon) }}" />@endif
    {{-- Open Graph (Custom) --}}
    {{ $og_tag_slot ?? '' }}
    {{-- Application Manifest--}}
    @if($manifest) <link rel="manifest" href="{{ asset("manifest.json") }}">@endif
    {{-- Application Title--}}
    <title>{{ $title ?? config('app.name') }}</title>
    {{-- Application Favicon--}}
    @if(!empty($favicon))<link rel="icon" type="image/png" href="{{ asset($favicon) }}" />@endif
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <style>
        [x-cloak] {
            display: none !important;
        }
    @if($preloader['status'])

        #preloader {
        @if(empty($preloader['config']['gif']))
background-color: {{$preloader['config']['bg']}};
        border: 12px solid {{$preloader['config']['primary']}};
        border-radius: 50%;
        border-top: 12px solid {{$preloader['config']['secondary']}};
        width: 70px;
        height: 70px;
        position: absolute;
        animation: spin 1s linear infinite;
            @else
        position: fixed;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('{{$preloader['config']['gif']}}') 50% 50% no-repeat rgb(249,249,249);
            @endif

        margin: auto;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        }
        @if(empty($preloader['config']['gif']))

        @keyframes spin {
           100% {
            transform: rotate(360deg);
           }
        }
        @endif
     @endif
    </style>
    {{ $stylesheet ?? '' }}
    <livewire:styles />
    {{ $style ?? '' }}
    @yield('style')
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{ $layout_header ?? '' }}
</head>
<body {{ $bodyAttribute ?? '' }}>
@if($preloader)
@include('layout::preloader')
@endif
{{ $slot }}

{{ $javascript ?? '' }}
<livewire:scripts />
{{--Stackable Script Area--}}
@stack('script')
{{--Alternatively use < x-slot name="script" > < / x-slot>--}}
{{ $script ?? '' }}
{{ $layout_footer ?? '' }}
</body>
</html>
