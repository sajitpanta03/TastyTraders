<!-- header section start -->
<header>
    <nav class="navbar">
        <div class="logo">
            <a href="/"><span>TastyTraders.</span></a>
        </div>

        <ul class="menu-items">
            <li><a href="#top">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#products">Products</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>

        <form action="{{route('search')}}">
            <div class="search-box">
                <button type="submit" class="search-icon">
                    <span class="icon-search"></span>
                </button>
                <input type="text" name="search" placeholder="search product">
            </div>
        </form>

        <div class="icon-links">
            <div id="search-btn"><span class="icon-search"></span></div>
            <div id="customer-center"><span class="icon-phone-alt"></span></div>
            <div id="icon-shopping-cart"><span class="icon-cart-arrow-down"><span id="item-counter">0</span></div>
            {{-- Check if the user is authenticated --}}
            @guest
                <a href="{{ route('login') }}">Login</a>&nbsp;|&nbsp;
                <a href="{{ route('register') }}">Register</a>
            @else
                <span>Welcome, {{ Auth::user()->name }}</span>&nbsp;
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                >Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="get" style="display: none;">
                    @csrf
                </form>
            @endguest
            <div id="toggle-bar"><span class="toggler"></span></div>
        </div>
    </nav>
</header>



<!-- header section end -->