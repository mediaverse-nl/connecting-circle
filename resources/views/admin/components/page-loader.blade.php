<div class="se-pre-con"></div>

@push('css')
    <style>
        .no-js #loader { display: none;  }
        .js #loader { display: block; position: absolute; left: 100px; top: 0; }
        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
        }
    </style>
@endpush

{{--@push('scripts')--}}
{{--    <script>--}}
{{--        $(window).on('load', function(){--}}
{{--            // Animate loader off screen--}}
{{--            $(".se-pre-con").fadeOut('fast');--}}
{{--        });--}}
{{--    </script>--}}
{{--@endpush--}}
