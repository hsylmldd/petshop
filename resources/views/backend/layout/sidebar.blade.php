<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-40 img-radius" src="{{ asset('template/assets/images/avatar-4.jpg') }}"
                    alt="User-Profile-Image">
                <div class="user-details">
                    <span>{{ Auth::user()->name }}</span>
                    <span id="more-details">Admin<i class="ti-angle-down"></i></span>
                </div>
            </div>

            <div class="main-menu-content">
                <ul>
                    <li class="more-details">

                        <a href="/logout"><i
                                class="ti-layout-sidebar-left"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        {{-- <div class="pcoded-search">
            <span class="searchbar-toggle"> </span>
            <div class="pcoded-search-box ">
                <input type="text" placeholder="Search">
                <span class="search-icon"><i class="ti-search" aria-hidden="true"></i></span>
            </div>
        </div> --}}
        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Layout</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="active">
                <a href="/dashboard">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Manage</div>
        <ul class="pcoded-item pcoded-left-item">
            <li>
                <a href="/dashboard/user">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">User</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="/dashboard/transaksi">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Transaksi</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="/dashboard/blog">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Blog</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="/dashboard/collection">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Collection</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="/dashboard/produk">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Produk</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

        </ul>

    </div>
</nav>
