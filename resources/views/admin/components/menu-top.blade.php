<ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link active">
            Hallo, {{auth()->user()->name}}
        </a>

    </li>
    <li class="nav-item">
        <a href="{{ route('site.home') }}"
           class="nav-link "
           onclick="">
            <i class="fa fa-fw fa-home"></i>
            Terug
        </a>
    </li>
    <li class="nav-item">

        <a href="{{ route('logout') }}"
           class="nav-link"
           onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
            <i class="fa fa-fw fa-sign-out"></i>
            Uitloggen
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
</ul>
