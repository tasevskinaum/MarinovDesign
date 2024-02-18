<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('dashboard/partials/_head')
</head>

<body>
    <div id="app">
        <div class="wrapper">
            <aside id="sidebar" class="js-sidebar">
                <!-- Content For Sidebar -->
                <div class="h-100">
                    <div class="sidebar-logo">
                        <a href="{{ route('dashboard') }}">{{ config('app.name', 'Marinov Design') }}</a>
                    </div>
                    <ul class="sidebar-nav">
                        <li class="sidebar-header">
                            Admin Elements
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('dashboard') }}" class="sidebar-link">
                                <i class="fa-solid fa-list pe-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-solid fa-gear pe-2"></i>
                                Product management
                            </a>
                            <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                                <li class="sidebar-item">
                                    <a href="{{ route('products.index') }}" class="sidebar-link">Product</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('categories.index') }}" class="sidebar-link">Categories</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('types.index') }}" class="sidebar-link">Types</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('materials.index') }}" class="sidebar-link">Materials</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('maintenances.index') }}" class="sidebar-link">Maintenance tips</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-target="#pages1" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-solid fa-cart-shopping pe-2"></i>
                                Orders
                            </a>
                            <ul id="pages1" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                                <li class="sidebar-item">
                                    <a href="{{ route('custom.orders.index') }}" class="sidebar-link">Custom orders</a>
                                </li>
                            </ul>
                        </li>
                        @if(auth()->user()->role->name == 'super_admin')
                        <li class="sidebar-item">
                            <a href="{{ route('admins.index') }}" class="sidebar-link">
                                <i class="fa-solid fa-users pe-2"></i>
                                Admins
                            </a>
                        </li>
                        @endif
                        <li class="sidebar-item">
                            <a href="{{ route('faqs.index') }}" class="sidebar-link">
                                <i class="fa-solid fa-question pe-2"></i>
                                FAQs
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>

            <div class="main">
                <nav class="navbar navbar-expand px-3 border-bottom">
                    <button class="btn" id="sidebar-toggle" type="button">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse navbar">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                    <img src="https://ik.imagekit.io/lztd93pns/MarinovDesign/marinov_logo.png?updatedAt=1708125696818" class="avatar img-fluid rounded" alt="">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="content px-3 py-2">
                    @yield('content')
                </main>
                <a href="#" class="theme-toggle">
                    <i class="fa-regular fa-moon"></i>
                    <i class="fa-regular fa-sun"></i>
                </a>
            </div>
        </div>
    </div>

    @include('dashboard/partials/_script')
    @yield('script')
</body>

</html>