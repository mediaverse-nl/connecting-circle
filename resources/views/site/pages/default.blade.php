@extends('site.layouts.app')

@section('title', 'Page Title')

@section('content')
    @parent
    @component('site.components.image-editor', ['key' => $page->id.'_page_banner'])
        @include('site.components.banner', ['title' => $page->titel, 'key' => $page->id.'_page_banner'])
    @endcomponent
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <!-- Default form register -->
                @include('site.components.menu')
            </div>
            <div class="col-md-9 p-3 mb-4">
                @include('site.components.text-editor', ['key' => 'page_text_'.$page->id, 'mentions' => []])
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush

@push('css')

@endpush


