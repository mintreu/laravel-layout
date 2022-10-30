<x-layout::layout :title="$title" :favicon="$favicon" :keyword="$keyword" :description="$description"  :config="$layout">
    <x-slot name="stylesheet">
        @if(isset($layout['css']) && !empty($layout['css']))
            @foreach($layout['css'] as $cssFile)
                {!! $cssFile !!}
            @endforeach
        @endif
    </x-slot>

    {{ $slot }}

    <x-slot name="javascript">
        @if(isset($layout['js']) && !empty($layout['js']))
            @foreach($layout['js'] as $scriptFile)
                {!! $scriptFile !!}
            @endforeach
        @endif
    </x-slot>

</x-layout::layout>
