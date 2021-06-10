<!DOCTYPE html>
  <html lang="en">
  <head>
    <!-- Header -->
    @include('layouts.partials._head')
  </head>
  <body class="login-page" style="min-height: 512.8px;">
        <div class="login-box">
            @yield('content')
        </div>
        @include('layouts.partials._footer-script')
    </body>
</html>
