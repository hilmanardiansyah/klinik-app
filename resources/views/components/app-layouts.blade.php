<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name') .' - '. $title ?? config('app.name') }}</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
  <link rel="icon" href="{{ asset('/assets/logo/logo-rental.png') }}" type="image/png">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

  @stack('styles')
</head>

<body>
    @auth
    <x-navbar />
    @if(auth()->user()->hasRole('admin'))
    <x-admin.sidebar />
    @elseif(auth()->user()->hasRole('kasir'))
        <x-kasir.sidebar />
    @elseif(auth()->user()->hasRole('dokter'))
        <x-dokter.sidebar />
    @elseif(auth()->user()->hasRole('petugas_pendaftaran'))
        <x-pendaftaran.sidebar />
    @endif
  @endauth
  <div class="main-content">
    <section class="section">
      <div class="section-body">
        {{ $slot }}
      </div>
    </section>
  </div>
     <script>
    feather.replace();
    </script>
  <!-- Page Specific JS File -->
  @stack('scripts')
  <!-- General JS Scripts -->
  <script src="{{ asset('assets/js/app.min.js') }}"></script>
  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <!-- Custom JS File -->
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  <script src="https://unpkg.com/feather-icons"></script>

  @stack('lastScripts')
</body>

</html>
