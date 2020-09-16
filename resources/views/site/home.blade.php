@extends('site.layouts.app')

@section('title', 'Page Title')

@section('content')
    @parent
    @component('site.components.image-editor')
        <div class="card card-image" style="border-radius:0px !important;background-size: cover; background-position: bottom; background-image: url(@include('site.components.image-viewer'));">
            <div class="text-white text-center rgba-stylish-strong py-5 px-4" >
                <div class="py-5">
                    @include('site.components.text-editor', ['key' => 'home_banner_text', 'mentions' => []])
                    <div class="container">
                        {!! Form::open(['route' => ['site.jobs.index'], 'method' => 'get', 'id' => 'filterForm']) !!}

                            <div class="row no-gutter justify-content-center align-items-end">
                                <div class="col-md-4  mb-0 p-2">
                                    <label for="">Zoek op trefwoorden</label>
                                    <input name="trefwoorden"  type="text" placeholder="Automonteur, ICT-er, Productie..." class="form-control rounded-pill text-center" style="height: 45px !important;">
                                </div>
                                <div class="col-md-3  mb-0 p-2">
                                    <label for="">Welk vakgebied zoek je?</label>
                                    <select name="vakgebied[]" class="form-control browser-default custom-select rounded-pill text-center" style="text-align-last: center; height: 45px !important;">
                                        <option disabled selected>vakgebied</option>
                                        @foreach(App\Specialty::pluck('naam', 'id') as $k => $v)
                                            <option value="{!! $k !!}">{!! $v !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3  mb-0 p-2 ">
                                    <label class="" for="">In welke regio zoek je?</label>
                                    <select name="regio[]" class="form-control browser-default custom-select rounded-pill text-center" style="text-align-last: center; height: 45px !important;">
                                        <option disabled selected>Regio</option>
                                        @foreach(App\Jobs::pluck('plaats', 'plaats') as $k => $v)
                                            <option value="{!! $k !!}">{!! $v !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2 p-2 align-bottom">
                                    <button type="submit" class="align-bottom btn btn-orange btn-block rounded-pill" style="overflow: hidden;"><i class="fas fa-search left"></i>zoeken</button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    @endcomponent

    <h2 class="h1 orange-text text-center pt-5 ">Wat is jouw specialisatie?</h2>

    <!-- Jumbotron -->
   <div class="container">
       <div class="row py-5">
           @for($i = 1; $i <= 3; $i++)
               <div class="col-md-4">
                   <div class="card m-2 shadow-lg" style="overflow: visible;">
                       @component('site.components.image-editor', ['key' => 'home_specailist_'.$i.'_image'])
                           <img class="card-img-top" style="object-fit: cover; border-radius: .65rem; border-bottom-left-radius: 0px !important;border-bottom-right-radius: 0px !important;overflow: hidden" height="150" src="@include('site.components.image-viewer', ['key' => 'home_specailist_'.$i.'_image']) " alt="">
                       @endcomponent
                       <div class="card-body text-center">
                           @include('site.components.text-editor', ['key' => 'home_specailist_'.$i.'_text', 'mentions' => []])
                       </div>
                   </div>
               </div>
           @endfor
       </div>
   </div>

    <div class="container-fluid my-5 bg-white shadow-lg text">
        <div class="row py-5">
            <div class="col-md-6 p-5">
                @component('site.components.image-editor', ['key' => 'home_image'])
                    <img id="home_image" class=" card card-img-top img-fluid" height="100%" src="@include('site.components.image-viewer', ['key' => 'home_image']) " alt="Card image cap">
                @endcomponent
            </div>
            <div class="col-md-6 p-5">
                @include('site.components.text-editor', ['key' => 'home_text', 'mentions' => []])
            </div>
        </div>
    </div>

    <h2 class="h1 orange-text text-center pt-5 ">Voordelen voor werkgevers</h2>

    <div class="container mb-5">
        @include('site.components.text-editor', ['key' => 'home_usp_text', 'mentions' => []])
    </div>

@endsection

@push('js')

@endpush

@push('css')

@endpush


