<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    {{-- LOGO --}}
    <div class="app-brand px-3 py-3 text-center">
        <a href="{{ route('dashboard') }}">
            <img
                src="{{ asset('assets/img/logo/logo_Nasywa.png') }}"
                alt="Logo"
                style="height:180px; max-width:100%; object-fit:contain;">
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-2">

        {{-- ===================== --}}
        {{-- DASHBOARD (ALL ROLE) --}}
        {{-- ===================== --}}
        <li class="menu-header small text-uppercase text-muted">
            <span class="menu-header-text">Beranda</span>
        </li>

        <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon ri-home-4-line"></i>
                <div>Dashboard</div>
            </a>
        </li>

        {{-- ===================== --}}
        {{-- SELAIN GUEST --}}
        {{-- ===================== --}}
        @if(auth()->user()->role !== 'guest')

            {{-- DATA UTAMA --}}
            <li class="menu-header small text-uppercase text-muted mt-2">
                <span class="menu-header-text">Data Utama</span>
            </li>

            <li class="menu-item {{ request()->routeIs('employees.*') ? 'active' : '' }}">
                <a href="{{ route('employees.index') }}" class="menu-link">
                    <i class="menu-icon ri-team-line"></i>
                    <div>Data Karyawan</div>
                </a>
            </li>

            <li class="menu-item {{ request()->routeIs('divisions.*') ? 'active' : '' }}">
                <a href="{{ route('divisions.index') }}" class="menu-link">
                    <i class="menu-icon ri-building-line"></i>
                    <div>Divisi</div>
                </a>
            </li>

            <li class="menu-item {{ request()->routeIs('jabatans.*') ? 'active' : '' }}">
                <a href="{{ route('jabatans.index') }}" class="menu-link">
                    <i class="menu-icon ri-briefcase-line"></i>
                    <div>Jabatan</div>
                </a>
            </li>

            {{-- ABSENSI --}}
            <li class="menu-header small text-uppercase text-muted mt-2">
                <span class="menu-header-text">Absensi</span>
            </li>

            {{-- STAFF --}}
            @if(auth()->user()->role === 'staff')
                <li class="menu-item {{ request()->routeIs('absensi.*') ? 'active' : '' }}">
                    <a href="{{ route('absensi.index') }}" class="menu-link">
                        <i class="menu-icon ri-fingerprint-line"></i>
                        <div>Input Absensi</div>
                    </a>
                </li>
            @endif

            {{-- ADMIN --}}
            @if(auth()->user()->role === 'admin')
                <li class="menu-item {{ request()->routeIs('absensi.*') ? 'active' : '' }}">
                    <a href="{{ route('absensi.admin') }}" class="menu-link">
                        <i class="menu-icon ri-calendar-check-line"></i>
                        <div>Absensi Karyawan</div>
                    </a>
                </li>
            @endif

            {{-- ADMINISTRATOR --}}
            @if(auth()->user()->role === 'admin')
                <li class="menu-header small text-uppercase text-muted mt-2">
                    <span class="menu-header-text">Administrator</span>
                </li>

                <li class="menu-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}" class="menu-link">
                        <i class="menu-icon ri-user-settings-line"></i>
                        <div>Manajemen User</div>
                    </a>
                </li>
            @endif

        @endif {{-- END NON-GUEST --}}

    </ul>
</aside>
