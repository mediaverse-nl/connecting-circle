@extends('admin.layouts.admin')

@section('content')

    <div class="card">
        <div class="card-body">
            <span class="h3 align-items-center">
               Kandidaten
            </span>
            <span class="float-right">
{{--                <a href="{!! route('admin.page.create') !!}" class="btn-success btn">aanmaken</a>--}}
            </span>
        </div>
    </div>

    @component('admin.components.datatable')
        @slot('head')
            <th>id</th>
            <th>Naam</th>
            <th>voorgedragen</th>
            <th>status</th>
            <th class="no-sort"></th>
        @endslot
        @slot('table')
            @foreach($candidates as $candidate)
                <tr class="">
                    <td>{!! $candidate->id !!}</td>
                    <td>{!! $candidate->voornaam !!} {!! $candidate->achternaam !!}</td>
                    <td></td>
                    <td></td>
                    <td>
                        @component('admin.components.model', [
                           'id' => 'userTableBtn'.$candidate->id,
                           'title' => 'wilt u deze candidaat verwijderen?',
                           'actionRoute' => route('admin.candidate.destroy', $candidate->id),
                           'btnClass' => 'rounded-circle delete',
                           'btnIcon' => 'fa fa-trash'
                        ])
                            @slot('description')
                                U gaat <b>"{!! $candidate->voornaam !!} {!! $candidate->achternaam !!}"</b> verwijderen druk op verder
                            @endslot
                        @endcomponent
                        <a href="{{route('admin.candidate.edit', $candidate->id)}}" class="rounded-circle edit">
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
