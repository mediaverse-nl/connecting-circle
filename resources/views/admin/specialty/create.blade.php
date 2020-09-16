@extends('admin.layouts.admin')

@section('content')
    {{Form::open(['route' => ['admin.page.store'], 'method' => 'POST', 'files' => true])}}
    <div class="row align-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <span class="h3 align-items-center">
                        Vacature aanmaken
                    </span>
                    <span class="float-right">
                        @component('admin.components.model', [
                               'id' => 'editPage',
                               'title' => 'Vacature aanmaken',
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
        </div>
    </div>

    {{Form::close()}}
@endsection

@push('css')
@endpush

@push('scripts')
@endpush
