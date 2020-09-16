<!-- Default form register -->
<div class="border border-orange p-3 mt-4 mb-4">
    <p class="h3 mb-2">Menu</p>
    <?php
        $pages = new \App\Page();

        $items = $pages->where('in_menu', '=', 1)
            ->where('titel', '!=', null)
            ->orderBy('titel', 'asc')
            ->get();
    ?>
    <ul class="list-group list-group-flush">
        @foreach($items as $link)
            <li class="list-group-item {{$link->slug == $pages->getSlugPage() ? "rgba-orange-strong text-white" : null}}">
                <a href="{{$link->slug}}" style="color: inherit !important;">
                    <i class="fas fa-fw fa-angle-right m-auto" style="font-size: 12px;"></i> {{$link->titel}}
                </a>
            </li>
        @endforeach
    </ul>
</div>
