<div class="card">
    <div class="card-body">
        <h3 class="h5">Notities</h3>
        @if($model->comments->count() >= 1)
            <div class="row">
                @foreach($model->comments->sortByDesc('created_at') as $comment)
                    <div class="col-md-11 {{$comment->commented->id == auth()->user()->id ? '':' offset-md-1'}}">
                        <div class="card bg-light">
                            <div class="card-body px-3 p-2">
                                {!! $comment->comment !!}<br>
                                <small class="text-muted" >
                                    door <b>{!!  ($comment->commented->name) !!} </b> op
                                    <b style="font-size: 11px;">{!!  ($comment->created_at->format('d-m-Y - H:i')) !!}</b>
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            Geen notities gevonden
        @endif
        <hr>
        <div class="form-group">
            {!! Form::label('notities', 'Notitie') !!}
            {!! Form::textarea('notities', null, ['rows="3"', 'class' => 'form-control'.(!$errors->has('notities') ? '': ' is-invalid ')]) !!}
            @include('components.error', ['field' => 'notities'])
        </div>

    </div>
</div>
