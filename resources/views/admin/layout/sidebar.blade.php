<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime Cuts Admin</title>

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Sidebar & Dashboard Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>

    {{-- Sidebar Component / Markup --}}
    <aside class="sidebar" id="appSidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <img src="{{ asset('images/primecutlogo.jpg') }}" alt="Prime Cut Logo" class="sidebar-logo-img">
                <span>Prime Cuts</span>
            </div>
            <button class="sidebar-close-btn" id="sidebarCloseBtn">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <div class="sidebar-menu-container">
            <ul class="sidebar-menu">
                <li class="sidebar-menu-header">Main Menu</li>
                
                <li class="sidebar-item">
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-chart-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('admin.home.index') }}" class="sidebar-link {{ request()->routeIs('admin.home*') ? 'active' : '' }}">
                        <i class="fa-solid fa-globe"></i>
                        <span>Homepage</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('admin.features.index') }}" class="sidebar-link {{ request()->routeIs('admin.features*') ? 'active' : '' }}">
                        <i class="fa-solid fa-bars-staggered"></i>
                        <span>Feature Bar</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('admin.products.index') }}" class="sidebar-link {{ request()->routeIs('admin.products*') ? 'active' : '' }}">
                        <i class="fa-solid fa-box-open"></i>
                        <span>Products</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('admin.categories.index') }}" class="sidebar-link {{ request()->routeIs('admin.categories*') ? 'active' : '' }}">
                        <i class="fa-solid fa-tags"></i>
                        <span>Categories</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('admin.about.index') }}" class="sidebar-link {{ request()->routeIs('admin.about*') ? 'active' : '' }}">
                        <i class="fa-solid fa-circle-info"></i>
                        <span>About Section</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('admin.advantages.index') }}" class="sidebar-link {{ request()->routeIs('admin.advantages*') ? 'active' : '' }}">
                        <i class="fa-solid fa-star"></i>
                        <span>Why Choose Us</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('admin.solutions.index') }}" class="sidebar-link {{ request()->routeIs('admin.solutions*') ? 'active' : '' }}">
                        <i class="fa-solid fa-briefcase"></i>
                        <span>Business Solutions</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('admin.quality.index') }}" class="sidebar-link {{ request()->routeIs('admin.quality*') ? 'active' : '' }}">
                        <i class="fa-solid fa-shield-halved"></i>
                        <span>Quality Process</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('admin.settings.index') }}" class="sidebar-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                        <i class="fa-solid fa-gear"></i>
                        <span>Contact Information</span>
                    </a>
                </li>

                <!-- Added User Management Link -->
                <li class="sidebar-item">
                    <a href="{{ route('admin.users.index') }}" class="sidebar-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                        <i class="fa-solid fa-users"></i>
                        <span>User Management</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                        @csrf
                        <button type="submit" class="sidebar-link" style="width: 100%; background: none; border: none; text-align: left; cursor: pointer; color: inherit; font: inherit;">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </aside>

</body>
</html>