<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{$support['direction']}}" {{ $htmlClass ?? '' }}>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex,nofollow">
    <meta name="Keywords" content="@if(isset($keyword)){{ $keyword }}@endif"/>
    <meta name="Description" content="{{ $description }}" />
    @if(!is_null($favicon))<link rel="icon" type="image/{{ $favicon_type }}" href="{{ asset($favicon) }}"/> @endif
    @if(isset($meta)) {{ $meta ?? '' }} @endif
    <title>{{ $title ?? config('app.name','Mintreu|Demo')}}</title>
<!-- Style & Scripts -->
@if($support['vite']['status'])
    @if($support['vite']['hasCss'])
            @vite(['resources/css/app.css', 'resources/js/app.js'])
    @elseif( $support['vite']['hasBuild'])
            @vite('resources/js/app.js', {{!is_null($support['vite']['buildPath']) ? $support['vite']['buildPath'] : '' }})
    @else
            @vite('resources/js/app.js')
    @endif

@endif
@if($support['spa'])
    <script rel="prefetch" as="script" src="https://cdn.jsdelivr.net/npm/turbolinks@5.2.0/dist/turbolinks.min.js"></script>
@endif
@if($support['wire'])
    <livewire:styles />
@endif
    @if(isset($style)){{ $style ?? '' }} @endif
    @if(isset($header)){{ $header ?? '' }} @endif

</head>
<body>
    {{ $slot }}
<!-- Scripts -->
@if($support['wire'])
<livewire:scripts />
@endif
@if($support['spa'])
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
@endif
@if(isset($script)){{ $script ?? '' }} @endif
@if(isset($footer)){{ $footer ?? '' }} @endif
</body>
</html>
