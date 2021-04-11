<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{config('app.url')}}" class="brand-link">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img
                    @if(Str::startsWith(Auth::user()->avatar, 'http'))
                        src="{{Auth::user()->avatar}}"
                    @else
                        src="{{ asset('storage/' . Auth::user()->avatar) }}"
                    @endif
                     class="img-fluid img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('users.show', Auth::user()->getKey())}}" class="text-capitalize d-block">
                    {{ Auth::user()->name }}
                </a>
            </div>
        </div>

        {{--    ADMIN MENU    --}}
        @include('admin.parts.menu')
    </div>
    <!-- /.sidebar -->
</aside>
