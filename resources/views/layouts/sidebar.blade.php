<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ asset('AdminLTE-3.1.0') }}/index3.html" class="brand-link">
        <img src="{{ asset('AdminLTE-3.1.0') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">RESTAURANT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('AdminLTE-3.1.0') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">

                <a href="#" class="d-block">{{ Auth::user()->name }}</a>

            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <x-responsive-nav-link :href="route('dashboard')"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Dashboard</p>
                    </x-responsive-nav-link>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ request()->is('product*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa fa-user-circle" aria-hidden="true"></i>
                        <p>Users</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ route('daftarDrinks') }}"
                        class="nav-link {{ request()->routeIs('daftarDrinks') ? 'active' : '' }}">
                        <i class="nav-icon fas fa fa-coffee" aria-hidden="true"></i>
                        <p>Drink</p>
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="{{ route('daftarFoods') }}"
                        class="nav-link {{ request()->routeIs('daftarFoods') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>Foods</p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('product-admin') }}"
                        class="nav-link {{ request()->routeIs('product-admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa fa-coffee" aria-hidden="true"></i>
                        <p>Product</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('order-list') }}" class="nav-link {{ request()->routeIs('order-list') ? 'active' : '' }}">
                        <i class="nav-icon fas fa fa-cart-arrow-down" aria-hidden="true"></i>
                        <p>Orders</p>
                    </a>
                </li>
                <li class="nav-item">

                    <a href="{{ route('tblTransaction') }}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>

                        <p>Transaction</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa fa-comments" aria-hidden="true"></i>
                        <p>review</p>
                    </a>
                </li>
            
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
