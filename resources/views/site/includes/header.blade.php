<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-none">
    <div class="container py-md-3">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="/{{getSetting('logo')}}" alt="" height="40" class="   d-lg-none align-top">
            <img src="/{{getSetting('logo')}}" alt="" height="70" class="d-none d-lg-block d-xl-block align-top">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto d-lg-flex align-items-center align-items-md-center">
                <li class="nav-item ">
                    <a class="nav-link {!! active(['site.home'], 'orange-text') !!}" href="{!! route('site.home') !!}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {!! active(['site.employers.index'], 'orange-text') !!}" href="{!! route('site.employers.index') !!}">Werkgevers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {!! active(['site.jobs.index'], 'orange-text') !!}" href="{!! route('site.jobs.index') !!}">Vacatures</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {!! active(['site.about.index'], 'orange-text') !!}" href="{!! route('site.about.index') !!}">Over ons</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {!! active(['site.contact.index'], 'orange-text') !!}" href="{!! route('site.contact.index') !!}">Contact</a>
                </li>
                <li class="nav-item">
                    <a style="font-size: 14px !important;" class="nav-link btn btn-orange text-white btn-rounded btn-sm {!! active(['site.candidates.index'], 'black-text') !!}" href="{!! route('site.candidates.index') !!}">upload je CV</a>
                </li>
{{--                @guest--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                    </li>--}}
{{--                    @if (Route::has('register'))--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
{{--                @else--}}
{{--                    <li class="nav-item dropdown">--}}
{{--                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                            {{ Auth::user()->name }} <span class="caret"></span>--}}
{{--                        </a>--}}

{{--                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                            <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                               onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                {{ __('Logout') }}--}}
{{--                            </a>--}}

{{--                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                                @csrf--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                @endguest--}}
            </ul>
        </div>
    </div>
</nav>

<div class="rgba-orange-strong">
    <div class="container">

        <!-- Grid row-->
        <div class="row py-2 d-flex align-items-center">

            <!-- Grid column -->
            <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                <h6 class="mb-0 text-white font-weight-bold">
                    @if(getSetting('telefoon_nummer'))
                        Heeft u vragen?
                        <a href="tel:{{getSetting('telefoon_nummer')}}" class="text-dark"><i class="fas fa-phone" style="font-size: 11px;"></i> {{getSetting('telefoon_nummer')}}</a>
                     @endif
                </h6>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-6 col-lg-7 text-center text-md-right text-white font-weight-bold">
                Volg ons op
                @if(getSetting('facebook_link'))
                    <!-- Facebook -->
                    <a class="fb-ic" target="_blank" href="{{getSetting('facebook_link')}}">
                        <i class="fab fa-facebook-f white-text mr-2 ml-2"> </i>
                    </a>
                @endif
                @if(getSetting('twitter_link'))
                    <!-- Twitter -->
                    <a class="tw-ic" target="_blank" href="{{getSetting('twitter_link')}}">
                        <i class="fab fa-twitter white-text mr-2"> </i>
                    </a>
                @endif
                @if(getSetting('google_plus_link'))
                    <!-- Google +-->
                    <a class="gplus-ic" target="_blank" href="{{getSetting('google_plus_link')}}">
                        <i class="fab fa-google-plus-g white-text mr-2"> </i>
                    </a>
                @endif
                @if(getSetting('linkedin_link'))
                    <!--Linkedin -->
                    <a class="li-ic" target="_blank" href="{{getSetting('linkedin_link')}}">
                        <i class="fab fa-linkedin-in white-text mr-2"> </i>
                    </a>
                @endif
                @if(getSetting('instagram_link'))
                    <!--Instagram-->
                    <a class="ins-ic" target="_blank" href="{{getSetting('instagram_link')}}">
                        <i class="fab fa-instagram white-text"> </i>
                    </a>
                @endif

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row-->

    </div>
</div>
