<!-- Jumbotron -->
<div class="card card-image" style="border-radius:0px !important; background-size: cover; background-position: bottom; background-image: url(@include('site.components.image-viewer', ['key' => $key]));">
    <div class="text-white text-center rgba-stylish-strong py-2 px-2">
        <div class="py-5">
            <h1 class="card-title h2 my-4 py-2">{!! html_entity_decode($title) !!}</h1>
        </div>
    </div>
</div>
