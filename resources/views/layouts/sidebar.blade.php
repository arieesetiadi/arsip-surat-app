<aside class="sidebar-wrapper" data-simplebar="true">
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

    <ul class="metismenu" id="menu">
        {{-- Sidebar | Dashboard --}}
        <li>
            <a href="{{ route('dashboard') }}">
                <div class="parent-icon">
                    <i class="bi bi-house"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        @if (isAdmin())
            <li class="menu-label">Data Master</li>

            {{-- Sidebar | Kelola Pengguna --}}
            <li>
                <a href="{{ route('pengguna.index') }}">
                    <div class="parent-icon">
                        <i class="bi bi-person"></i>
                    </div>
                    <div class="menu-title">Pengguna</div>
                </a>
            </li>

            <li class="menu-label">Persuratan</li>
            
            {{-- Sidebar | Surat Masuk --}}
            <li>
                <a href="{{ route('surat-masuk.index') }}">
                    <div class="parent-icon">
                        <i class="bi bi-arrow-down-circle"></i>
                    </div>
                    <div class="menu-title">Surat Masuk</div>
                </a>
            </li>
            
            {{-- Sidebar | Surat Keluar --}}
            <li>
                <a href="{{ route('surat-keluar.index') }}">
                    <div class="parent-icon">
                        <i class="bi bi-arrow-up-circle"></i>
                    </div>
                    <div class="menu-title">Surat Keluar</div>
                </a>
            </li>
        @endif
    </ul>
    <!--end navigation-->
</aside>
