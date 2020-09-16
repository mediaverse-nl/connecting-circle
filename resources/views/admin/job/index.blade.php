@extends('admin.layouts.admin')

@section('content')

    <div class="card">
        <div class="card-body">
            <span class="h3 align-items-center">
               Vacatures
            </span>
            <span class="float-right">
                <a href="{!! route('admin.jobs.create') !!}" class="btn-success btn">aanmaken</a>
            </span>
        </div>
    </div>

    @component('admin.components.datatable')
        @slot('head')
            <th>id</th>
            <th>Plaats</th>
            <th>Bedrijfsnaam</th>
            <th>Vakgebied</th>
            <th class="no-sort"></th>
        @endslot
        @slot('table')
            @foreach($jobs as $job)
                <tr class="">
{{--                    <td>{!! $job !!}</td>--}}
                    <td>{!! $job->id !!}</td>
                    <td>{!! $job->plaats !!}</td>
                    <td>{!! isset($job->bedrijfsnaam) ? $job->bedrijfsnaam : '-- niet bekend --' !!}</td>
                    <td>{!! isset($job->specialty) ? $job->specialty->naam : '-- niet bekend --'!!}</td>
                    <td>
                        @component('admin.components.model', [
                           'id' => 'userTableBtn'.$job->id,
                           'title' => 'wilt u deze vacature verwijderen?',
                           'actionRoute' => route('admin.jobs.destroy', $job->id),
                           'btnClass' => 'rounded-circle delete',
                           'btnIcon' => 'fa fa-trash'
                        ])
                            @slot('description')
                                U gaat vacature <b>#{!! $job->id !!}</b> van bedrijf <b>"{{$job->employer->bedrijfsnaam}}"</b> verwijderen druk op verder
                            @endslot
                        @endcomponent

                        <a href="{{route('admin.jobs.edit', $job->id)}}" class="rounded-circle edit">
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
