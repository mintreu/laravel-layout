<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{$support['direction']}}"
      @if($support['htmlClass'] && !empty($support['htmlClass']) !== null) class="{{ $support['htmlClass']}}" @else
    {{ $htmlClass ?? '' }}
    @endif>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex,nofollow">
    <meta name="Keywords" content="@if(isset($keyword) && !empty($keyword)){{ $keyword }}@endif"/>
    <meta name="Description" content="{{ $description }}"/>
    @if(!is_null($favicon))
        <link rel="icon" type="image/{{ $favicon_type }}" href="{{ asset($favicon) }}"/>
    @endif
    @if(isset($meta))
        {{ $meta ?? '' }}
    @endif
    <title> @if($title)
            {{config('app.name')}}|{{$title}}
        @else
            {{config('app.name')}}
        @endif</title>
    <!-- Style & Scripts -->
    @if($support['vite']['status'])
        @if($support['vite']['vendor'])
            @if($support['vite']['hasCss'])
                @vite(['resources/css/app.css', 'resources/js/app.js'.implode(' ,',$support['vite']['vendorBuild'])])
            @else
                @vite('resources/js/app.js'.implode(' ,',$support['vite']['vendorBuild']))
            @endif
        @else
            @if($support['vite']['hasCss'])
                @vite(['resources/css/app.css', 'resources/js/app.js'])
            @else
                @vite('resources/js/app.js')
            @endif
        @endif
    @endif

    @if($support['alpine'])
        <style>[x-cloak] {
                display: none !important;
            } </style>
    @endif
    @if($support['spa'])
        <script rel="prefetch" as="script"
                src="https://cdn.jsdelivr.net/npm/turbolinks@5.2.0/dist/turbolinks.min.js"></script>
    @endif
    @if($support['wire'])
        <livewire:styles/>
    @endif

    @if(isset($style))
        {{ $style ?? '' }}
    @endif
    @if(isset($header))
        {{ $header ?? '' }}
    @endif

</head>
<body @if($support['bodyClass'] && !empty($support['bodyClass']) !== null) class="{{ $support['bodyClass']}}" @else
    {{ $bodyClass ?? '' }}
    @endif>
{{ $slot }}
<!-- Scripts -->
@if($support['wire'])
    <livewire:scripts/>
@endif
@if($support['spa'])
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
            data-turbolinks-eval="false" data-turbo-eval="false"></script>
@endif
@if(isset($script))
    {{ $script ?? '' }}
@endif
@if(isset($footer))
    {{ $footer ?? '' }}
@endif
</body>
</html>
