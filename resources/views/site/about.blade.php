@extends('site.layouts.app')

@section('title', 'Page Title')

@section('content')
    @parent
    @component('site.components.image-editor', ['key' => 'about_banner'])
        @include('site.components.banner', ['title' => $page->titel ?? null, 'key' => 'about_banner'])
    @endcomponent
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('site.components.menu')
            </div>
            <div class="col-md-9 p-3 mb-4">
                @include('site.components.text-editor', ['key' => 'about_text', 'mentions' => []])
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush

@push('css')

@endpush


