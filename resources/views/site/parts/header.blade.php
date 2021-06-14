<header class="section page-header">
    <!-- RD Navbar-->
    <div class="rd-navbar-wrap">
        <nav class="rd-navbar rd-navbar-classic rd-navbar-classic-minimal" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-main-outer">
                <div class="rd-navbar-main">
                    <!-- RD Navbar Panel-->
                    <div class="rd-navbar-panel">
                        <!-- RD Navbar Toggle-->
                        <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                        <!-- RD Navbar Brand-->
                        <div class="rd-navbar-brand">
                            <!--Brand--><a class="brand" href="index.html"><img class="brand-logo-dark" src="images/logo-default-392x116.png" alt="" width="196" height="58"/><img class="brand-logo-light" src="images/logo-default-392x116.png" alt="" width="196" height="58"/></a>
                        </div>
                    </div>
                    <div class="rd-navbar-main-element">
                        <div class="rd-navbar-nav-wrap">
                            <!-- RD Navbar Nav-->
                            <ul class="rd-navbar-nav">
                                <li
                                    class="rd-nav-item {{ Route::currentRouteName() === 'user.index' ? 'active' : ''  }}"
                                >
                                    <a
                                        class="rd-nav-link"
                                        href="{{ route('user.index') }}"
                                    >
                                        {{ __('main.home') }}
                                    </a>
                                </li>
                                <li
                                    class="rd-nav-item {{ Route::currentRouteName() === 'user.pages.about' ? 'active' : ''  }}"
                                >
                                    <a
                                        class="rd-nav-link"
                                        href="{{ route('user.pages.about') }}"
                                    >
                                        {{ __('main.about') }}
                                    </a>
                                </li>
                                <li
                                    class="rd-nav-item {{ Route::currentRouteName() === 'user.pages.services' ? 'active' : ''  }}"
                                >
                                    <a
                                        class="rd-nav-link"
                                        href="{{ route('user.pages.services') }}"
                                    >
                                        {{ __('main.services') }}
                                    </a>
                                </li>
                                <li
                                    class="rd-nav-item
                                        {{ (Route::currentRouteName() === 'user.woman.index'
                                                || Route::currentRouteName() === 'user.woman.show')
                                            ? 'active'
                                            : ''
                                        }}"
                                >
                                    <a
                                        class="rd-nav-link"
                                        href="{{ route('user.woman.index') }}"
                                    >
                                        {{ __('main.gallery') }}
                                    </a>
                                </li>
                                <li
                                    class="rd-nav-item {{ Route::currentRouteName() === 'user.pages.information' ? 'active' : ''  }}"
                                >
                                    <a
                                        class="rd-nav-link"
                                        href="{{ route('user.pages.information') }}"
                                    >
                                        {{ __('main.information') }}
                                    </a>
                                </li>
                                @auth
                                    <li class="rd-nav-item dropdown">
                                        <a
                                            class="nav-link dropdown-toggle rd-nav-link"
{{--                                            data-toggle="dropdown"--}}
{{--                                            aria-haspopup="true"--}}
{{--                                            aria-expanded="false"--}}
                                            href="{{ route('user.profile.show', \Illuminate\Support\Facades\Auth::id()) }}"
                                        >
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu">
                                            <a
                                                class="dropdown-item"
                                                href="{{ route('user.profile.logout') }}"
                                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                            >
                                                {{ __('Logout') }}
                                            </a>

                                            <form
                                                id="logout-form" action="{{ route('user.profile.logout') }}"
                                                method="POST"
                                                style="display: none;"
                                            >
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endauth
                                @guest
                                    <li
                                        class="rd-nav-item {{ Route::currentRouteName() === 'user.profile.showLoginFrom' ? 'active' : ''  }}"
                                    >
                                        <a
                                            class="rd-nav-link"
                                            href="{{ route('user.profile.showLoginFrom') }}"
                                        >
                                            {{ __('main.information') }}
                                        </a>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
