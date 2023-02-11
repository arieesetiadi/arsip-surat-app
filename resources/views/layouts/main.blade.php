<!doctype html>
<html lang="en"
      class="semi-dark">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <!-- Plugins -->
    <link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}"
          rel="stylesheet" />
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}"
          rel="stylesheet" />
    <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}"
          rel="stylesheet" />
    <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}"
          rel="stylesheet" />

    <!-- Bootstrap -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}"
          rel="stylesheet" />
    <link href="{{ asset('assets/css/bootstrap-extended.css') }}"
          rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}"
          rel="stylesheet" />
    <link href="{{ asset('assets/css/icons.css') }}"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap"
          rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Theme Styles -->
    {{-- <link href="{{ asset('assets/css/dark-theme.css') }}"
          rel="stylesheet" /> --}}
    <link href="{{ asset('assets/css/semi-dark.css') }}"
          rel="stylesheet" />

    {{-- Custom style --}}
    <link rel="stylesheet"
          href="{{ asset('assets/css/custom.css') }}">

    <title>{{ $headTitle ?? 'App' }} | BUMDes Sari Amreta Sudha</title>
</head>

<body>
    <div class="wrapper">
        <!-- Topbar-->
        <header class="top-header">
            <nav class="navbar navbar-expand gap-3">
                <div class="mobile-toggle-icon fs-3">
                    <i class="bi bi-list"></i>
                </div>
                <div class="top-navbar-right ms-auto">
                    <ul class="navbar-nav align-items-center">
                        {{-- Navbar | Profile pengguna --}}
                        <li class="nav-item dropdown dropdown-user-setting">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret"
                               href="#"
                               data-bs-toggle="dropdown">
                                <div class="user-setting d-flex align-items-center">
                                    <img src="{{ asset('assets/images/icons/profile.png') }}"
                                         class="user-img"
                                         alt="">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item"
                                       href="{{ route('viewProfile') }}">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/images/icons/profile.png') }}"
                                                 alt=""
                                                 class="rounded-circle"
                                                 width="54"
                                                 height="54">
                                            <div class="ms-3">
                                                <h6 class="mb-0 dropdown-user-name">{{ auth()->user()->name }}</h6>
                                                <small class="mb-0 dropdown-user-designation text-secondary">
                                                    {{ auth()->user()->email }}
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                       href="{{ route('viewProfile') }}">
                                        <div class="d-flex align-items-center">
                                            <div class=""><i class="bi bi-person"></i></div>
                                            <div class="ms-3"><span>Profile</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                       href="{{ route('doLogout') }}">
                                        <div class="d-flex align-items-center">
                                            <div class=""><i class="bi bi-lock"></i></div>
                                            <div class="ms-3"><span>Logout</span></div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- End Topbar-->

        <!--Sidebar -->
        <aside class="sidebar-wrapper"
               data-simplebar="true">
            <div class="sidebar-header">
                <div class="pt-2">
                    <h5>
                        <i class="bi bi-house"></i>
                    </h5>
                </div>
                <div>
                    <h4 class="logo-text">BUMDes</h4>
                </div>
                <div class="toggle-icon ms-auto">
                    <i class="bi bi-list"></i>
                </div>
            </div>

            <ul class="metismenu"
                id="menu">
                {{-- Sidebar | Dashboard --}}
                <li>
                    <a href="{{ route('dashboard') }}">
                        <div class="parent-icon">
                            <i class="bi bi-house"></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>

                <li class="menu-label">Data Master</li>
                {{-- Sidebar | Pengguna --}}
                <li>
                    <a href="#">
                        <div class="parent-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        <div class="menu-title">Pengguna</div>
                    </a>
                </li>
            </ul>
            <!--end navigation-->
        </aside>
        <!-- End Sidebar -->

        <!-- Main Content-->
        <main class="page-content">
            @yield('content')
        </main>
        <!-- End Main Content -->
    </div>

    <!-- Bootstrap bundle JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <!--app-->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/index2.js') }}"></script>
    <script src="{{ asset('assets/js/toggle.password.js') }}"></script>
</body>

</html>
