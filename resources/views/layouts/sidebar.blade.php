@php
    use Illuminate\Support\Facades\Auth;
@endphp

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    {{-- LOGO --}}
    <div class="app-brand px-3 py-3 text-center">
        <a href="{{ route('dashboard') }}">
            <img 
                src="{{ asset('assets/img/logo/logo_Nasywa.png') }}" 
                alt="Logo"
                style="height:200px; max-width:100%; object-fit:contain; display:block; margin:auto;">
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-2">

        {{-- ================= BERANDA ================= --}}
        <li class="menu-header small text-uppercase text-muted">
            <span class="menu-header-text">Beranda</span>
        </li>

        <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon ri-home-4-line"></i>
                <div>Dashboard</div>
            </a>
        </li>

        {{-- ================= DATA UTAMA (SEMUA ROLE) ================= --}}
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

        {{-- ================= ADMIN ONLY ================= --}}
        @if(Auth::check() && Auth::user()->role === 'admin')
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

    </ul>
</aside>
