@php
    $currentRouteName = Route::currentRouteName();
@endphp

<nav id="sidebar" class="col-md-1">
    <div class="position-sticky">
        <!-- Sidebar Logo -->
        <div class="text-center my-4 mb-5">
            <img src="{{ asset('images/logo.png') }}" id="sidebar-logo" alt="Logo" width="100" class="rounded">
        </div>
        <!-- Sidebar Items -->
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="bi bi-egg-fried"></i>
                    <span>Menu</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('items.index') }}">
                    <i class="bi bi-box"></i>
                    <span>Item</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profit') }}">
                    <i class="bi bi-cash-coin"></i>
                    <span>Profit</span>
                </a>
            </li>
            <li class="nav-item mb-5">
                <a class="nav-link" href="{{ route('transaksi') }}">
                    <i class="bi bi-clock-history"></i>
                    <span>Transaksi</span>
                </a>
            </li>
            <li class="nav-item mt-5">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li> 
        </ul>
    </div>
</nav>
