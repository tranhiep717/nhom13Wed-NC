<!-- Sidebar cố định bên trái -->
<div class="app-sidebar sidebar-shadow fixed-sidebar" style="top: 70px;">
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Menu</li>
                <li class="mm-active">
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2 sidebar-icon"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users.index') }}" class="sidebar-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <i class="bi bi-people-fill sidebar-icon text-primary"></i> User
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.orders.index') }}" class="sidebar-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                        <i class="bi bi-bag-check-fill sidebar-icon text-success"></i> Order
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.products.index') }}" class="sidebar-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                        <i class="bi bi-box-seam-fill sidebar-icon text-warning"></i> Product
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.index') }}" class="sidebar-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                        <i class="bi bi-tags-fill sidebar-icon text-danger"></i> Category
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    .sidebar-link.active, .sidebar-link.active:focus, .sidebar-link.active:hover {
        color: #007bff !important;
        font-weight: bold;
        background: rgba(0,123,255,0.08);
        border-radius: 4px;
    }
    .sidebar-icon {
        font-size: 1.15rem;
        margin-right: 7px;
        vertical-align: -2px;
    }
</style>
