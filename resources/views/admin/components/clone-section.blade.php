<?php
    $id = randomAlpabetString();
    $name = isset($name) ? $name : '';
    $label = isset($label) ? $label : $name;
    $values = !empty($values) ? $values : [['name' => null]];
    $values = old($name) ?? $values;
?>

<div class="pb-2 card">
    <div id="{!! $id !!}" class="card-body">
        <a href="#" class='b tn btn-suc cess btn-sm  float-right addsection{!! $id !!}'><i class="fas text-success fa-plus"></i></a>
        <h3 class="h5 mb-3">

            {!! ucfirst($label) ?? ucfirst(str_replace('_', ' ', $name)) !!}
        </h3>
        @if(!empty($values))
            @foreach($values as $v)
                <?php
                    $index = $loop->index;
                ?>
                <div class="section">
                    <div class="row no-gutters justify-content-center">
                        <div class="col-11 align-content-center">
                            <div class="row">
                                @foreach($array as $item)
                                    <?php
                                        $type = $item['type'] ?? 'text';
                                        $input = $v[$item['name']] ?? null;
                                    ?>
                                    @if($type == 'select')
                                        <div class="form-group my-1 col-{!! $item['col'] !!}">
                                            {!! Form::select($name.'['.$index.']['.$item['name'].']', array_combine($item['value'], $item['value']), $input, ['id="'.$item['name'].'"', 'placeholder="'.$item['name'].'"', 'class' => 'form-control'.(!$errors->has('vaardigheden') ? '': ' is-invalid ')]) !!}
                                        </div>
                                    @elseif($type == 'textarea')
                                        <div class="form-group my-1 col-{!! $item['col'] !!}">
                                            {!! Form::textarea($name.'['.$index.']['.$item['name'].']', $input, ['rows="3"', 'id="'.$item['name'].'"', 'placeholder="'.$item['name'].'"', 'class' => 'form-control'.(!$errors->has('vaardigheden') ? '': ' is-invalid ')]) !!}
                                        </div>
                                    @else
                                        <div class="form-group my-1 col-{!! $item['col'] !!}">
                                            {!! Form::text($name.'['.$index.']['.$item['name'].']', $input, ['id="'.$item['name'].'"', 'placeholder="'.$item['name'].'"', 'class' => 'form-control'.(!$errors->has('vaardigheden') ? '': ' is-invalid ')]) !!}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group col-1 my-auto">
                            <a  class='float-right remove-{!! $id !!}'><i class="fas fa-trash text-danger"></i></a>
                        </div>
                    </div>
                    <hr class="mt-1 mb-1 border-gray ">
                </div>
            @endforeach
        @else
            <div class="section">
                <div class="row no-gutters justify-content-center">
                    <div class="col-11 align-content-center">
                        <div class="row">
                            @foreach($array as $item)
                                <?php
                                    $type = $item['type'] ?? 'text';
                                    $input = null;
                                ?>
                                @if($type == 'select')
                                    <div class="form-group my-1 col-{!! $item['col'] !!}">
                                        {!! Form::select($name.'[0]['.$item['name'].']', array_combine($item['value'], $item['value']), $input, ['id="'.$item['name'].'"', 'placeholder="'.$item['name'].'"', 'class' => 'form-control'.(!$errors->has('vaardigheden') ? '': ' is-invalid ')]) !!}
                                    </div>
                                @elseif($type == 'textarea')
                                    <div class="form-group my-1 col-{!! $item['col'] !!}">
                                        {!! Form::textarea($name.'[0]['.$item['name'].']', $input, ['rows="3"', 'id="'.$item['name'].'"', 'placeholder="'.$item['name'].'"', 'class' => 'form-control'.(!$errors->has('vaardigheden') ? '': ' is-invalid ')]) !!}
                                    </div>
                                @else
                                    <div class="form-group my-1 col-{!! $item['col'] !!}">
                                        {!! Form::text($name.'[0]['.$item['name'].']', $input, ['id="'.$item['name'].'"', 'placeholder="'.$item['name'].'"', 'class' => 'form-control'.(!$errors->has('vaardigheden') ? '': ' is-invalid ')]) !!}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group col-1 my-auto">
                        <a  class='float-right remove-{!! $id !!}'><i class="fas fa-trash text-danger"></i></a>
                    </div>
                </div>
                <hr class="mt-1 mb-1 border-gray ">
            </div>
        @endif
    </div>
</div>

@push('scripts')
    <script>
        //define template
        var template{!! $id !!} = $('#{!! $id !!} .section:first').clone();
        //define counter
        var sectionsCount = 0;
        //add new section
        $('body').on('click', '.addsection{!! $id !!}', function() {
            sectionsCount = $("#{!! $id !!} .section").length - 1 ;
            sectionsCount++;
            template{!! $id !!}.clone().find(':input').each(function(){
                var newId = this.id + sectionsCount;
                var newName = '{!! $name !!}['+sectionsCount+']['+this.id+']';
                $(this).prev().attr('for', newId);
                this.id = newId;
                this.name = newName
                this.value = null
            })
            .end()
            .appendTo('#{!! $id !!}');
            disableRemoveBtn{!! $id !!}()

            return false;
        });

        //remove section
        $('#{!! $id !!}').on('click', '.remove-{!! $id !!}', function() {
            //fade out section
            $(this).parent().fadeOut(10, function(){
                //remove parent element (main section)
                $(this).parent().parent().remove();
                disableRemoveBtn{!! $id !!}()
                return false;
            });
            return false;
        });
        disableRemoveBtn{!! $id !!}()
        function disableRemoveBtn{!! $id !!}() {
            var sections{!! $id !!} = $("#{!! $id !!} .section").length;
            if(sections{!! $id !!} == 1){
                $('.remove-{!! $id !!}').addClass('d-none')
            }else{
                $('.remove-{!! $id !!}').removeClass('d-none')
            }
        }
    </script>
@endpush
