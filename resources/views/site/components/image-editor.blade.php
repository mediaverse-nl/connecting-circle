@if(auth()->check())
    <?php
        $key = isset($key) ? $key : 'default';
        $id = Str::random(6);
    ?>

    {{$slot}}

    <form id="{{$id}}" action="/api/image-editor-{{$key}}" method="POST"  enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="input-group p-3" style="margin-top: -70px !important;">
            <div class="input-group-prepend">
                <button type="submit" class="input-group-text btn-primary" id="inputGroupFileAddon01{{$id}}">
                    <i class="fas fa-upload"></i>
                </button>
             </div>
            <div class="custom-file">
                <input type="file" name="image" accept="image/png, image/jpeg" class="custom-file-input" id="customFileLangHTML{{$id}}">
                <label class="custom-file-label" for="customFileLangHTML{{$id}}" data-browse="Zoeken">
                    <small>Voeg je afbeelding toe (max 1mb)</small>
                </label>
            </div>
        </div>
        <div class="px-3 pt-1">
            @include('components.error', ['field' => 'image'])
        </div>
    </form>
@else
    {{$slot}}
@endif
