<!-- Preloader -->
<div id="preloader">
    <div class="outer">
        <!-- Google Chrome -->
        <div class="infinityChrome">
            <div></div>
            <div></div>
            <div></div>
        </div>

        <!-- Safari and others -->
        <div class="infinity">
            <div>
                <span></span>
            </div>
            <div>
                <span></span>
            </div>
            <div>
                <span></span>
            </div>
        </div>
        <!-- Stuff -->
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="goo-outer">
            <defs>
                <filter id="goo">
                    <feGaussianBlur in="SourceGraphic" stdDeviation="6" result="blur" />
                    <feColorMatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                    <feBlend in="SourceGraphic" in2="goo" />
                </filter>
            </defs>
        </svg>
    </div>
</div>

<!-- mobile header -->
<header class="mobile-header-2">
    <div class="container">
        <!-- menu icon -->
        <div class="menu-icon d-inline-flex mr-4">
            <button>
                <span></span>
            </button>
        </div>
        <!-- logo image -->
        <div class="site-logo">
            <a href="index-2.html">
                <img src="{{asset('frontend/images/mehedi.png')}}" alt="Mehedi" />
            </a>
        </div>
    </div>
</header>

<!-- desktop header -->
<header class="desktop-header-2 d-flex align-items-start flex-column">

    <!-- logo image -->
    <div class="site-logo">
        <a href="index-2.html">
            <img src="{{asset('frontend/images/mehedi.png')}}" alt="Mehedi" />
        </a>
    </div>

    <!-- main menu -->
    <nav>
        <ul class="vertical-menu scrollspy">
            <li class="active"><a href="#home"><i class="icon-home"></i></a></li>
            <li><a href="#about"><i class="icon-user-following"></i></a></li>
            <li><a href="#services"><i class="icon-briefcase"></i></a></li>
            <li><a href="#experience"><i class="icon-graduation"></i></a></li>
            <li><a href="#works"><i class="icon-layers"></i></a></li>
            <li><a href="#blog"><i class="icon-note"></i></a></li>
            <li><a href="#contact"><i class="icon-bubbles"></i></a></li>
        </ul>
    </nav>

{{--    <!-- site footer -->--}}
{{--    <div class="footer">--}}
{{--        <!-- copyright text -->--}}
{{--        <span class="copyright">© 2020 Bolby Template.</span>--}}
{{--    </div>--}}

</header>
