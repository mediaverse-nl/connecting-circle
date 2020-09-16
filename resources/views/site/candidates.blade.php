@extends('site.layouts.app')

@section('title', 'Page Title')

@section('content')
    @parent
    @component('site.components.image-editor', ['key' => 'candidates_banner'])
        @include('site.components.banner', ['title' => $page->titel ?? null, 'key' => 'candidates_banner'])
    @endcomponent

    <div class="container">
        <div class="row">
            <div class="col-md-12 my-4">
                @include('site.components.text-editor', ['key' => 'candidates_text', 'mentions' => []])
            </div>

            <div class="col-md-12">
                {!! Form::open(['route' => ['site.candidates.store'], 'method' => 'POST', 'files' => true, 'id' => 'appform', 'class' => 'order border-orange p-3 mt-4 mb-4']) !!}

                    <!-- Default form register -->
                    <p class="h4 mb-0">Upload je CV en schrijf je in</p>
                    <hr>
                    <div class="text-muted mb-3">
                        <div class="row">
                            <div class="col-md-6 text-left">Vul hier uw persoonlijke gegevens in </div>
                            <div class="col-md-6  text-md-right">velden met * zijn verplicht.</div>
                        </div>
                    </div>
                    <p class="h5 orange-text"><i class="fas fa-fw pr-2 fa-user"></i> Vul hier uw persoonlijke gegevens in</p>
                    <hr>
                    <div class="form-row ">
                        <div class="col-md-3 col-sm-6 mb-4">
                            {!! Form::text('voorletters', null, ['placeholder' => 'Voorletters *', 'class' => 'form-control'.(!$errors->has('voorletters') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'voorletters'])
                        </div>
                        <div class="col-md-3 col-sm-6 mb-4">
                            {!! Form::text('voornaam', null, ['placeholder' => 'Voornaam *', 'class' => 'form-control'.(!$errors->has('voornaam') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'voornaam'])
                        </div>
                        <div class="col-md-3 col-sm-6 mb-4">
                            {!! Form::text('voorvoegsel', null, ['placeholder' => 'Voorvoegsel', 'class' => 'form-control '.(!$errors->has('voorvoegsel') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'voorvoegsel'])
                        </div>
                        <div class="col-md-3 col-sm-6 mb-4">
                            {!! Form::text('achternaam', null, ['placeholder' => 'Achternaam *', 'class' => 'form-control '.(!$errors->has('achternaam') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'achternaam'])
                        </div>
                        <div class="col-md-6 col-sm-6 mb-4">
                            {!! Form::text('adres', null, ['placeholder' => 'Adres *', 'class' => 'form-control'.(!$errors->has('adres') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'adres'])
                        </div>
                        <div class="col-md-3 col-sm-6 mb-4">
                            {!! Form::text('postcode', null, ['placeholder' => 'Postcode *', 'class' => 'form-control'.(!$errors->has('postcode') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'postcode'])
                        </div>
                        <div class="col-md-3 col-sm-6 mb-4">
                            {!! Form::text('plaats', null, ['placeholder' => 'Plaats *', 'class' => 'form-control'.(!$errors->has('plaats') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'plaats'])
                        </div>
                        <div class="col-md-3 col-sm-6 mb-4">
                            {!! Form::text('telefoon_prive', null, ['placeholder' => 'Telefoon prive *', 'class' => 'form-control'.(!$errors->has('telefoon_prive') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'telefoon_prive'])
                        </div>
                        <div class="col-md-3 col-sm-6 mb-4">
                            {!! Form::text('telefoon_mobile', null, ['placeholder' => 'Telefoon mobile', 'class' => 'form-control'.(!$errors->has('telefoon_mobile') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'telefoon_mobile'])
                        </div>
                        <div class="col-md-3 col-sm-6 mb-4">
                            {!! Form::text('email', null, ['placeholder' => 'E-mailadres *', 'class' => 'form-control'.(!$errors->has('email') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'email'])
                        </div>
                        <div class="col-md-3 col-sm-6 mb-4">
                            {!! Form::text('sociaal_networkprofiel', null, ['placeholder' => 'Sociaal netwerkprofiel', 'class' => 'form-control '.(!$errors->has('sociaal_netwerkprofiel') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'sociaal_networkprofiel'])
                        </div>
                        <div class="col-md-3 mb-4">
                            {!! Form::text('geboortedatum', null, ['rows="5" ', 'placeholder' => 'Geboortedatum *', 'class' => 'form-control '.(!$errors->has('geboortedatum') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'geboortedatum'])
                        </div>
                    </div>

                    <p class="h5 orange-text"><i class="fas fa-fw pr-2 fa-upload"></i> Bijlagen uploaden</p>
                    <hr>
                    <div class="form-row ">
                        <div class="col-md-3 col-sm-6 mb-4">
                            <label for="">Upload motivatiebrief * (max 3mb)</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    {!! Form::file('upload_motivatiebrief', ['class' => 'custom-file-input', 'accept="application/pdf"']) !!}
                                    {!! Form::label('upload_motivatiebrief', 'kies (pdf) bestand', ['class' => 'custom-file-label', 'style="padding: .375rem .75rem;"']) !!}
                                </div>
                            </div>
                            @include('components.error', ['field' => 'upload_motivatiebrief'])
                        </div>
                        <div class="col-md-3 col-sm-6 mb-4">
                            <label for="">Upload CV * (max 3mb)</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    {!! Form::file('upload_cv', ['class' => 'custom-file-input', 'accept="application/pdf"']) !!}
                                    {!! Form::label('upload_cv', 'kies (pdf) bestand', ['class' => 'custom-file-label', 'style="padding: .375rem .75rem;"']) !!}
                                </div>
                            </div>
                            @include('components.error', ['field' => 'upload_cv'])
                        </div>
                    </div>

                    <p class="h5 orange-text"><i class="fas fa-fw pr-2 fa-user-secret"></i> Privacyverklaring</p>
                    <hr>
                    <div class="form-row ">
                        <div class="col-md-12 col-sm-6 mb-4">
                            <div class="custom-control custom-checkbox pt-0 mb-4 ">
                                <input id="voorwaarden" class="custom-control-input {{$errors->has('voorwaarden') ? ' is-invalid' : null}}" name="voorwaarden" type="checkbox">
                                <label for="voorwaarden" class="custom-control-label text-muted {{$errors->has('voorwaarden') ? ' text-danger' : null}}">Ik ga akkoord met de algemene voorwaarden van Connecting Circle en dat mijn gegevens voor maximaal 1 jaar mag worden opgeslagen en gebruikt voor de behandeling van mijn sollicitatie.</label>
                                @include('components.error', ['field' => 'voorwaarden'])
                            </div>
                            {!! NoCaptcha::displaySubmit('appform', 'Versturen', ['data-theme' => 'dark', 'class' => 'btn btn-orange btn-block']) !!}
                        </div>
                    </div>
                {!! Form::open()!!}
            </div>

            @component('components.model')
                @slot('cardTitle', '')
                @include('site.components.text-editor', ['key' => 'candidate_success_message_text'])
            @endcomponent

        </div>
    </div>

@endsection

@push('js')

@endpush

@push('css')
    <style>
        #appform input,
        #appform .custom-file-label{
            border-radius: 0px;
            padding: 1.3em;
        }

    </style>
@endpush


