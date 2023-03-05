<!doctype html>
<html lang="en" class="semi-dark">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    
    {{-- Include styles --}}
    @method('beforeStyles')
    @include('layouts.styles')
    @method('afterStyles')

    {{-- Page title --}}
    <title>{{ $title ?? 'App' }} | BUMDes Sari Amreta Sudha</title>
</head>

<body>
    <div class="wrapper">
        <!-- Topbar-->
        @include('layouts.topbar')

        <!--Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content-->
        <main class="page-content p-5">
            @yield('content')
        </main>
    </div>

    {{-- Includes scripts --}}
    @stack('beforeScripts')
    @include('layouts.scripts')
    @stack('afterScripts')
</body>

</html>
