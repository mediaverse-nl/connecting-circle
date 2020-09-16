<?php
    $randomStr = Str::random(8);
    $model = new App\Text;
    $text = $model->where('key_name', $key)->exists()
        ? $model->where('key_name', $key)->first()->text
        : '<h2 class="orange-text">Why do we use it? (title <small>h2</small>)</h2>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>';

    $localVars = $mentions ?? [];

    $settings = \App\Settings::where('field_value', '!=', null);

    $globalVars = [];
    foreach ($settings->get() as $item){
        $globalVars[] = [
            'key' => $item->setting,
            'value' => $item->field_value,
        ];
    }

    $readableText = $text;
    foreach ($globalVars as $k => $v){
        $readableText = str_replace('@'.$v['key'], $v['value'], $readableText);
    }
?>

@if(auth()->check())
    <form id="editor-{!! $key.$randomStr !!}" action="/api/text-editor-{!! $key !!}" method="POST">
        @csrf
        @method('POST')
        <div style="position: relative;">
            <textarea id="{!! $key.$randomStr !!}" name="editor">{!! $text !!}</textarea>
            <button type="submit"
                    class="btn btn-sm btn-primary border border-white m-0 mt-1 text-left float-left"
                    style="position: absolute;z-index: 9999; text-align: left !important;left: 0px;">
                tekst opslaan
            </button>
        </div>

    </form>

    @push('js')
        <script type="text/javascript" >
            var dataLocal{{$key.$randomStr}} = @json($localVars);
            var dataGlobalSettings{{$key.$randomStr}} = @json($globalVars);

            CKEDITOR.inline( '{!! $key.$randomStr !!}', {
                height: 240,
                extraPlugins: 'sourcedialog,mentions',
                allowedContent  : true,
                filebrowserImageBrowseUrl: '/admin/file_manager',
                filebrowserImageUploadUrl: '/admin/file_manager/upload&_token=@csrf',
                filebrowserBrowseUrl: '/admin/file_manager?type=Files',
                filebrowserUploadUrl: '/admin/file_manager/upload?type=Files&_token=@csrf',
                contentsCss : 'https://use.fontawesome.com/releases/v5.8.2/css/all.css',
                mentions: [
                    {
                        marker: '@',
                        feed: CKEDITOR.tools.array.map( dataGlobalSettings{{$key.$randomStr}}, function( obj ) {
                            return obj.key;
                        }),
                        minChars: 0
                    },
                    {
                        marker: '#',
                        feed: CKEDITOR.tools.array.map( dataLocal{{$key.$randomStr}}, function( item ) {
                            return item;
                        }),
                        minChars: 0
                    }
                ]
            });
            CKEDITOR.dtd.$removeEmpty.i = 0;

        </script>
    @endpush

    @push('css')
        <style type="text/css">
            .cke_focus:focus-within {
                border: none !important;
            }
        </style>
    @endpush
@else
    {!! htmlspecialchars_decode($readableText) !!}
@endif
