<?php
    $jobs = $vacatures;
    $vakgebieden = $vacaturesBase->pluck('specialty_id', 'specialty.naam')->toArray();
    $regios = $vacaturesBase->pluck('plaats', 'plaats')->toArray();
?>

@extends('site.layouts.app')

@section('title', 'Page Title')

@section('content')
    @parent
    @component('site.components.image-editor', ['key' => 'jobs_banner'])
        @include('site.components.banner', ['title' => $page->titel ?? null, 'key' => 'jobs_banner'])
    @endcomponent

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <!-- Default form register -->
                {!! Form::open(['route' => ['site.jobs.index'], 'method' => 'get', 'id' => 'filterForm', 'class' => 'order border-orange p-3 mt-4 mb-4']) !!}

                    <p class="text-left h4 mb-4">Filter</p>

                    <span class="h6 orange-text">Zoek op trefwoorden</span>
                    <input type="text" name="trefwoorden" value="{{!empty($filter['trefwoorden']) ? $filter['trefwoorden'] : ''}}" class="form-control mb-4" placeholder="Automonteur, ICT-er, Productie...">

                    <hr>
                    <span class="h6 orange-text">Vakgebied</span>
                    @if(empty($vakgebieden))
                        <br>
                        <small>geen vakgebieden gevonden</small>
                    @endif
                    @foreach($vakgebieden as $value => $vakgebied)
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="vakgebied{!! $vakgebied !!}" name="vakgebied[]" value="{!! $vakgebied !!}"
                                {!! !empty($filter['vakgebied']) ? (in_array($vakgebied, $filter['vakgebied']) ? 'checked' : '') : '' !!}>
                            <label class="custom-control-label" for="vakgebied{!! $vakgebied !!}">{!! ucfirst($value) !!}</label>
                        </div>
                    @endforeach
                    <hr>
                    <span class="h6 orange-text">Regio's</span>
                    @if(empty($regios))
                        <br>
                       <small> geen regios gevonden</small>
                    @endif
{{--                {!! dd($regios) !!}--}}
                    @foreach($regios as $regio)
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="regio{!! $regio !!}" name="regio[]" value="{!! $regio !!}"
                                {!! !empty($filter['regio']) ? (in_array($regio, $filter['regio']) ? 'checked' : '') : '' !!}>
                            <label class="custom-control-label" for="regio{!! $regio !!}">{!! ucfirst($regio) !!}</label>
                        </div>
                    @endforeach

                    <!-- Sign up button -->
                    <button class="btn btn-orange mb-0 mt-4  btn-block" type="submit">zoeken</button>

                {!! Form::close() !!}
                <!-- Default form register -->
            </div>
            <div class="col-md-9">
                <p class="mt-4 mb-1">Er zijn <strong>{!! count($jobs) !!}</strong> resultaten gevonden</p>
                @foreach($jobs as $job)
                    <div class="card w-100 p-1 mt-4 mb-4">
                        <div class="card-body">
                            @push('css')
                                <style>
                                    span#{!! $job->specialty->naam !!}:before {
                                        content: '\{!! $job->specialty->icon !!}';
                                    }
                                </style>
                            @endpush

                            <h5 class="orange-text">
                                <span id="{!! $job->specialty->naam !!}" class="icon"></span>
                                {!! ucfirst($job->specialty->naam) !!}
                            </h5>
                            <h3 class="card-title pt-2"><strong>{!! ucfirst($job->titel) !!}</strong></h3>

                            <p class="text-black-50">
                                <span class="text-black-50 pt-2">
                                    <i class="fas fa-sm fa-map-marker-alt" style="font-size: 15px;vertical-align: middle;"></i>
                                    <strong>{!! ucfirst($job->plaats) !!}</strong>
                                </span>

                                <i class="fas fa-circle p-1" style="font-size: 5px;vertical-align: middle;"></i>

                                <span class="card-title pt-2 pb-4"><strong>{!! $job->salaris !!}</strong></span>
{{--                                <i class="fas fa-circle p-1" style="font-size: 5px;vertical-align: middle;"></i>--}}
{{--                                <span class="card-title pt-2 pb-4"><strong>€2.300 - €4.000 per maand</strong></span>--}}
                            </p>

                            <p class="text-black-50">{!! $job->korte_beschrijving !!}</p>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-orange" data-toggle="modal" data-target="#basicExampleModal{!! $job->id !!}">
                                lees meer
                            </button>

                            <!-- Modal -->
                            <div id="basicExampleModal{!! $job->id !!}" class="modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">

                                <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h5 class="orange-text">
                                                <span id="{!! $job->specialty->naam !!}" class="icon"></span>
                                                {!! ucfirst($job->specialty->naam) !!}
                                            </h5>
                                            <small class="text-muted">ref. #{!! $job->id !!} </small>
                                            <h3 class="card-title pt-1"><strong>{!! $job->titel !!}</strong></h3>

                                            <p class="text-black-50">
                                                <span class="text-black-50 pt-2">
                                                    <i class="fas fa-sm fa-map-marker-alt" style="font-size: 15px;vertical-align: middle;"></i>
                                                    <strong>{!! ucfirst($job->plaats) !!}</strong>
                                                </span>

                                                <i class="fas fa-circle p-1" style="font-size: 5px;vertical-align: middle;"></i>

                                                <span class="card-title pt-2 pb-4"><strong>{!! $job->salaris !!}</strong></span>
                                            </p>

                                            <p class="text-black-50">{!! $job->vacature !!}</p>

                                            <a href="{!! route('site.candidates.index') !!}" class="btn btn-orange"><strong>Interesse? </strong> upload je CV</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection

@push('js')

@endpush

@push('css')
    <style>
        .icon:before, #preview-icon span:before {
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
        }
    </style>
@endpush


