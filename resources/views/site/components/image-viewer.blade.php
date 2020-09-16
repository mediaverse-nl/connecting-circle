<?php
    $key = isset($key) ? $key : 'default';
    $model = new App\Image();
    $image = $model->where('key_name', $key)->exists()
        ? $model->where('key_name', $key)->first()->path
        : 'default.png';
?>

{{url($image)}}
