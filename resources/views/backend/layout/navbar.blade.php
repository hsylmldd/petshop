<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">

        <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="ti-menu"></i>
            </a>
            <a class="navbar-brand fw-bold d-flex align-items-center" href="/dashboard">
                <i class="fa-solid fa-paw" style="color: #FFD43B;"></i>
                <span class="ms-2">Kitten</span>
            </a>
            <a class="mobile-options">
                <i class="ti-more"></i>
            </a>
        </div>

        <div class="navbar-container container-fluid">
            <ul class="nav-left">
                <li>
                    <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a>
                    </div>
                </li>

                <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()">
                        <i class="ti-fullscreen"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav-right">

                <li class="user-profile header-notification">
                    <a href="#!">
                        <img src="{{ asset('template/assets/images/avatar-4.jpg') }}" class="img-radius" alt="User-Profile-Image">
                        <span>{{ Auth::user()->name }}</span>
                        <i class="ti-angle-down"></i>
                    </a>
                    <ul class="show-notification profile-notification">

                        {{-- <li>
                            <a href="#">
                                <i class="ti-user"></i> Profile
                            </a>
                        </li> --}}
                        <li>
                            <a href="/logout">
                                <i class="ti-layout-sidebar-left"></i> Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
