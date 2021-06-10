<!DOCTYPE html>
  <html lang="en">
  <head>
    <!-- Header -->
    @include('layouts.partials._head')
  </head>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('layouts.partials._navbar')
        @include('layouts.partials._sidebar')
      

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper px-3">
        <div class="container-fluid">
        @include('flash::message')
        @yield('content')
        </div>
            
      </div>
      
      <!-- Main Footer -->
      @include('layouts.partials._footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    @include('layouts.partials._footer-script')

  </body>
</html>
