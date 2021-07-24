<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  {{-- style --}}
  @stack('prependd-style')
    @include('includes.style')
  @stack('addonn-style')
 
  {{-- style --}}
 
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


    {{-- header --}}

    
    @include('includes.header')
    
    @include('includes.aside')

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <section class="content">

    @yield('konten')


    </section>

  </div>
{{-- footer --}}
@include('includes.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

{{-- script --}}

     @stack('prependd-script')
    @include('includes.script')
    @stack('addonn-script')

</body>
</html>
