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
<!-- Global Mailform Output-->
<div class="snackbars" id="form-output-global"></div>
@include('site.parts.footer-scripts')
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
