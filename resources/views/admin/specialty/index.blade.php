@extends('admin.layouts.admin')

@section('content')

    <div class="card">
        <div class="card-body">
            <span class="h3 align-items-center">
               Vakgebieden
            </span>
{{--            <span class="float-right">--}}
{{--                <a href="{!! route('admin.specialty.create') !!}" class="btn-success btn">aanmaken</a>--}}
{{--            </span>--}}
        </div>
    </div>
    <div class="row">

        @foreach($specialties as $specialty)
            <div class="col-md-3">
                @push('css')
                    <style>
                        span#{!! $specialty->naam !!}:before {
                            content: '\{!! $specialty->icon !!}';
                        }
                    </style>
                @endpush
                <div class="card">
                    <div class="card-body">
                        {{Form::open(['route' => ['admin.specialty.destroy', $specialty->id], 'method' => 'DELETE'])}}
                            <span id="{!! $specialty->naam !!}" class="icon"></span>
                            <span>{!! $specialty->naam !!}</span>
                            @component('admin.components.model', [
                               'id' => 'userTableBtn'.$specialty->id,
                               'title' => 'wilt u de vakgebied verwijderen?',
                               'actionRoute' => route('admin.specialty.destroy', $specialty->id),
                               'btnClass' => 'rounded-circle delete',
                               'btnIcon' => 'fas fa-trash-alt'
                            ])
                                @slot('description')
                                    U gaat <b>"{{$specialty->naam}}"</b> verwijderen druk op verder
                                @endslot
                            @endcomponent
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        @endforeach


        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <small class="text-muted mb-2">
                        documentatie
                       <ul>
                           <li>
                               <a class="text-muted" href="https://fontawesome.com/icons?d=gallery&m=free">
                                   bekijk alle icons en selecteer een unicode
                               </a>
                           </li>
                           <li>
                               <a class="text-muted" href="https://fontawesome.com/cheatsheet?from=io">unicode cheatsheet</a>
                           </li>
                       </ul>
                    </small>
                    {{Form::open(['route' => ['admin.specialty.store'], 'method' => 'POST'])}}
                        <span id="preview-icon">
                            <span class="icon"></span>
                        </span>
                        <label for="">nieuwe aanmaken</label>
                        {!! Form::text('icon', null, ['class="form-control mb-2"', 'placeholder="icon (unicode)"', 'id="unicode"']) !!}
                        {!! Form::text('naam', null, ['class="form-control mb-2"', 'placeholder="naam"']) !!}
                         <button class="btn btn-primary btn-block" type="submit">Opslaan</button>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>

{{--    @component('admin.components.datatable')--}}
{{--        @slot('head')--}}
{{--            <th>id</th>--}}
{{--            <th>Bedrijfsnaam</th>--}}
{{--            <th class="no-sort"></th>--}}
{{--        @endslot--}}
{{--        @slot('table')--}}
{{--            @foreach($specialties as $specialty)--}}
{{--                <tr class="">--}}
{{--                    <td>{!! $specialty !!}</td>--}}
{{--                    <td>{!! $specialty->bedrijfsnaam !!}</td>--}}
{{--                    <td>--}}

{{--                        <a href="{{route('admin.jobs.edit', $specialty->id)}}" class="rounded-circle edit">--}}
{{--                            <i class="fa fa-edit"></i>--}}
{{--                        </a>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--        @endslot--}}
{{--    @endcomponent--}}
@endsection

@push('css')
    <style>
         .icon:before, #preview-icon span:before {
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
        }
        .delete a, .delete i{
            text-align: right;
            color: red !important;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $( "#unicode" )
            .keyup(function() {
                var value = $( this ).val();
                console.log('val',value);
                if (value.length == 4 ){
                    console.log('why', );
                    document.getElementById('preview-icon').innerHTML = `<style>#preview-icon span:before{content:'\\` + value +`';}</style><span class="icon"></span>`;
                }else{
                    document.getElementById('preview-icon').innerHTML = `<span class="icon"></span>`;
                }
            })
            .keyup();
    </script>
@endpush
