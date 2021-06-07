<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
@include('site.parts.head')
<body>
<div class="ie-panel">
    <a href="http://windows.microsoft.com/en-US/internet-explorer/">
        <img
            src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820"
            alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."
        >
    </a>
</div>
<div class="preloader">
    <div class="preloader-body">
        <div class="cssload-container">
            <div class="cssload-speeding-wheel"></div>
        </div>
        <p>Loading...</p>
    </div>
</div>
<div class="page" id="app">
    @include('site.parts.header')
    @yield('content')
</div>
<footer class="section bg-default section-xs-type-1 footer-minimal">
    <div class="container">
        <div class="row row-30 align-items-lg-center justify-content-lg-between">
            <div class="col-lg-2">
                <div class="footer-brand">
                    <a href="index.html">
                        <img src="images/logo-dark-142x58.png" alt="" width="142" height="58"/>
                    </a>
                </div>
                <div>
                    <ul style="display: flex; flex-direction: row">
                        @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                            <li style="margin: 10px">
                                <a rel="alternate" hreflang="{{ $lang }}" href="{{ LaravelLocalization::getLocalizedURL($lang, null, [], true) }}">
                                    {{ $lang }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="footer-nav">
                    <ul class="rd-navbar-nav">
                        <li class="rd-nav-item {{ Route::currentRouteName() === 'user.index' ? 'active' : ''  }}">
                            <a class="rd-nav-link" href="{{ route('user.index') }}">
                                {{ __('main.home') }}
                            </a>
                        </li>
                        <li class="rd-nav-item {{ Route::currentRouteName() === 'user.pages.about' ? 'active' : ''  }}">
                            <a class="rd-nav-link" href="{{ route('user.pages.about') }}">
                                {{ __('main.about') }}
                            </a>
                        </li>
                        <li class="rd-nav-item">
                            <a class="rd-nav-link" href="{{ route('user.pages.services') }}">
                                {{ __('main.services') }}
                            </a>
                        </li>
                        <li class="rd-nav-item
                            {{ (Route::currentRouteName() === 'user.pages.services'
                                    || Route::currentRouteName() === 'user.woman.show')
                                ? 'active'
                                : ''
                            }}"
                        >
                            <a class="rd-nav-link" href="{{ route('user.woman.index') }}">
                                {{ __('main.gallery') }}
                            </a>
                        </li>
                        <li class="rd-nav-item {{ Route::currentRouteName() === 'user.pages.information' ? 'active' : ''  }}">
                            <a class="rd-nav-link" href="{{ route('user.pages.information') }}">
                                {{ __('main.information') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<section class="bg-gray-100 section-xs text-center">
    <div class="container">
        <p class="rights"><span>&copy;&nbsp; </span><span class="copyright-year"></span><span>&nbsp;</span><span>All Rights Reserved</span><span>.&nbsp;</span>Design&nbsp;by&nbsp;<a class="link-underline" href="https://www.templatemonster.com/">TemplateMonster</a></p>
    </div>
</section>
<!-- Global Mailform Output-->
<div class="snackbars" id="form-output-global"></div>
<script src="{{ mix('js/app.js') }}"></script>
@include('site.parts.footer-scripts')
</body>
</html>
