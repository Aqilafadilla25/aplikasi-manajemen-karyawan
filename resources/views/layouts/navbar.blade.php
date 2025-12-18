<!-- Navbar -->
<nav
    class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">

    {{-- TOGGLE SIDEBAR (MOBILE) --}}
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
            <i class="icon-base ri ri-menu-line icon-md"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">

        {{-- SEARCH (OPSIONAL) --}}
        <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
                <i class="icon-base ri ri-search-line icon-lg lh-0"></i>
                <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..." />
            </div>
        </div>

        <ul class="navbar-nav flex-row align-items-center ms-md-auto">

            {{-- USER DROPDOWN --}}
            @auth
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a
                    class="nav-link dropdown-toggle hide-arrow p-0"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img
                            src="{{ asset('assets/img/avatars/1.png') }}"
                            alt="avatar"
                            class="rounded-circle" />
                    </div>
                </a>

                <ul class="dropdown-menu dropdown-menu-end">

                    {{-- USER INFO --}}
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img
                                            src="{{ asset('assets/img/avatars/1.png') }}"
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                                    <small class="text-body-secondary">
                                        {{ auth()->user()->role }}
                                    </small>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li>
                        <div class="dropdown-divider my-1"></div>
                    </li>

                    {{-- PROFILE --}}
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="icon-base ri ri-user-line icon-md me-3"></i>
                            <span>My Profile</span>
                        </a>
                    </li>

                    {{-- SETTINGS --}}
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="icon-base ri ri-settings-4-line icon-md me-3"></i>
                            <span>Settings</span>
                        </a>
                    </li>

                    <li>
                        <div class="dropdown-divider my-1"></div>
                    </li>

                    {{-- LOGOUT --}}
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="d-grid px-4 pt-2 pb-1">
                            @csrf
                            <button type="submit" class="btn btn-danger d-flex justify-content-center">
                                <small class="align-middle">Logout</small>
                                <i class="ri ri-logout-box-r-line ms-2 ri-xs"></i>
                            </button>
                        </form>
                    </li>

                </ul>
            </li>
            @endauth

        </ul>
    </div>
</nav>
<!-- / Navbar -->