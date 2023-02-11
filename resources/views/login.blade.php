<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
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
    <link rel="stylesheet"
          href="{{ asset('assets/css/custom.css') }}">

    <title>Login | Sistem Informasi Pengarsipan Surat</title>
</head>

<body class="bg-shape">
    <!--start wrapper-->
    <div class="wrapper">
        <!--start content-->
        <main class="authentication-content">
            <div class="container-fluid">
                <div class="authentication-card">
                    <div class="card shadow rounded-lg overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6 d-flex align-items-center justify-content-center">
                                <img src="{{ asset('assets/images/logos/bumdes.png') }}"
                                     class="img-fluid"
                                     alt="Login image"
                                     width="300px">
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body p-4 p-sm-5">
                                    <h4 class="card-title">Login</h4>
                                    {{-- Tampilkan jika ada alert --}}
                                    @if (session('alert'))
                                        <p class="card-text mt-4">
                                            <span class="text-danger">
                                                <i class="bi bi-exclamation-circle"></i>
                                                {{ session('alert') }}
                                            </span>
                                        </p>
                                    @endif

                                    <form action="{{ route('authenticate') }}"
                                          method="POST"
                                          class="form-body">
                                        @csrf
                                        <div class="login-separater text-center mb-4"> <span>Login</span>
                                            <hr>
                                        </div>

                                        <div class="row g-3">
                                            {{-- Input username --}}
                                            <div class="col-12">
                                                <label for="username"
                                                       class="form-label">Username</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                         class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-person-fill"></i>
                                                    </div>
                                                    <input name="username"
                                                           type="text"
                                                           class="form-control ps-5"
                                                           id="username"
                                                           placeholder="Masukan username"
                                                           autocomplete="off"
                                                           required>
                                                </div>
                                            </div>

                                            {{-- Input password --}}
                                            <div class="col-12">
                                                <div class="w-100 d-flex justify-content-between">
                                                    <label for="password"
                                                           class="form-label">Password</label>
                                                    <div class="form-check form-switch">
                                                        <input name="togglePassword"
                                                               class="form-check-input"
                                                               type="checkbox"
                                                               tabindex="-1"
                                                               id="togglePassword">
                                                        <label class="form-check-label user-select-none"
                                                               for="togglePassword">Show</label>
                                                    </div>
                                                </div>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                         class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-lock-fill"></i>
                                                    </div>
                                                    <input name="password"
                                                           type="password"
                                                           class="form-control ps-5"
                                                           id="password"
                                                           placeholder="Masukan password"
                                                           autocomplete="off"
                                                           required>
                                                </div>
                                            </div>

                                            {{-- Check remember me --}}
                                            <div class="col-6">
                                                <div class="form-check form-switch">
                                                    <input name="rememberMe"
                                                           class="form-check-input"
                                                           type="checkbox"
                                                           id="rememberMe">
                                                    <label class="form-check-label user-select-none"
                                                           for="rememberMe">Remember Me</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit"
                                                            class="btn btn-primary">Login</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!--end wrapper-->

    <!--plugins-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/toggle.password.js') }}"></script>
</body>

</html>
