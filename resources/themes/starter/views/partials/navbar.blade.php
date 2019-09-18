<nav id="nav-menu-container">
    <ul class="nav-menu">
        @foreach($menu as $page)
        <li><a href="{{ route('frontend.page', $page['slug']) }}">{{ $page['title'] }}</a></li>
        @endforeach
    </ul>
</nav><!-- #nav-menu-container -->