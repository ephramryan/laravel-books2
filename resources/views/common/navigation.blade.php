

<nav>
    <ul>
        <li>
            <a href="{{route('home')}}" class="{{ $current_page == 'home' ? 'highlighted' : '' }}">Home</a>
        </li>
        <li>
            <a href="{{route('about')}}" class="{{ $current_page == 'about-us' ? 'highlighted' : '' }}">About us</a>
        </li>
    </ul>
</nav>

