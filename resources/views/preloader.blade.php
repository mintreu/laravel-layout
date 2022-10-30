
@section('style')
    <style>
        #preloader {

            background-color: "#f3f3f3";
            border: 12px solid "#f3f3f3";
            border-radius: 50%;
            border-top: 12px solid {{$secondary ?? "#444444"}};
            width: 70px;
            height: 70px;
            position: absolute;
            animation: spin 1s linear infinite;
            {{--            @else--}}
position: fixed;
            width: 100%;
            height: 100%;
            z-index: 9999;
            {{--background: url('{{$gif}}') 50% 50% no-repeat rgb(249,249,249);--}}
{{--            @endif--}}
margin: auto;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }
        {{--        @if(empty($gif))--}}
        {{--@keyframes spin {--}}
        {{--            100% {--}}
        {{--                transform: rotate(360deg);--}}
        {{--            }--}}
        {{--        }--}}
        {{--        @endif--}}
    </style>
@endsection

<div id="preloader"></div>




@push('script')
    <script>
        document.onreadystatechange = function() {
            if (document.readyState !== "complete") {
                document.querySelector(
                    "body").style.visibility = "hidden";
                document.querySelector(
                    "#preloader").style.visibility = "visible";
            } else {
                document.querySelector(
                    "#preloader").style.display = "none";
                document.querySelector(
                    "body").style.visibility = "visible";
            }
        };
    </script>
@endpush
