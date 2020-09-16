@extends('admin.layouts.admin')

@section('content')
    {!! Form::model($candidate, ['route' => ['admin.candidate.update', $candidate->id], 'method' => 'PATCH', 'files' => true]) !!}

{{--    {{Form::model($candidate, ['route' => ['admin.candidate.update', $candidate->id], 'method' => 'PATCH', 'files' => true])}}--}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <span class="h3 align-items-center">
                        Kandidaat wijzigen
                    </span>
                    <span class="float-right">
                        <div style="display: inline-block" class="px-2">
                             <a href="{!! route('admin.candidate.cv', $candidate->id) !!}" target="_blank" class="btn-success btn">bekijk CV</a>
                        </div>
                        <div style="display: inline-block" class="px-2">
                             @component('admin.components.model', [
                               'id' => 'editPage',
                               'title' => 'Kandidaat wijzigen',
                               'actionRoute' => route('admin.employer.update', $candidate->id),
                               'btnClass' => 'btn btn-warning',
                               'btnIcon' => null,
                               'btnTitle' => 'opslaan',
                            ])
                                @slot('description')
                                    wilt u de wijzigen opslaan? druk dan op <b>verder</b>
                                @endslot
                            @endcomponent
                        </div>

                    </span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
{{--                {!! $candidate !!}--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="form-group">--}}
{{--                            {!! Form::label('datum_van_afspraak', 'Datum van afspraak') !!}--}}

{{--                            <div class="input-group date" id="datetimepicker1" data-target-input="nearest">--}}
{{--                                {!! Form::text('datum_van_afspraak', null, ['data-target="#datetimepicker1"', 'class' => 'form-control datetimepicker-input '.(!$errors->has('plaats') ? '': ' is-invalid ')]) !!}--}}
{{--                                <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">--}}
{{--                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            @include('components.error', ['field' => 'plaats'])--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            {!! Form::label('job_id', 'Vacature') !!}--}}
{{--                            {!! Form::select('job_id', \App\Jobs::get()->append('job_title')->pluck('job_title', 'id')->toArray(), null, ['rows="3"', 'class' => 'editor form-control'.(!$errors->has('employer_id') ? '': ' is-invalid ')]) !!}--}}
{{--                            @include('components.error', ['field' => 'employer_id'])--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            {!! Form::label('status', null) !!}--}}
{{--                            {!! Form::text('status', null, ['class' => 'form-control'.(!$errors->has('status') ? '': ' is-invalid ')]) !!}--}}
{{--                            @include('components.error', ['field' => 'status'])--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="row">
                    <div class="form-group col-md-5">
                        {!! Form::label('voornaam', null) !!}
                        {!! Form::text('voornaam', null, ['class' => 'form-control'.(!$errors->has('voornaam') ? '': ' is-invalid ')]) !!}
                        @include('components.error', ['field' => 'voornaam'])
                    </div>
                    <div class="form-group col-md-4">
                        {!! Form::label('achternaam', null) !!}
                        {!! Form::text('achternaam', null, ['class' => 'form-control'.(!$errors->has('achternaam') ? '': ' is-invalid ')]) !!}
                        @include('components.error', ['field' => 'achternaam'])
                    </div>
                    <div class="form-group col-md-3">
                        {!! Form::label('voorvoegsel', null) !!}
                        {!! Form::text('voorvoegsel', null, ['class' => 'form-control'.(!$errors->has('voorvoegsel') ? '': ' is-invalid ')]) !!}
                        @include('components.error', ['field' => 'voorvoegsel'])
                    </div>
                    <div class="form-group col-md-7">
                        {!! Form::label('adres', null) !!}
                        {!! Form::text('adres', null, ['class' => 'form-control'.(!$errors->has('adres') ? '': ' is-invalid ')]) !!}
                        @include('components.error', ['field' => 'adres'])
                    </div>
                    <div class="form-group col-md-5">
                        {!! Form::label('postcode', null) !!}
                        {!! Form::text('postcode', null, ['class' => 'form-control'.(!$errors->has('postcode') ? '': ' is-invalid ')]) !!}
                        @include('components.error', ['field' => 'postcode'])
                    </div>
                    <div class="form-group col-md-7">
                        {!! Form::label('plaats', null) !!}
                        {!! Form::text('plaats', null, ['class' => 'form-control'.(!$errors->has('plaats') ? '': ' is-invalid ')]) !!}
                        @include('components.error', ['field' => 'plaats'])
                    </div>
                    <div class="form-group col-md-3"></div>
                    <div class="form-group col-md-6">
                        {!! Form::label('telefoon_prive', null) !!}
                        {!! Form::text('telefoon_prive', null, ['class' => 'form-control'.(!$errors->has('telefoon_prive') ? '': ' is-invalid ')]) !!}
                        @include('components.error', ['field' => 'telefoon_prive'])
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('telefoon_mobiel', null) !!}
                        {!! Form::text('telefoon_mobiel', null, ['class' => 'form-control'.(!$errors->has('telefoon_mobiel') ? '': ' is-invalid ')]) !!}
                        @include('components.error', ['field' => 'telefoon_mobiel'])
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('email', null) !!}
                        {!! Form::text('email', null, ['class' => 'form-control'.(!$errors->has('email') ? '': ' is-invalid ')]) !!}
                        @include('components.error', ['field' => 'email'])
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('sociaal_networkprofiel', null) !!}
                        {!! Form::text('sociaal_networkprofiel', null, ['class' => 'form-control'.(!$errors->has('sociaal_networkprofiel') ? '': ' is-invalid ')]) !!}
                        @include('components.error', ['field' => 'sociaal_networkprofiel'])
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('upload_cv', null) !!} <small><a class="btn btn-sm" href="/{!! $candidate->upload_cv !!}" target="_blank">bekijken</a></small>
                    {!! Form::text('upload_cv', null, ['disabled', 'class' => 'form-control'.(!$errors->has('upload_cv') ? '': ' is-invalid ')]) !!}
                    @include('components.error', ['field' => 'upload_cv'])
                </div>
                <div class="form-group">
                    {!! Form::label('upload_motivatiebrief', null) !!} <small><a class="btn btn-sm" href="/{!! $candidate->upload_motivatiebrief !!}" target="_blank">bekijken</a></small>
                    {!! Form::text('upload_motivatiebrief', null, ['disabled', 'class' => 'form-control'.(!$errors->has('upload_motivatiebrief') ? '': ' is-invalid ')]) !!}
                    @include('components.error', ['field' => 'upload_motivatiebrief'])
                </div>
                <div class="form-group">
                    {!! Form::label('profiel', 'Profiel foto') !!} <small><a class="btn btn-sm" href="/{!! $candidate->profiel_foto !!}" target="_blank">bekijken</a></small>
                    {!! Form::text('profiel', $candidate->profiel_foto, ['disabled', 'class' => 'form-control']) !!}
                </div>

{{--                <button type="submit">test</button>--}}

{{--                {!! Form::text('test', null) !!}--}}
{{--                {!! Form::file('tieten_ok', null) !!}--}}
                <div class="form-group">
                    <label for="">Upload profiel foto</label>
                    <div class="input-group">
                        <div class="custom-file">
                            {!! Form::file('profiel_foto',  ['class' => 'custom-file-input', 'accept="image/jpeg"']) !!}
                            {!! Form::label('profiel_foto', 'kies (jpeg) bestand', ['class' => 'custom-file-label', 'style="padding: .375rem .75rem;"']) !!}
                        </div>
                    </div>
                    @include('components.error', ['field' => 'profiel_foto'])
                </div>
                <div class="form-group">
                    {!! Form::label('status', null) !!}
                    {!! Form::text('status', null, ['class' => 'form-control'.(!$errors->has('status') ? '': ' is-invalid ')]) !!}
                    @include('components.error', ['field' => 'status'])
                </div>

                @include('admin.components.notices', ['model' => $candidate])

            </div>
            <div class="col-md-6">

                <div class="form-group">
                    {!! Form::label('inleiding', null) !!}
                    {!! Form::textarea('inleiding', null, ['rows="5"','class' => 'form-control'.(!$errors->has('inleiding') ? '': ' is-invalid ')]) !!}
                    @include('components.error', ['field' => 'inleiding'])
                </div>

                @include('admin.components.clone-section', [
                    'name' => 'talen',
                    'values' => $candidate->languages->toArray(),
                    'array' => [
                        [
                            'name' => 'taal',
                            'col' => '7',
                            'value' => '',
                            'type' => 'text',
                        ],
                        [
                            'name' => 'ervaring',
                            'col' => '5',
                            'value' => ['matig', 'redelijk', 'goed', 'zeer goed', 'moedertaal'],
                            'type' => 'select',
                        ],
                    ]
                ])

                @include('admin.components.clone-section', [
                    'name' => 'vaardigheden',
                    'values' => $candidate->skills->toArray(),
                    'array' => [
                        [
                            'name' => 'vaardigheid',
                            'col' => '8',
                            'value' => '',
                            'type' => 'text',
                        ],
                        [
                            'name' => 'ervaring',
                            'col' => '4',
                            'value' => ['matig', 'goed', 'zeer goed'],
                            'type' => 'select',
                        ],
                    ]
                ])

                @include('admin.components.clone-section', [
                    'name' => 'opleidingen',
                    'values' => $candidate->educations->toArray(),
                    'array' => [
                    [
                        'name' => 'schooling',
                        'col' => '6',
                        'value' => '',
                        'type' => 'text',
                    ],
                    [
                        'name' => 'van',
                        'col' => '3',
                        'value' => '',
                        'type' => 'text',
                    ],
                    [
                        'name' => 'tot',
                        'col' => '3',
                        'value' => '',
                        'type' => 'text',
                    ],
                    [
                        'name' => 'school_en_plaats',
                        'col' => '12',
                        'value' => '',
                        'type' => 'text',
                    ],
                ]])

                @include('admin.components.clone-section', [
                    'name' => 'werkervaring',
                    'values' => $candidate->experiences->toArray(),
                    'array' => [
                    [
                        'name' => 'functie',
                        'col' => '6',
                        'value' => '',
                        'type' => 'text',
                    ],
                    [
                        'name' => 'van',
                        'col' => '3',
                        'value' => '',
                        'type' => 'text',
                    ],
                    [
                        'name' => 'tot',
                        'col' => '3',
                        'value' => '',
                        'type' => 'text',
                    ],
                    [
                        'name' => 'bedrijf',
                        'col' => '12',
                        'value' => '',
                        'type' => 'text',
                    ],
                    [
                        'name' => 'inleiding',
                        'col' => '12',
                        'value' => '',
                        'type' => 'textarea',
                    ],
                ]])

                @include('admin.components.clone-section', [
                    'name' => 'referenties',
                    'values' => $candidate->references->toArray(),
                    'array' => [
                    [
                        'name' => 'contactpersoon',
                        'col' => '6',
                        'value' => '',
                        'type' => 'text',
                    ],
                    [
                        'name' => 'bedrijf',
                        'col' => '6',
                        'value' => '',
                        'type' => 'text',
                    ],
                    [
                        'name' => 'telefoonnummer',
                        'col' => '6',
                        'value' => '',
                        'type' => 'text',
                    ],
                    [
                        'name' => 'email',
                        'col' => '6',
                        'value' => '',
                        'type' => 'text',
                    ]
                ]])


                @include('admin.components.clone-section', [
                    'name' => 'interesses',
                    'values' => $candidate->interests->toArray(),
                    'array' => [
                    [
                        'name' => 'interesse',
                        'col' => '12',
                        'value' => '',
                        'type' => 'text',
                    ],
                ]])

            </div>
        </div>

    {{Form::close()}}
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
@endpush

@push('scripts')
{{--    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
{{--    <script type="text/javascript" src="https://github.com/moment/moment/blob/master/locale/nl.js"></script>--}}

    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                icons: {
                    time: 'fas fa-clock',
                    date: 'fas fa-calendar',
                    up: 'fas fa-arrow-up',
                    down: 'fas fa-arrow-down',
                    previous: 'fas fa-arrow-circle-left',
                    next: 'fas fa-arrow-circle-right',
                    today: 'far fa-calendar-check-o',
                    clear: 'fas fa-trash',
                    close: 'far fa-times'
                },
                locale: moment.locale('nl'),
                format: 'dd D MMMM YYYY HH:mm',
                minDate:new Date('{!! \Carbon\Carbon::now() !!}')
            });
        });
    </script>
@endpush
