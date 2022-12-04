<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ $htmlAttribute ?? '' }}>
<head {{ $headAttribute ?? '' }}>
    {{--Meta Data--}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--Site Information--}}
    <title>{{ $title }}</title>
    @if(!empty($favicon))<link rel="icon" type="image/{{ $config['favicon']['ext']}}" href="@img({{ $favicon}})"/> @endif
    <meta name="Keywords" content="{{ implode(',',$keyword ) }}" />
    <meta name="Description" content="{{ $description }}" />

    <meta property="og:url" content="{{ request()->url() }}"/>
    <meta property="og:site_name" content="{{ config('app.name') }}"/>
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}"/>
    @if(!empty($title))<meta property="og:title" content="{{ $title }}"/>@endif
    @if(!empty($description))<meta property="og:description" content="{{ $description }}"/>@endif

    @if(!empty($favicon) && !empty($config['favicon']['ext']) && $config['favicon']['ext'] != 'x-icon')<meta property="og:image" content="@asset({{$favicon}})"/> @endif
    {{-- Open Graph (Custom) --}}
    {{ $og_tag_slot ?? '' }}
    {{-- Application Manifest--}}
    @if(isset($manifest)) <link rel="manifest" href="@asset(manifest.json)">@endif
    {{-- Application Title--}}

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @vite('resources/js/app.js')
    {{ $style ?? '' }}
    {{ $layout_header ?? '' }}
    <livewire:styles />
</head>
<body {{ $bodyAttribute ?? '' }}>
{{--Main Content Area--}}
{{ $slot }}


{{--Stackable Script Area--}}
@stack('$script')
{{--Alternatively use < x-slot name="script" > < / x-slot>--}}
{{ $script ?? '' }}
{{ $layout_footer ?? '' }}

{{--Script Area--}}
<livewire:scripts />

<script src="https://cdn.jsdelivr.net/npm/turbolinks@5.2.0/dist/turbolinks.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>

</body>
</html>
