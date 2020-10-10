<!-- Footer -->
<footer class="page-footer font-small unique-color-dark">

    <div class="rgba-orange-strong">
        <div class="container">

            <!-- Grid row-->
            <div class="row py-4 d-flex align-items-center">

                <!-- Grid column -->
                <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                    <h6 class="mb-0">Get connected with us on social networks!</h6>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-6 col-lg-7 text-center text-md-right">

                    @if(getSetting('facebook_link'))
                        <!-- Facebook -->
                        <a class="fb-ic" href="{{getSetting('facebook_link')}}">
                            <i class="fab fa-facebook-f white-text mr-4"> </i>
                        </a>
                    @endif
                    @if(getSetting('twitter_link'))
                        <!-- Twitter -->
                        <a class="tw-ic" href="{{getSetting('twitter_link')}}">
                            <i class="fab fa-twitter white-text mr-4"> </i>
                        </a>
                    @endif
                    @if(getSetting('google_plus_link'))
                        <!-- Google +-->
                        <a class="gplus-ic" href="{{getSetting('google_plus_link')}}">
                            <i class="fab fa-google-plus-g white-text mr-4"> </i>
                        </a>
                    @endif
                    @if(getSetting('linkedin_link'))
                        <!--Linkedin -->
                        <a class="li-ic" href="{{getSetting('linkedin_link')}}">
                            <i class="fab fa-linkedin-in white-text mr-4"> </i>
                        </a>
                    @endif
                    @if(getSetting('instagram_link'))
                        <!--Instagram-->
                        <a class="ins-ic" href="{{getSetting('instagram_link')}}">
                            <i class="fab fa-instagram white-text"> </i>
                        </a>
                    @endif
                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row-->

        </div>
    </div>

    <!-- Footer Links -->
    <div class="container text-center text-md-left mt-5">

        <!-- Grid row -->
        <div class="row mt-3">

            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

                <!-- Content -->
                <h6 class="text-uppercase font-weight-bold">Connecting Circle</h6>
                <hr class="deep-orange accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                @include('site.components.text-editor', ['key' => 'footer_text', 'mentions' => []])
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Vacatures</h6>
                <hr class="deep-orange accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">

                @foreach(collect(\App\Jobs::with(['specialty'])->groupBy('specialty_id')->get())->sortBy('specialty.naam') as $i)
                    <p>
                        <a href="{!! route('site.jobs.index') !!}?vakgebied[]={!! $i->specialty_id !!}">{!! $i->specialty->naam !!}</a>
                    </p>
                @endforeach
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">links</h6>
                <hr class="deep-orange accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <a href="{!! route('site.employers.index') !!}">Werkgevers</a>
                </p>
                <p>
                    <a href="{!! route('site.jobs.index') !!}">Vacatures</a>
                </p>
                <p>
                    <a href="{!! route('site.about.index') !!}">Over ons</a>
                </p>
                <p>
                    <a href="{!! route('site.contact.index') !!}">Contact</a>
                </p>
                <p>
                    <a href="{!! route('site.candidates.index') !!}">Upload je cv</a>
                </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Contact</h6>
                <hr class="deep-orange accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                @if(getSetting('postcode') && getSetting('adres') && getSetting('plaats'))
                    <p><i class="fas fa-home mr-3"></i> <span>{{getSetting('adres')}}, <br><span style="padding-left: 35px;">{{getSetting('postcode')}} {{getSetting('plaats')}}</span></span> </p>
                @endif
                @if(getSetting('info_email'))
                    <p><i class="fas fa-envelope mr-3"></i> {{getSetting('info_email')}}</p>
                @endif
                @if(getSetting('telefoon_nummer'))
                    <p><i class="fas fa-phone mr-3"></i>{{getSetting('telefoon_nummer')}}</p>
                @endif
                @if(getSetting('fax_nummer'))
                    <p><i class="fas fa-print mr-3"></i> {{getSetting('fax_nummer')}}</p>
                @endif
            </div>
            <!-- Grid column -->
        </div>
        <!-- Grid row -->
    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright py-3 pb-4">
      <div class="container text-center">
          <div class="row mt-3">
              <div class="col-md-4 mx-auto my-1 text-md-left">
                  @if(getSetting('algemene_voorwaarden'))
                      <a href="{{getSetting('algemene_voorwaarden')}}"> Algemene voorwaarden</a> -
                  @endif
                  @if(getSetting('privacy_statement'))
                      <a href="{{getSetting('privacy_statement')}}"> Privacy</a> -
                  @endif
                  @if(getSetting('cookie_beleid'))
                    <a href="{{getSetting('cookie_beleid')}}"> Cookie beleid</a>
                  @endif
              </div>
              <div class="col-md-4 mx-auto my-1 text-md-center text-muted">
                  Made By <a href="https://web-assembled.nl">web-assembled.nl</a>
              </div>
              <div class="col-md-4 mx-auto my-1 text-md-right">
                   © {!! date('Y') !!} Copyright: <a>{{str_replace('https://', '', url('/'))}}</a>
              </div>
          </div>
      </div>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
