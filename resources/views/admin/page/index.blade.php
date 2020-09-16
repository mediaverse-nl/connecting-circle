@extends('admin.layouts.admin')

@section('content')

    <div class="card">
        <div class="card-body">
            <span class="h3 align-items-center">
               Pagina's
            </span>
            <span class="float-right">
                <a href="{!! route('admin.page.create') !!}" class="btn-success btn">aanmaken</a>
            </span>
        </div>
    </div>

    @component('admin.components.datatable')
        @slot('head')
            <th>id</th>
            <th>slug</th>
            <th>titel</th>
            <th class="no-sort"></th>
        @endslot
        @slot('table')
            @foreach($pages as $page)
                <tr class="">
                    <td>{!! $page->id !!}</td>
                    <td><small>{!! $page->slug !!}</small></td>
                    <td>{!! $page->title !!}</td>
                    <td>
                        @component('admin.components.model', [
                               'id' => 'userTableBtn'.$page->id,
                               'title' => 'wilt u de pagina verwijderen?',
                               'actionRoute' => route('admin.page.destroy', $page->id),
                               'btnClass' => 'rounded-circle delete',
                               'btnIcon' => 'fa fa-trash'
                           ])
                            @slot('description')
                                U gaat pagina <b>"{{$page->slug}}"</b> verwijderen druk op verder
                            @endslot
                        @endcomponent
                        <a href="{{route('admin.page.edit', $page->id)}}" class="rounded-circle edit">
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
