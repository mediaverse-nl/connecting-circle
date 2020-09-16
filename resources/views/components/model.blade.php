<?php
    $randomStr = \Illuminate\Support\Str::random(8);
?>

<!-- Modal -->
<div class="modal fade in" id="{{$randomStr}}" tabindex="-1" role="dialog" aria-labelledby="{{$randomStr}}" aria-hidden="true">
    <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title orange-text" id="{{$randomStr}}">{{$cardTitle ?? ''}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{$slot}}
            </div>
        </div>
    </div>
</div>

@if(session()->has('successModel'))
    @push('js')
        <script>
            $('#{{$randomStr}}').modal('show');
        </script>
    @endpush
@endif
