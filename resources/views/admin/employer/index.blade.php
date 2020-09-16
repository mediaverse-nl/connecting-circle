@extends('admin.layouts.admin')

@section('content')

    <div class="card">
        <div class="card-body">
            <span class="h3 align-items-center">
               Bedrijven
            </span>
            <span class="float-right">
{{--                <a href="{!! route('admin.page.create') !!}" class="btn-success btn">aanmaken</a>--}}
            </span>
        </div>
    </div>

    @component('admin.components.datatable')
        @slot('head')
            <th>id</th>
            <th>Bedrijfsnaam</th>
            <th>Vacatures</th>
            <th class="no-sort"></th>
        @endslot
        @slot('table')
            @foreach($employers as $employer)
                <tr class="">
                    <td>{!! $employer->id !!}</td>
                    <td>{!! $employer->bedrijfsnaam !!}</td>
                    <td>{!! $employer->jobs->count() !!}</td>
                    <td>
                        @component('admin.components.model', [
                           'id' => 'userTableBtn'.$employer->id,
                           'title' => 'wilt u dit bedrijf verwijderen?',
                           'actionRoute' => route('admin.employer.destroy', $employer->id),
                           'btnClass' => 'rounded-circle delete',
                           'btnIcon' => 'fa fa-trash'
                        ])
                            @slot('description')
                                U gaat <b>"{!! $employer->bedrijfsnaam !!}"</b> verwijderen druk op verder
                            @endslot
                        @endcomponent
                        <a href="{{route('admin.employer.edit', $employer->id)}}" class="rounded-circle edit">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        @endslot
    @endcomponent
@endsection

@push('css')
@endpush

@push('scripts')
@endpush
