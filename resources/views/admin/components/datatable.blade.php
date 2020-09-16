<?php
    $randomStr = Str::random(6);
?>

<div class="card">
    @if(!empty($title))
        <div class="card-header">
            {!! ucfirst($title) !!}
        </div>
    @endif
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover" id="dataTable-{{$randomStr}}" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        {!! $head !!}
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        {!! $head !!}
                    </tr>
                </tfoot>
                <tbody>
                    {!! $table !!}
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .edit{
        background: var(--warning);
    }
    .delete{
        background: var(--danger);
    }
    .default{
        background: var(--light);
    }
    .no-sort{
        width: 150px !important;
        min-width: 50px !important;
    }
    .rounded-circle {
        margin-right: 5px;
        float: right;
        display:inline-block;
        height: 30px;
        width: 30px;
        border-radius: 50%;
        text-align: center;
        vertical-align: middle;
        line-height: 30px;
    }
    .rounded-circle i{
       color: white;
    }
</style>

@push('scripts')
    <script>
        $(document).ready(function() {
            if ($("#dataTable-{{$randomStr}}").length ) {
                $('#dataTable-{{$randomStr}}').DataTable({
                    "columnDefs": [ {
                        "targets": 'no-sort',
                        "orderable": false
                    }],
                    'order': [ 1, 'desc' ]
                });
            }
        });
    </script>
@endpush
