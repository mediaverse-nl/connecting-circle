@extends('admin.layouts.admin')

@section('content')
    {{Form::open(['route' => ['admin.page.store'], 'method' => 'POST', 'files' => true])}}
    <div class="row align-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <span class="h3 align-items-center">
                        Pagina aanmaken
                    </span>
                    <span class="float-right">
                        @component('admin.components.model', [
                               'id' => 'editPage',
                               'title' => 'Pagina aanmaken',
                               'actionRoute' => route('admin.page.store'),
                               'btnClass' => 'btn btn-warning',
                               'btnIcon' => null,
                               'btnTitle' => 'opslaan',
                           ])
                            @slot('description')
                                wilt u de wijzigen opslaan? druk dan op <b>verder</b>
                            @endslot
                        @endcomponent
                    </span>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('slug', null) !!}
                {!! Form::text('slug', null, ['class' => 'form-control'.(!$errors->has('slug') ? '': ' is-invalid ')]) !!}
                @include('components.error', ['field' => 'slug'])
            </div>
            <div class="form-group">
                {!! Form::label('titel', null) !!}
                {!! Form::text('titel', null, ['class' => 'form-control'.(!$errors->has('titel') ? '': ' is-invalid ')]) !!}
                @include('components.error', ['field' => 'titel'])
            </div>
            <div class="form-group">
                {!! Form::label('meta_titel', null) !!}
                {!! Form::text('meta_titel', null, ['class' => 'form-control'.(!$errors->has('meta_titel') ? '': ' is-invalid ')]) !!}
                @include('components.error', ['field' => 'meta_titel'])
            </div>
            <div class="form-group">
                {!! Form::label('meta_beschrijving', null) !!}
                {!! Form::textarea('meta_beschrijving', null, ['rows="3"', 'class' => 'form-control'.(!$errors->has('meta_beschrijving') ? '': ' is-invalid ')]) !!}
                @include('components.error', ['field' => 'meta_beschrijving'])
            </div>
            <div class="form-group">
                {!! Form::label('meta_titel_twitter', null) !!}
                {!! Form::text('meta_titel_twitter', null, ['class' => 'form-control'.(!$errors->has('meta_titel_twitter') ? '': ' is-invalid ')]) !!}
                @include('components.error', ['field' => 'meta_titel_twitter'])
            </div>
            <div class="form-group">
                {!! Form::label('meta_beschrijving_twitter', null) !!}
                {!! Form::textarea('meta_beschrijving_twitter', null, ['rows="3"', 'class' => 'form-control'.(!$errors->has('meta_beschrijving_twitter') ? '': ' is-invalid ')]) !!}
                @include('components.error', ['field' => 'meta_beschrijving_twitter'])
            </div>
            <div class="form-group">
                {!! Form::label('meta_image_twitter', null) !!}
                {!! Form::text('meta_image_twitter', null, ['class' => 'form-control'.(!$errors->has('meta_image_twitter') ? '': ' is-invalid ')]) !!}
                @include('components.error', ['field' => 'meta_image_twitter'])
            </div>
            <div class="form-group">
                {!! Form::label('meta_image_twitter', null) !!}
                <div class="input-group">
                    <div class="custom-file">
                        {!! Form::file('meta_image_twitter', ['class' => 'custom-file-input', 'accept="image/png, image/jpeg"']) !!}
                        {!! Form::label('meta_image_twitter', 'kies bestand', ['class' => 'custom-file-label', 'style="padding: .375rem .75rem;"']) !!}
                    </div>
                </div>
                @include('components.error', ['field' => 'meta_image_twitter'])
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('meta_titel_open_graph', null) !!}
                {!! Form::text('meta_titel_open_graph', null, ['class' => 'form-control'.(!$errors->has('meta_titel_open_graph') ? '': ' is-invalid ')]) !!}
                @include('components.error', ['field' => 'meta_titel_open_graph'])
            </div>
            <div class="form-group">
                {!! Form::label('meta_beschrijving_open_graph', null) !!}
                {!! Form::textarea('meta_beschrijving_open_graph', null, ['rows="3"', 'class' => 'form-control'.(!$errors->has('meta_beschrijving_open_graph') ? '': ' is-invalid ')]) !!}
                @include('components.error', ['field' => 'meta_beschrijving_open_graph'])
            </div>
            <div class="form-group">
                {!! Form::label('meta_image_open_graph', null) !!}
                <div class="input-group">
                    <div class="custom-file">
                        {!! Form::file('meta_image_open_graph', ['class' => 'custom-file-input', 'accept="image/png, image/jpeg"']) !!}
                        {!! Form::label('meta_image_open_graph', 'kies bestand', ['class' => 'custom-file-label', 'style="padding: .375rem .75rem;"']) !!}
                    </div>
                </div>
                @include('components.error', ['field' => 'meta_image_open_graph'])
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox pt-2">
                    {!! Form::checkbox('in_menu', 'koppelen aan menu', null, ['id' => 'in_menu', 'class' => 'custom-control-input']) !!}
                    {!! Form::label('in_menu', null, ['class' => 'custom-control-label']) !!}
                </div>
                <div class="custom-control custom-checkbox">
                    {!! Form::checkbox('in_sitemap', 'in_sitemap', null, ['id' => 'in_sitemap', 'class' => 'custom-control-input']) !!}
                    {!! Form::label('in_sitemap', null, ['class' => 'custom-control-label']) !!}
                </div>
                <div class="custom-control custom-checkbox">
                    {!! Form::checkbox('noindex', 'noindex', null, ['id' => 'noindex', 'class' => 'custom-control-input']) !!}
                    {!! Form::label('noindex', null, ['class' => 'custom-control-label']) !!}
                </div>
                <div class="custom-control custom-checkbox">
                    {!! Form::checkbox('nofollow', 'nofollow', null, ['id' => 'nofollow', 'class' => 'custom-control-input']) !!}
                    {!! Form::label('nofollow', null, ['class' => 'custom-control-label']) !!}
                </div>
            </div>
        </div>
    </div>

    {{Form::close()}}
@endsection

@push('css')
@endpush

@push('scripts')
@endpush
