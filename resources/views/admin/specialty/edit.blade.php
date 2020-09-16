@extends('admin.layouts.admin')

@section('content')
    {{Form::model($specialty, ['route' => ['admin.specialty.update', $specialty->id], 'method' => 'PATCH', 'files' => true])}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <span class="h3 align-items-center">
                        Vakgebied wijzigen
                    </span>
                    <span class="float-right">
                        @component('admin.components.model', [
                           'id' => 'editPage',
                           'title' => 'Vakgebied wijzigen',
                           'actionRoute' => route('admin.specialty.update', $specialty->id),
                           'btnClass' => 'btn btn-warning',
                           'btnIcon' => null,
                           'btnTitle' => 'opslaan',
                        ])
                            @slot('description')
                                wilt u de wijzigen opslaan? druk dan op <b>verder</b>
                            @endslot
                        @endcomponent
                    </span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('titel', 'titel') !!}
                    {!! Form::text('titel', null, ['rows="3"', 'class' => 'editor form-control'.(!$errors->has('plaats') ? '': ' is-invalid ')]) !!}
                    @include('components.error', ['field' => 'plaats'])
                </div>
                <div class="form-group">
                    {!! Form::label('plaats', 'Plaats') !!}
                    {!! Form::text('plaats', null, ['rows="3"', 'class' => 'editor form-control'.(!$errors->has('plaats') ? '': ' is-invalid ')]) !!}
                    @include('components.error', ['field' => 'plaats'])
                </div>
                <div class="form-group">
                    {!! Form::label('salaris', 'salaris') !!}
                    {!! Form::text('salaris', null, ['rows="3"', 'class' => 'editor form-control'.(!$errors->has('salaris') ? '': ' is-invalid ')]) !!}
                    @include('components.error', ['field' => 'plaats'])
                </div>
                <div class="form-group">
                    {!! Form::label('categorie', 'categorie') !!}
                    {!! Form::select('categorie', [], null, ['rows="3"', 'class' => 'editor form-control'.(!$errors->has('employer_id') ? '': ' is-invalid ')]) !!}
                    @include('components.error', ['field' => 'employer_id'])
                </div>
                <div class="form-group">
                    {!! Form::label('employer_id', 'Bedrijf') !!}
                    {!! Form::select('employer_id', \App\Employer::pluck('bedrijfsnaam', 'id')->toArray(), null, ['rows="3"', 'class' => 'editor form-control'.(!$errors->has('employer_id') ? '': ' is-invalid ')]) !!}
                    @include('components.error', ['field' => 'employer_id'])
                </div>
                <div class="form-group">
                    {!! Form::label('inleiding', 'Korte inleiding') !!}
                    {!! Form::text('editor', null, ['id="a"', 'class' => 'editor form-control'.(!$errors->has('inleiding') ? '': ' is-invalid ')]) !!}
                    @include('components.error', ['field' => 'inleiding'])
                </div>
                <div class="form-group">
                    {!! Form::label('vacature', 'vacature') !!}
                    {!! Form::text('vacature', null, ['id="a"', 'class' => 'editor form-control'.(!$errors->has('vacature') ? '': ' is-invalid ')]) !!}
                    @include('components.error', ['field' => 'vacature'])
                </div>
{{--                <div class="form-group">--}}
{{--                    {!! Form::label('opmerkingen_voor_werkgever', null) !!}--}}
{{--                    {!! Form::textarea('opmerkingen_voor_werkgever', null, ['rows="3"', 'class' => 'form-control'.(!$errors->has('opmerkingen_voor_werkgever') ? '': ' is-invalid ')]) !!}--}}
{{--                    @include('components.error', ['field' => 'opmerkingen_voor_werkgever'])--}}
{{--                </div>--}}
            </div>
            <div class="col-md-6">
                @include('admin.components.notices', ['model' => $job])



            </div>
        </div>

    {{Form::close()}}
@endsection

@push('css')
@endpush

@push('scripts')
    <script type="text/javascript" >
        var dataLocal = [];
        var dataGlobalSettings = [];

        var ckeConfig = {
            toolbar: [
                { name: 'document', groups: [ 'mode', 'document', 'doctools' ]},
                // { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
                // { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
                // { name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
                '/',
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },
                // { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
                { name: 'insert', items: [  'Table' ] },
                '/',
                { name: 'styles', items: [ 'Format',  'FontSize' ] },
                { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
            ],
            toolbarGroups: [
                { name: 'fontFamily ' },
                { name: 'styles' },
                { name: 'basicstyles' },
                { name: 'undo' },
                { name: 'listindentalign',  groups: [ 'list', 'indent', 'align' ] },
                // { name: 'links' },
                // { name: 'insert' },
                { name: 'tools' },
                { name: 'mode' }
            ],
            contentsCss : 'https://use.fontawesome.com/releases/v5.8.2/css/all.css',
            // mentions: [
            //     {
            //         marker: '@',
            //         feed: CKEDITOR.tools.array.map( dataGlobalSettings, function( obj ) {
            //             return obj.key;
            //         }),
            //         minChars: 0
            //     },
            //     {
            //         marker: '#',
            //         feed: CKEDITOR.tools.array.map( dataLocal, function( item ) {
            //             return item;
            //         }),
            //         minChars: 0
            //     }
            // ]
        };

        CKEDITOR.replace( 'editor', ckeConfig);
        CKEDITOR.replace( 'vacature', ckeConfig);
        // CKEDITOR.dtd.$removeEmpty.i = 0;
        // CKEDITOR.execute( 'fontFamily'  );

    </script>
@endpush
