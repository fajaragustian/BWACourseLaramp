<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('welcome') }}">
        <div class="ml-3">
            <img src="{{ asset('assets/images/favicon.png') }}" alt="" srcset="">
        </div>
        <div class="sidebar-brand-text mr-3"><img src="{{ asset('assets/images/logo2.png') }}" alt="" srcset=""
                width="150"><sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Permissions</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                @can('list-user')
                <a class="collapse-item" href="{{ route('users.index') }}"> <i class="fas fa-fw fa-users"></i>
                    Users</a>
                @endcan
                @can('list-role')
                <a class="collapse-item" href="{{ route('roles.index') }}"><i class="fas fa-fw fa-chart-area"></i>
                    Roles</a>
                @endcan
            </div>
        </div>
    </li>
    @can('list-product')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('products.index') }}">
            <i class="fas fa-fw fa-solid  fa-home"></i>
            <span>Manage Product</span></a>
    </li>
    @endcan
    @can('list-discount')
    <!-- Nav Item -  -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('discounts.index') }}">
            <i class="fas fa-fw fa-solid  fa-file"></i>
            <span>Management Discounts</span></a>
    </li>
    @endcan
    @can('list-transaction')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('transaction.index') }}">
            <i class="fas fa-fw fa-solid  fa-dollar-sign"></i>
            <span>Manage Transaction</span></a>
    </li>
    @endcan
    @can('list-camp')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('camps.index') }}">
            <i class="fas fa-fw fa-solid  fa-dollar-sign"></i>
            <span>Manage Camp</span></a>
    </li>
    @endcan

    @role('User')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('transaction.index') }}">
            <i class="fas fa-fw fa-solid  fa-dollar-sign"></i>
            <span>Transaction</span></a>
    </li>
    @endrole
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="{{ asset('template/auth/img/undraw_rocket.svg') }}" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components,
            and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to
            Pro!</a>
    </div>

</ul>
<!-- End of Sidebar -->