<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    {{-- LOGO --}}
    <div class="app-brand px-3 py-3 text-center">
        <a href="{{ route('dashboard') }}">
            <img
                src="{{ asset('assets/img/logo/logo_Nasywa.png') }}"
                alt="Logo"
                style="height:150px; max-width:100%; object-fit:contain;">
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    {{-- PASTIKAN USER LOGIN --}}
    @auth
    <ul class="menu-inner py-2">

        {{-- ===================== --}}
        {{-- BERANDA --}}
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
        {{-- STAFF --}}
        {{-- ===================== --}}
        @if(auth()->user()->role === 'staff')

        <li class="menu-header small text-uppercase text-muted mt-2">
            <span class="menu-header-text">Absensi</span>
        </li>

        <li class="menu-item {{ request()->routeIs('absensi.*') ? 'active' : '' }}">
            <a href="{{ route('absensi.index') }}" class="menu-link">
                <i class="menu-icon ri-fingerprint-line"></i>
                <div>Absensi</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase text-muted mt-2">
            <span class="menu-header-text">Operasional</span>
        </li>

        <li class="menu-item {{ request()->routeIs('leaves.staff') ? 'active' : '' }}">
            <a href="{{ route('leaves.staff') }}" class="menu-link">
                <i class="menu-icon ri-calendar-event-line"></i>
                <div>Pengajuan Cuti</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('salaries.my') ? 'active' : '' }}">
            <a href="{{ route('salaries.my') }}" class="menu-link">
                <i class="menu-icon ri-money-dollar-circle-line"></i>
                <div>Slip Gaji</div>
            </a>
        </li>

        

        @endif

        {{-- ===================== --}}
        {{-- ADMIN --}}
        {{-- ===================== --}}
        @if(auth()->user()->role === 'admin')

        <li class="menu-header small text-uppercase text-muted mt-2">
            <span class="menu-header-text">Absensi</span>
        </li>

        <li class="menu-item {{ request()->routeIs('absensi.admin') ? 'active' : '' }}">
            <a href="{{ route('absensi.admin') }}" class="menu-link">
                <i class="menu-icon ri-calendar-check-line"></i>
                <div>Absensi Karyawan</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase text-muted mt-2">
            <span class="menu-header-text">Master Data</span>
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

        <li class="menu-header small text-uppercase text-muted mt-2">
            <span class="menu-header-text">Administrasi</span>
        </li>

        <li class="menu-item {{ request()->routeIs('jobs.*') ? 'active' : '' }}">
            <a href="{{ route('jobs.index') }}" class="menu-link">
                <i class="menu-icon ri-briefcase-line"></i>
                <div>Lowongan Pekerjaan</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('salaries.*') ? 'active' : '' }}">
            <a href="{{ route('salaries.index') }}" class="menu-link">
                <i class="menu-icon ri-money-dollar-circle-line"></i>
                <div>Gaji Karyawan</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('leaves.admin') ? 'active' : '' }}">
            <a href="{{ route('leaves.admin') }}" class="menu-link d-flex align-items-center justify-content-between">

                {{-- KIRI: ICON + TEXT --}}
                <div class="d-flex align-items-center">
                    <i class="menu-icon ri-calendar-todo-line"></i>
                    <span>Persetujuan Cuti</span>
                </div>

                {{-- KANAN: BADGE --}}
                @if(isset($pendingLeavesCount) && $pendingLeavesCount > 0)
                <span class="badge bg-danger rounded-pill">
                    {{ $pendingLeavesCount }}
                </span>
                @endif

            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
            <a href="{{ route('users.index') }}" class="menu-link">
                <i class="menu-icon ri-user-settings-line"></i>
                <div>Manajemen User</div>
            </a>
        </li>

        @endif

        {{-- ===================== --}}
        {{-- AKUN --}}
        {{-- ===================== --}}
        <li class="menu-header small text-uppercase text-muted mt-2">
            <span class="menu-header-text">Akun</span>
        </li>

        <li class="menu-item {{ request()->routeIs('profile.*') ? 'active' : '' }}">
            <a href="{{ route('profile.index') }}" class="menu-link">
                <i class="menu-icon ri-user-line"></i>
                <div>Profile Saya</div>
            </a>
        </li>


    </ul>
    @endauth

</aside>