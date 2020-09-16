<!-- Button trigger modal -->
<div data-toggle="modal" data-target="#{!! $id !!}" data-placement="top" style="display: inline-block;" class="{!! $btnClass !!}">
    <a class="" data-toggle="tooltip" data-placement="top" title="{!! '' or '' !!}" style="color: #FFFFFF;">
        <i class="{!! !empty($btnIcon) ? $btnIcon : '' !!}" style="color: #FFFFFF;" ></i>
        @if(!empty($btnTitle))
             {!! $btnTitle !!}
        @endif
    </a>
 </div>

<!-- Modal -->
<div class="modal fade" id="{!! $id !!}" tabindex="-1" role="dialog" aria-labelledby="{!! $id !!}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{!! $id !!}Label">{!! $title !!}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
             <div class="modal-body">
                {!! !empty($description) ? $description : ''!!}
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" style="border-radius: 0px;" data-dismiss="modal">sluiten</button>

                @if(str_contains($title, 'verwijderen') || str_contains($title, 'herstellen'))
                    {!! Form::open(['url' => $actionRoute, 'method' => 'delete']) !!}
                        {!! Form::submit('verder', ['class' => 'btn btn-primary', 'style' => "border-radius: 0px;"]) !!}
                    {!! Form::close() !!}
                @elseif(str_contains($title, 'wijzigen'))
                    {!! Form::submit('verder', ['class' => 'btn btn-primary', 'style' => "border-radius: 0px;"]) !!}
                @elseif(str_contains($title, 'aanmaken'))
                    {!! Form::submit('verder', ['class' => 'btn btn-primary', 'style' => "border-radius: 0px;"]) !!}
                @else
                    <a class="btn btn-primary" href="{{$actionRoute}}" style="border-radius: 0px;">verder</a>
                @endif
            </div>
        </div>
    </div>
</div>
