@extends('admin.layouts.admin')

@section('content')
    {{Form::model($employer, ['route' => ['admin.employer.update', $employer->id], 'method' => 'PATCH', 'files' => true])}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <span class="h3 align-items-center">
                        Bedrijf wijzigen
                    </span>
                        <span class="float-right">
                        @component('admin.components.model', [
                           'id' => 'editPage',
                           'title' => 'Bedrijf wijzigen',
                           'actionRoute' => route('admin.employer.update', $employer->id),
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
                    {!! Form::label('bedrijfsnaam', null) !!}
                    {!! Form::text('bedrijfsnaam', null, ['class' => 'form-control'.(!$errors->has('bedrijfsnaam') ? '': ' is-invalid ')]) !!}
                    @include('components.error', ['field' => 'bedrijfsnaam'])
                </div>
                <div class="form-group">
                    {!! Form::label('email', null) !!}
                    {!! Form::email('email', null, ['class' => 'form-control'.(!$errors->has('email') ? '': ' is-invalid ')]) !!}
                    @include('components.error', ['field' => 'email'])

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('data[iban_nummer]', 'iban_nummer') !!}
                            {!! Form::text('data[iban_nummer]', $employer->data['iban_nummer'], ['class' => 'form-control'.(!$errors->has('data[iban_nummer]') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'data[iban_nummer]'])
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('kvk_nummer', 'kvk nummer') !!}
                            {!! Form::text('kvk_nummer', null, ['class' => 'form-control'.(!$errors->has('kvk_nummer') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'data[kvk_nummer'])
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('data[btw_nummer]', 'btw nummer') !!}
                            {!! Form::text('data[btw_nummer]', $employer->data['btw_nummer'], ['class' => 'form-control'.(!$errors->has('data[btw_nummer]') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'data[btw_nummer]'])
                        </div>
                    </div>
                </div>
                <h3 class="h5">Bedrijfs adres</h3>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('data[adres_1]', 'adres + nr') !!}
                            {!! Form::text('data[adres_1]', $employer->data['adres_1'], ['class' => 'form-control'.(!$errors->has('data[adres_1]') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'data[adres_1]'])
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            {!! Form::label('data[stad_1]', 'stad') !!}
                            {!! Form::text('data[stad_1]', $employer->data['stad_1'], ['class' => 'form-control'.(!$errors->has('data[stad_1]') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'data[stad_1]'])
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            {!! Form::label('data[postcode_1]', 'postcode') !!}
                            {!! Form::text('data[postcode_1]', $employer->data['postcode_1'], ['class' => 'form-control'.(!$errors->has('data[postcode_1]') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'data[postcode_1]'])
                        </div>
                    </div>
                </div>
                <h3 class="h5">Post adres</h3>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('data[adres_2]', 'adres + nr') !!}
                            {!! Form::text('data[adres_2]', $employer->data['adres_2'], ['class' => 'form-control'.(!$errors->has('data[adres_2]') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'data[adres_2]'])
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            {!! Form::label('data[stad_2]', 'stad') !!}
                            {!! Form::text('data[stad_2]', $employer->data['stad_2'], ['class' => 'form-control'.(!$errors->has('data[stad_2]') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'data[stad_2]'])
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            {!! Form::label('data[postcode_2]', 'postcode') !!}
                            {!! Form::text('data[postcode_2]', $employer->data['postcode_2'], ['class' => 'form-control'.(!$errors->has('data[postcode_2]') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'data[postcode_2]'])
                        </div>
                    </div>
                </div>

                @include('admin.components.clone-section', [
                    'name' => 'data[contact_persoon]',
                    'label' => 'contact persoon',
                    'values' => $employer->data['contact_persoon'],
                    'array' => [
                        [
                            'name' => 'email',
                            'col' => '12',
                            'value' => '',
                            'type' => 'text',
                        ],
                        [
                            'name' => 'naam',
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
                    ]
                ])


            </div>
            <div class="col-md-6">
                @include('admin.components.notices', ['model' => $employer])
            </div>

            {{--            <div class="col-md-6">--}}
{{--                 @component('admin.components.datatable', ['title' => 'vacatures'])--}}
{{--                    @slot('head')--}}
{{--                        <th>id</th>--}}
{{--                        <th>Bedrijfsnaam</th>--}}
{{--                        <th class="no-sort"></th>--}}
{{--                    @endslot--}}
{{--                    @slot('table')--}}
{{--                        @for($i = 1; $i <= 3; $i++)--}}
{{--                            <tr class="">--}}
{{--                                <td>{!! $i !!}</td>--}}
{{--                                <td>{!! $i !!}</td>--}}
{{--                                <td>--}}
{{--                                    <a href="{{route('admin.employer.edit', $employer->id)}}" class="rounded-circle edit">--}}
{{--                                        <i class="fa fa-edit"></i>--}}
{{--                                    </a>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endfor--}}
{{--                    @endslot--}}
{{--                @endcomponent--}}

{{--                @component('admin.components.datatable', ['title' => 'kandidaten'])--}}
{{--                    @slot('head')--}}
{{--                        <th>id</th>--}}
{{--                        <th>Bedrijfsnaam</th>--}}
{{--                        <th class="no-sort"></th>--}}
{{--                    @endslot--}}
{{--                    @slot('table')--}}
{{--                        @for($i = 1; $i <= 3; $i++)--}}
{{--                            <tr class="">--}}
{{--                                <td>{!! $i !!}</td>--}}
{{--                                <td>{!! $i !!}</td>--}}
{{--                                <td>--}}
{{--                                    <a href="{{route('admin.employer.edit', $employer->id)}}" class="rounded-circle edit">--}}
{{--                                        <i class="fa fa-edit"></i>--}}
{{--                                    </a>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endfor--}}
{{--                    @endslot--}}
{{--                @endcomponent--}}
{{--            </div>--}}
        </div>

    {{Form::close()}}
@endsection

@push('css')
@endpush

@push('scripts')
@endpush
