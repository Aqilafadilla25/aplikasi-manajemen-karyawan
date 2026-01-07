<header
    class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme">

    <div class="navbar-nav-right d-flex align-items-center justify-content-end w-100">

        @auth
        <div class="d-flex align-items-center gap-3">

            {{-- AVATAR --}}
            <div class="avatar avatar-online">
                <img
                    src="{{ auth()->user()->photo
        ? asset('storage/' . auth()->user()->photo)
        : asset('assets/img/avatars/1.png') }}"
                    alt="Avatar"
                    class="avatar-img" />

            </div>

            {{-- USER INFO --}}
            <div class="text-end me-2">
                <div class="fw-semibold">{{ auth()->user()->name }}</div>
                <small class="text-muted">{{ auth()->user()->role }}</small>
            </div>

            {{-- LOGOUT BUTTON --}}
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button
                    type="submit"
                    class="btn btn-danger btn-sm d-flex align-items-center">
                    <i class="ri ri-logout-box-r-line me-1"></i>
                    Logout
                </button>
            </form>

        </div>
        @endauth

    </div>
</header>