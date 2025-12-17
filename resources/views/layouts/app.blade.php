<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Materio Dashboard')</title>

  <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
</head>
<body>

<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">

    {{-- SIDEBAR --}}
    @include('layouts.sidebar')

    <div class="layout-page">

      {{-- NAVBAR --}}
      @include('layouts.navbar')

      <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
          @yield('content')
        </div>

        {{-- FOOTER --}}
        @include('layouts.footer')
      </div>

    </div>
  </div>
</div>

<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

@stack('scripts')
</body>
</html>
