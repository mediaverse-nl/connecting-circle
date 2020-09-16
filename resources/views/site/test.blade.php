@extends('site.layouts.app')

@section('title', 'Page Title')

@section('content')
    @parent
    @include('site.components.banner', ['title' => 'Vacatures (title <small>h1</small>)', 'img' => ''])

    @include('site.components.text-editor', ['key' => 'test_editor', 'mentions' => []])

    asdasd
@endsection

@push('js')

@endpush

@push('css')

@endpush


