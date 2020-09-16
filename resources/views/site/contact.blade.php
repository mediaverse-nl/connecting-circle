@extends('site.layouts.app')

@section('title', 'Page Title')

@section('content')
    @parent
    @component('site.components.image-editor', ['key' => 'contact_banner'])
        @include('site.components.banner', ['title' => $page->titel ?? null, 'key' => 'contact_banner'])
    @endcomponent

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- Default form register -->
                {!! Form::open(['route' => ['site.contact.store'], 'method' => 'POST', 'id' => 'contactform', 'class' => 'order border-orange p-3 mt-4 mb-4']) !!}
                    <p class="h4 text-center mb-4">Contactformulier</p>
                    <div class="form-row ">
                        <div class="col-md-6 col-sm-6 mb-4">
                            {!! Form::text('voornaam', null, ['placeholder' => 'Voornaam', 'class' => 'form-control'.(!$errors->has('voornaam') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'voornaam'])
                        </div>
                        <div class="col-md-6 col-sm-6 mb-4">
                            {!! Form::text('achternaam', null, ['placeholder' => 'Achternaam', 'class' => 'form-control '.(!$errors->has('achternaam') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'achternaam'])
                         </div>
                        <div class="col-md-6 col-sm-6 mb-4">
                            {!! Form::text('email', null, ['placeholder' => 'E-mail adres', 'class' => 'form-control'.(!$errors->has('email') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'email'])
                         </div>
                        <div class="col-md-6 col-sm-6 mb-4">
                            {!! Form::text('telefoonnummer', null, ['placeholder' => 'Telefoon nummer', 'class' => 'form-control '.(!$errors->has('telefoonnummer') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'telefoonnummer'])
                         </div>
                        <div class="col-md-12 mb-4">
                            {!! Form::textarea('bericht', null, ['rows="5" ', 'placeholder' => 'Uw vraag of opmerking', 'class' => 'form-control '.(!$errors->has('bericht') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'bericht'])
                         </div>
                    </div>

                    <!-- Sign up button -->
{{--                    <button class="" type="submit">Versturen</button>--}}
                    {!! NoCaptcha::displaySubmit('contactform', 'Versturen', ['data-theme' => 'dark', 'class' => 'btn btn-orange btn-block']) !!}

                    <!-- Terms of service -->
                    <p>
                        Bij <em>versturen</em> gaat u akkoord met onze <a href="{{getSetting('algemene_voorwaarden')}}" target="_blank">algemene voorwaarden</a> en
                        <a href="{{getSetting('privacy_statement')}}">privacy statement</a>
                    </p>
                {!! Form::open()!!}

                @component('components.model')
                    @slot('cardTitle', '')
                    @include('site.components.text-editor', ['key' => 'contact_success_message_text'])
                @endcomponent
                <!-- Default form register -->
            </div>
            <div class="col-md-4  mt-4 mb-4">
                @if(getSetting('adres') && getSetting('postcode') && getSetting('plaats'))
                    <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;hl=nl&amp;q={{getSetting('adres')}}+{{getSetting('postcode')}}+{{getSetting('plaats')}}&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                @endif
                @include('site.components.text-editor', ['key' => 'contact_info_text', 'mentions' => []])
            </div>
        </div>
    </div>

@endsection

@push('js')

@endpush

@push('css')

@endpush


