<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Address Management</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="{{ asset('public/backend/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('public/backend/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/backend/dist/css/skins/_all-skins.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('public/backend/plugins/datatables/dataTables.bootstrap.css')}}">
    
    <!--Toaster alert-->
    <link rel="stylesheet" type="text/css" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css')}}">
    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('public/backend/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
    @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
      @include('backend.inc.header')
      @include('backend.inc.sidebar')
    @endguest
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        @yield('content')

      </div><!-- /.content-wrapper -->
      @include('backend.inc.footer')

      
    </div><!-- ./wrapper -->

    
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script type="text/javascript">
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset('public/backend/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    
    <script src="{{ asset('public/backend/dist/js/app.min.js')}}" type="text/javascript"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js" integrity="sha512-6Uv+497AWTmj/6V14BsQioPrm3kgwmK9HYIyWP+vClykX52b0zrDGP7lajZoIY1nNlX4oQuh7zsGjmF7D0VZYA==" crossorigin="anonymous"></script>
    <script src="{{asset('public/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <!-- DataTable Start-->
    <script type="text/javascript">
      $(function () {
        
        $('#example1').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
        });
      });
    </script>
    <!-- End DataTable-->
    <!--   toastr code are here -->
    <script type="text/javascript" src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js')}}"></script>
    <script>
    @if(Session::has('message'))
       
        var type = "{{ Session::get('alert-type', 'info') }}";

        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
        
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    
    @endif
    </script>
    <!--Sweat Alert code are here! --> 
    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
   
    <script type="text/javascript">
      $(document).on("click", "#delete", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            window.location.href = link;
        } else {
          swal("Your file is safe!");
        }
      });
    });
    </script>
  </body>
</html>
