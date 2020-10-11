<?php
    $pages = new \App\Page();

    $slug = str_replace(url('/'), '', url()->current());
    $slug = $slug == '' ? '/': $slug;

    $page = $pages->where('slug','=',$slug);
    $page = $page->first() !== null ? $page->first() : null;

    $outOfScope = active([
        'login',
        'register',
    ], true);
?>
@if(Auth::check() && !$outOfScope)
    @push('page-editor')
        <div class="container-fluid bg-dark">
            <span class="p-3 font-weight-bolder text-white">Admin menu</span>
            <a href="#pageSettings" id="editorButton" class="btn btn-light" data-toggle="collapse">page editor</a>
            <a href="{!! route('admin.dashboard') !!}" class="btn btn-light">
                <i class="fas fa-tachometer-alt pr-2"></i>
                admin panel
            </a>
            <a href="{{ route('logout') }}"
               class="btn btn-light float-right"
               onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                <i class="fas fa-fw pr-2 fa-sign-out-alt"></i>
                Uitloggen
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
        <div class="container-fluid collapse" id="pageSettings" style=" background: #eee">
            <div class="container py-4">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link main-tabs active" id="page-tab" data-toggle="tab" href="#page" role="tab" aria-controls="page"
                           aria-selected="false">Pagina instellingen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link main-tabs" id="seo-tab" data-toggle="tab" href="#seo" role="tab" aria-controls="seo"
                           aria-selected="false">Seo instellingen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link main-tabs" id="site-tab" data-toggle="tab" href="#site" role="tab" aria-controls="site"
                           aria-selected="false">Site instellingen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link main-tabs" id="styling-tab" data-toggle="tab" href="#styling" role="tab" aria-controls="styling"
                           aria-selected="false">Pagina styling</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link main-tabs" id="notificaties-tab" data-toggle="tab" href="#notificaties" role="tab" aria-controls="notificaties"
                           aria-selected="false">Notificaties</a>
                    </li>
                </ul>
                <div class="tab-content card px-0 bg-white" id="myTabContent" style="border-top-left-radius: 0px !important; border-top-right-radius: 0px !important;">
                    <div class="tab-pane fade show active" id="page" role="tabpanel" aria-labelledby="page-tab">
                        <div class="container-fluid">
                            <div class="container py-4">
                                {!! Form::model($page, ['url' => '/api/page-editor', 'method' => 'POST']) !!}
                                    <h1>Pagina instellingen</h1>
                                    <label for="" class="active pt-0">slug</label>
                                    <input type="text" placeholder="" disabled value="{{url()->current()}}" class="form-control" style="height: 45px !important;">
                                    <label for="" class="">titel <small>(h1)</small></label>
                                    {!! Form::text('titel', null, ['class' => 'form-control']) !!}
                                    <div class="custom-control custom-checkbox pt-3">
                                        {!! Form::checkbox('in_menu', 'koppelen aan menu', null, ['id' => 'in_menu', 'class' => 'custom-control-input']) !!}
                                        {!! Form::label('in_menu', null, ['class' => 'custom-control-label']) !!}
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        {!! Form::checkbox('in_sitemap', 'in_sitemap', null, ['id' => 'in_sitemap', 'class' => 'custom-control-input']) !!}
                                        {!! Form::label('in_sitemap', null, ['class' => 'custom-control-label']) !!}
                                    </div>
                                    <button type="submit" class="btn btn-blue m-0 mt-2">
                                        opslaan
                                    </button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="notificaties" role="tabpanel" aria-labelledby="notificaties-tab">
                        <div class="container-fluid" style="">
                            <div class="container py-4">
                                <h1>Pop-ups & Emails</h1>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link sub-tabs active" id="upload-cv-tab" data-toggle="tab" href="#upload-cv" role="tab" aria-controls="global"
                                           aria-selected="false">Upload Cv formulier</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link sub-tabs" id="werkgevers-tab" data-toggle="tab" href="#werkgevers" role="tab" aria-controls="werkgevers"
                                           aria-selected="false">Werkgevers formulier</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link sub-tabs" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                                           aria-selected="false">Contact formulier</a>
                                    </li>
                                </ul>
                                <div class="tab-content card py-2" id="myTabContent" style="border-top-left-radius: 0px !important; border-top-right-radius: 0px !important;">
                                    <div class="tab-pane fade show active" id="upload-cv" role="tabpanel" aria-labelledby="upload-cv-tab">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12 py-2 ">
                                                    <div class="card border">
                                                        <div class="card-body pb-5">
                                                            <label for="" class="h4 pt-0">Pop-up</label>
                                                            @include('site.components.text-editor', ['key' => 'candidate_success_message_text'])
                                                        </div>
                                                    </div>
                                                    <div class="card border mt-3">
                                                        <div class="card-body pb-5">
                                                            <label for="" class="h4 pt-0">E-mail</label>
                                                            @include('site.components.text-editor', [
                                                                'key' => 'candidate_mail_message',
                                                                'mentions' => [
                                                                    'voorletters',
                                                                    'voorvoegsel',
                                                                    'voornaam',
                                                                    'achternaam',
                                                                    'email',
                                                                    'adres',
                                                                    'postcode',
                                                                    'plaats',
                                                                    'telefoonnummer_prive',
                                                                    'telefoonnummer',
                                                                    'geboortedatum',
                                                                    'referentienummer',
                                                                ]
                                                            ])
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="werkgevers" role="tabpanel" aria-labelledby="werkgevers-tab">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12 py-2 ">
                                                    <div class="card border">
                                                        <div class="card-body pb-5">
                                                            <label for="" class="h4 pt-0">Pop-up</label>
                                                            @include('site.components.text-editor', ['key' => 'employer_success_message_text'])
                                                        </div>
                                                    </div>
                                                    <div class="card border mt-3">
                                                        <div class="card-body pb-5">
                                                            <label for="" class="h4 pt-0">E-mail</label>
                                                            @include('site.components.text-editor', [
                                                                'key' => 'employer_mail_message',
                                                                'mentions' => [
                                                                    'voornaam',
                                                                    'achternaam',
                                                                    'email',
                                                                    'telefoonnummer',
                                                                    'bericht',
                                                                    'bedrijfsnaam',
                                                                    'kvk_nummer'
                                                                ]
                                                            ])
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12 py-2 ">
                                                    <div class="card border">
                                                        <div class="card-body pb-5">
                                                            <label for="" class="h4 pt-0">Pop-up</label>
                                                            @include('site.components.text-editor', ['key' => 'contact_success_message_text'])
                                                        </div>
                                                    </div>
                                                    <div class="card border mt-3">
                                                        <div class="card-body pb-5">
                                                            <label for="" class="h4 pt-0">E-mail</label>
                                                            @include('site.components.text-editor', [
                                                                'key' => 'contact_mail_message',
                                                                'mentions' => [
                                                                    'voornaam',
                                                                    'achternaam',
                                                                    'email',
                                                                    'telefoonnummer',
                                                                    'bericht',
                                                                ]
                                                            ])
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="site" role="tabpanel" aria-labelledby="site-tab">
                        <?php
                            $settings = new \App\Settings();
                            $app = app();
                            $laravel_object = $app->make('stdClass');
                            foreach ($settings->get() as $item){
                                $laravel_object->{$item->setting} = $item->field_value;
                            }
                        ?>
                        {!! Form::model($laravel_object, ['url' => '/api/site-settings', 'method' => 'POST', 'files' => true]) !!}
                            <div class="container-fluid" style="">
                                <div class="container py-4">
                                    <h1>Site instellingen</h1>
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link sub-tabs active" id="social-tab" data-toggle="tab" href="#social" role="tab" aria-controls="social"
                                               aria-selected="false">Social media</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link sub-tabs" id="files-tab" data-toggle="tab" href="#files" role="tab" aria-controls="files"
                                               aria-selected="false">Bestanden</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link sub-tabs" id="bestanden-tab" data-toggle="tab" href="#bestanden" role="tab" aria-controls="bestanden"
                                               aria-selected="false">Instellingen</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content card py-2" id="myTabContent" style="border-top-left-radius: 0px !important; border-top-right-radius: 0px !important;">
                                        <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="files-tab">
                                            <div class="container">
                                                <div class="row pt-2">
                                                    <?php
                                                        $logoImage = isset($laravel_object->logo)
                                                            ? $laravel_object->logo
                                                            : null;
                                                        $termsPdf = isset($laravel_object->algemene_voorwaarden)
                                                            ? $laravel_object->algemene_voorwaarden
                                                            : null;
                                                        $cookiePdf = isset($laravel_object->cookie_beleid)
                                                            ? $laravel_object->cookie_beleid
                                                            : null;
                                                        $privacyPdf = isset($laravel_object->privacy_statement)
                                                            ? $laravel_object->privacy_statement
                                                            : null;
                                                    ?>
                                                    <div class="col-md-6 pb-3">
                                                        <div class="m-0 border p-3">
                                                            @if(isset($cookiePdf))
                                                                <img src="{{$logoImage}}" class="img-fluid"> <br>
                                                            @else
                                                                <p>geen logo geupload</p>
                                                            @endif
                                                            <label for="" class="">Logo</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    {!! Form::file('logo', ['class' => 'custom-file-input', 'accept="image/png, image/jpeg"']) !!}
                                                                    {!! Form::label('logo', 'kies png of jpeg', ['class' => 'custom-file-label', 'style="padding: .375rem .75rem;"']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pb-3">
                                                        <div class="m-0 border p-3">
                                                            @if(isset($cookiePdf))
                                                                <a href="{{$cookiePdf}}" class="btn btn-block btn-success text-center">bekijk cookie beleid</a> <br>
                                                            @else
                                                                <p>geen bestaand geupload</p>
                                                            @endif
                                                            <label for="" class="active">cookie beleid</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    {!! Form::file('cookie_beleid', ['class' => 'custom-file-input', 'accept="application/pdf"']) !!}
                                                                    {!! Form::label('cookie_beleid', 'kies pdf', ['class' => 'custom-file-label', 'style="padding: .375rem .75rem;"']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pb-3">
                                                        <div class="m-0 border p-3">
                                                            @if(isset($termsPdf))
                                                                <a href="{{$termsPdf}}" class="btn btn-block btn-success  text-center">bekijk algemene voorwaarden</a> <br>
                                                            @else
                                                                <p>geen bestaand geupload</p>
                                                            @endif
                                                            <label for="" class="active">algemene voorwaarden</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    {!! Form::file('algemene_voorwaarden', ['class' => 'custom-file-input', 'accept="application/pdf"']) !!}
                                                                    {!! Form::label('algemene_voorwaarden', 'kies pdf', ['class' => 'custom-file-label', 'style="padding: .375rem .75rem;"']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pb-3">
                                                        <div class="m-0 border p-3">
                                                            @if(isset($privacyPdf))
                                                                <a href="{{$privacyPdf}}" class="btn btn-block btn-success text-center">bekijk privacy statement</a> <br>
                                                            @else
                                                                <p>geen bestaand geupload</p>
                                                            @endif
                                                            <label for="" class="active">privacy statement</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    {!! Form::file('privacy_statement', ['class' => 'custom-file-input', 'accept="application/pdf"']) !!}
                                                                    {!! Form::label('privacy_statement', 'kies pdf', ['class' => 'custom-file-label', 'style="padding: .375rem .75rem;"']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade show active" id="social" role="tabpanel" aria-labelledby="social-tab">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-6 pb-2">
                                                        <label for="" class="">facebook link</label>
                                                        {!! Form::text('facebook_link', null, ['class' => 'form-control', 'style="height: 45px !important;"']) !!}
                                                        @include('components.error', ['field' => 'facebook_link'])
                                                        <label for="" class="">twitter link</label>
                                                        {!! Form::text('twitter_link', null, ['class' => 'form-control', 'style="height: 45px !important;"']) !!}
                                                        @include('components.error', ['field' => 'twitter_link'])
                                                        <label for="" class="">google plus link</label>
                                                        {!! Form::text('google_plus_link', null, ['class' => 'form-control', 'style="height: 45px !important;"']) !!}
                                                        @include('components.error', ['field' => 'google_plus_link'])
                                                    </div>
                                                    <div class="col-md-6 pb-2">
                                                        <label for="" class="">instagram link</label>
                                                        {!! Form::text('instagram_link', null, ['class' => 'form-control', 'style="height: 45px !important;"']) !!}
                                                        @include('components.error', ['field' => 'instagram_link'])
                                                        <label for="" class="">linkedin link</label>
                                                        {!! Form::text('linkedin_link', null, ['class' => 'form-control', 'style="height: 45px !important;"']) !!}
                                                        @include('components.error', ['field' => 'linkedin_link'])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="bestanden" role="tabpanel" aria-labelledby="bestanden-tab">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-6 pb-2">
                                                        <label for="" class="">postcode</label>
                                                        {!! Form::text('postcode', null, ['class' => 'form-control', 'style="height: 45px !important;"']) !!}
                                                        @include('components.error', ['field' => 'postcode'])
                                                        <label for="" class="">plaats</label>
                                                        {!! Form::text('plaats', null, ['class' => 'form-control', 'style="height: 45px !important;"']) !!}
                                                        @include('components.error', ['field' => 'plaats'])
                                                        <label for="" class="">adres</label>
                                                        {!! Form::text('adres', null, ['class' => 'form-control', 'style="height: 45px !important;"']) !!}
                                                        @include('components.error', ['field' => 'adres'])
                                                        <label for="" class="">fax nummer</label>
                                                        {!! Form::text('fax_nummer', null, ['class' => 'form-control', 'style="height: 45px !important;"']) !!}
                                                        @include('components.error', ['field' => 'fax_nummer'])
                                                        <label for="" class="">telefoon nummer</label>
                                                        {!! Form::text('telefoon_nummer', null, ['class' => 'form-control', 'style="height: 45px !important;"']) !!}
                                                        @include('components.error', ['field' => 'telefoon_nummer'])
                                                        <label for="" class="">kvk nummer</label>
                                                        {!! Form::text('kvk_nummer', null, ['class' => 'form-control', 'style="height: 45px !important;"']) !!}
                                                        @include('components.error', ['field' => 'kvk_nummer'])
                                                        <label for="" class="">btw nummer</label>
                                                        {!! Form::text('btw_nummer', null, ['class' => 'form-control', 'style="height: 45px !important;"']) !!}
                                                        @include('components.error', ['field' => 'btw_nummer'])
                                                        <label for="" class="">contact email</label>
                                                        {!! Form::text('contact_email', null, ['class' => 'form-control', 'style="height: 45px !important;"']) !!}
                                                        @include('components.error', ['field' => 'contact_email'])
                                                        <label for="" class="">info email</label>
                                                        {!! Form::text('info_email', null, ['class' => 'form-control', 'style="height: 45px !important;"']) !!}
                                                        @include('components.error', ['field' => 'info_email'])
                                                    </div>
                                                    <div class="col-md-6 pb-2">
                                                        <label for="" class="">bank naam</label>
                                                        {!! Form::text('bank_naam', null, ['class' => 'form-control', 'style="height: 45px !important;"']) !!}
                                                        @include('components.error', ['field' => 'bank_naam'])
                                                        <label for="" class="">BIC nummer</label>
                                                        {!! Form::text('bic_nummer', null, ['class' => 'form-control', 'style="height: 45px !important;"']) !!}
                                                        @include('components.error', ['field' => 'bic_nummer'])
                                                        <label for="" class="">rekeningnummer</label>
                                                        {!! Form::text('rekeningnummer', null, ['class' => 'form-control', 'style="height: 45px !important;"']) !!}
                                                        @include('components.error', ['field' => 'rekeningnummer'])
                                                        <label for="" class="">maps api key</label>
                                                        {!! Form::text('maps_api_key', null, ['class' => 'form-control', 'style="height: 45px !important;"']) !!}
                                                        @include('components.error', ['field' => 'maps_api_key'])
                                                        <label for="" class="">Google Analytics api key</label>
                                                        {!! Form::text('google_analytics_api_key', null, ['class' => 'form-control', 'style="height: 45px !important;"']) !!}
                                                        @include('components.error', ['field' => 'google_analytics_api_key'])
                                                        <label for="" class="">hotjar api key</label>
                                                        {!! Form::text('hotjar_api_key', null, ['class' => 'form-control', 'style="height: 45px !important;"']) !!}
                                                        @include('components.error', ['field' => 'hotjar_api_key'])
                                                        <label for="" class="">facebook Admin id</label>
                                                        {!! Form::text('facebook_admin_id', null, ['class' => 'form-control', 'style="height: 45px !important;"']) !!}
                                                        @include('components.error', ['field' => 'facebook_admin_id'])
                                                        <label for="" class="">NOCAPTCHA SECRET (v3)</label>
                                                        {!! Form::text('NOCAPTCHA_SECRET', null, ['class' => 'form-control', 'style="height: 45px !important;"']) !!}
                                                        @include('components.error', ['field' => 'NOCAPTCHA_SECRET'])
                                                        <label for="" class="">NOCAPTCHA SITEKEY (v3)</label>
                                                        {!! Form::text('NOCAPTCHA_SITEKEY', null, ['class' => 'form-control', 'style="height: 45px !important;"']) !!}
                                                        @include('components.error', ['field' => 'NOCAPTCHA_SITEKEY'])
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-blue m-0 mt-2">
                                        opslaan
                                    </button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="tab-pane fade" id="styling" role="tabpanel" aria-labelledby="styling-tab">
                        <?php
                            $pageStylingPath = public_path().'/css/editor/'.($page->id ?? null).'.css';
                            $pageStyling = null;
                            if (file_exists($pageStylingPath)){
                                $pageStyling = file_get_contents($pageStylingPath);
                            }
                            $globalStylingPath = public_path().'/css/editor/global.css';
                            $globalStyling = null;
                            if (file_exists($globalStylingPath)){
                                $globalStyling = file_get_contents($globalStylingPath);
                            }
                        ?>
                        {!! Form::model($laravel_object, ['url' => '/api/style-editor', 'method' => 'POST', 'files' => true]) !!}
                            <div class="container-fluid" style="">
                                <div class="container py-4">
                                    <h1>Site styling</h1>
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link sub-tabs active" id="page-styling-tab" data-toggle="tab" href="#page-styling" role="tab" aria-controls="page-styling"
                                               aria-selected="false">Pagina styling</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link sub-tabs" id="global-styling-tab" data-toggle="tab" href="#global-styling" role="tab" aria-controls="global-styling"
                                               aria-selected="false">Global styling</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content card py-2" id="myTabContent" style="border-top-left-radius: 0px !important; border-top-right-radius: 0px !important;">
                                        <div class="tab-pane fade show active" id="page-styling" role="tabpanel" aria-labelledby="page-styling-tab">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12 pb-2">
                                                        {!! Form::textarea('page_styling', $pageStyling, ['class' => 'form-control']) !!}
                                                        @include('components.error', ['field' => 'page_styling'])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="global-styling" role="tabpanel" aria-labelledby="global-styling-tab">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12 pb-2">
                                                        {!! Form::textarea('global_styling', $globalStyling, ['class' => 'form-control']) !!}
                                                        @include('components.error', ['field' => 'global_styling'])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-blue m-0 mt-2">
                                        opslaan
                                    </button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    @endpush
    @push('css')
        <style type="text/css">
            #pageSettings label{
                padding-top: 1em;
            }
            #pageSettings label::first-letter {
                text-transform: uppercase;
            }
            #pageSettings .custom-control-label{
                padding-top: 0px !important;
            }
            .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{
                z-index: 9999;
                position: inherit;
            }
            .tab-content.card{
                border: 1px solid #dee2e6;
                border-top: none !important;
                box-shadow: none !important;
            }
        </style>
    @endpush
    @push('js')
        <script type="text/javascript" >
            //main tabs
            $('a.main-tabs[data-toggle="tab"]').on('show.bs.tab', function(e) {
                localStorage.setItem('activeTabMain', $(e.target).attr('href'));
            });
            var activeTabMain = localStorage.getItem('activeTabMain');
            if(activeTabMain){
                $('#myTab a[href="' + activeTabMain + '"]').tab('show');
            }

            //secondary tabs
            $('a.sub-tabs[data-toggle="tab"]').on('show.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            var activeTab = localStorage.getItem('activeTab');
            if(activeTab){
                $('#myTab a[href="' + activeTab + '"]').tab('show');
            }

            $('a[data-toggle="collapse"]').on('click', function(e) {
                if(localStorage.getItem('showEditor') == 'true'){
                    $('#editorButton').html('editor uitklappen <i class="fas pl-2 fa-fw fa-chevron-circle-down"></i>');
                    localStorage.setItem('showEditor', 'false');
                }else{
                    $('#editorButton').html('editor inklappen <i class="fas pl-2 fa-fw fa-chevron-circle-up"></i>');
                    localStorage.setItem('showEditor', 'true');
                }
            });

            if(localStorage.getItem('showEditor') == 'true'){
                $('#editorButton').html('editor inklappen <i class="fas pl-2 fa-fw fa-chevron-circle-up"></i>');
                $('#pageSettings').addClass('show');
            }else{
                $('#editorButton').html('editor uitklappen <i class="fas pl-2 fa-fw fa-chevron-circle-down"></i>');
                $('#pageSettings').removeClass('show');
            }
        </script>
    @endpush
@endif

@push('css')
    @if (file_exists('/css/editor/global.css'))
        <link rel="stylesheet" href="{{'/css/editor/global.css'}}">
    @endif
    @if($page !== null && file_exists('/css/editor/'.($page->id ?? null).'.css'))
        <link rel="stylesheet" href="{{'/css/editor/'.($page->id ?? null).'.css'}}">
    @endif
@endpush
