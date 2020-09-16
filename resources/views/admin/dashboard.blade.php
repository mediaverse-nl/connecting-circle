@extends('admin.layouts.admin')

@section('content')
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-images"></i>
                    </div>
                    <div class="mr-5">Afbeeldingen</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{!! route('admin.file-manager.index') !!}">
                    <span class="float-left">Bekijk</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-file-contract"></i>
                    </div>
                    <div class="mr-5">Pagina's (<small>{!! \App\Page::count() !!}</small>)</div>
                    <small></small>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{!! route('admin.page.index') !!}">
                    <span class="float-left">Bekijk</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-id-card"></i>
                    </div>
                    <div class="mr-5">Vacatures (<small>{!! \App\Jobs::count() !!}</small>)</div>
                    <small></small>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{!! route('admin.jobs.index') !!}">
                    <span class="float-left">Bekijk</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-images"></i>
                    </div>
                    <div class="mr-5">Bedrijven (<small>{!! \App\Employer::count() !!}</small>)</div>
                    <small></small>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{!! route('admin.employer.index') !!}">
                    <span class="float-left">Bekijk</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
    </div>
@endsection

@push('css')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

<!-- Custom styles for this template-->
<link href="/css/admin/sb-admin.css" rel="stylesheet">
    <style>
        .bg-white{
            background-color: #4a2bff !important;
        }
        .bg-warning-orange{
            background-color: #ff8e1b !important;
        }
    </style>
@endpush

@push('scripts')
@endpush
