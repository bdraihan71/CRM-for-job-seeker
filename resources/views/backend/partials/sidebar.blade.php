<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('stage.index') }}"
                        class="nav-link {{ request()->routeIs('stage.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-flag"></i>
                        <p>Stage</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('application*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('application*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-mail-bulk"></i>
                        <p>Application<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('application.index')}}" class="nav-link {{ request()->routeIs('application.index') ? 'active' : '' }}">
                                <i class="nav-icon far fas fa-list"></i>
                                <p>Application List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('application.create')}}" class="nav-link {{ request()->routeIs('application.create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-plus-square"></i>
                                <p>Create Application</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ request()->routeIs('communication*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('communication*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tty"></i>
                        <p>Communication Log<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('communication.index')}}" class="nav-link {{ request()->routeIs('communication.index') ? 'active' : '' }}">
                                <i class="nav-icon far fas fa-list"></i>
                                <p>Log List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('communication.create')}}" class="nav-link {{ request()->routeIs('communication.create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-plus-square"></i>
                                <p>Create Log</p>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Simple Link
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>

    </div>

</aside>
