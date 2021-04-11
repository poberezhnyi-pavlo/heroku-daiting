<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link">
                <i class="fas fa-chart-line"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.homepage.index')}}" class="nav-link">
                <i class="fas fa-home"></i>
                <p>Homepage</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('pages.index')}}" class="nav-link">
                <i class="far fa-copy"></i>
                <p>Pages</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('gifts.index')}}" class="nav-link">
                <i class="fas fa-gift"></i>
                <p>Woman Gifts</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.woman.index')}}" class="nav-link">
                <i class="fas fa-female"></i>
                <p>Women profiles</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.man.index')}}" class="nav-link">
                <i class="fas fa-male"></i>
                <p>Men profiles</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('users.index')}}" class="nav-link">
                <i class="fas fa-user-friends"></i>
                <p>Admin users</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.settings.index')}}" class="nav-link">
                <i class="fas fa-sliders-h"></i>
                <p>Settings</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link"
               onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();"
            >
                <i class="fas fa-sign-out-alt text-danger"></i>
                <p>Logout</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
