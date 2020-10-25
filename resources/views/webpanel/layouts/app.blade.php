<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="#" type="image/ico" />

    <title>Dashboard - @yield('title')</title>

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="{{ asset('dashboard/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('dashboard/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('dashboard/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('dashboard/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('dashboard/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('dashboard/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('dashboard/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('dashboard/build/css/custom.min.css') }}" rel="stylesheet">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- bootstrap-datetimepicker -->
    <link href="{{ asset('dashboard/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{route('webpanel')}}" class="site_title"><span><center>Dashboard SI-TA</center></span></a>
            </div>
            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div style="text-align: center; padding-right: 2px;">
              STMIK Tidore Mandiri
            </div>
            <div style="text-align: center; padding-right: 20px;">
              <img src="{{ asset('dashboard/images/img.jpg') }}" style="width: 50px;" alt="..." class="img-circle profile_img">
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li>
                    <a href="{{route('webpanel')}}"><i class="fa fa-home"></i> Beranda </a>
                  </li>
                  
                  
                  <!-- user status condition -->
                  @if(Auth::guard('mahasiswa')->check())
                      <li>
                        <a href="{{url('profil')}}"><i class="fa fa-edit"></i> Profil Saya </a>
                      </li>
                      <li>
                        <a href="{{url('bimbingan-mahasiswa')}}"><i class="fa fa-edit"></i> Bimbingan TA </a>
                      </li>
                  @elseif(Auth::guard('dosen')->check())
                      <li>
                        <a href="{{url('profil')}}"><i class="fa fa-edit"></i> Profil Saya </a>
                      </li>
                      <li>
                        <a href="{{url('bimbingan-dosen')}}"><i class="fa fa-edit"></i> Bimbingan TA </a>
                      </li>
                  @else
                      <li><a><i class="fa fa-gear"></i> Pengaturan <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="{{route('users')}}">Administrator</a></li>
                        </ul>
                      </li>
                      <li>
                        <a href="{{route('dosen')}}"><i class="fa fa-edit"></i> Data Dosen </a>
                      </li>
                      <li>
                        <a href="{{route('mahasiswa')}}"><i class="fa fa-edit"></i> Data Mahasiswa </a>
                      </li>
                      <li>
                        <a href="{{route('bimbingan')}}"><i class="fa fa-edit"></i> Bimbingan TA </a>
                      </li>
                      <li>
                        <a href="{{route('informasi')}}"><i class="fa fa-edit"></i> Informasi </a>
                      </li>
                  @endif
                </ul>
              </div>
              <div class="menu_section">
                <h3>Lainnya</h3>
                <ul class="nav side-menu">
                  <li><a href="{{route('logout')}}" onClick="return confirm('Apakah anda yakin?')"><i class="fa fa-sign-out"></i> Logout</a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <!-- <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" href="{{route('users')}}" title="Pengaturan">
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div> -->
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile " aria-haspopup="true aria-expanded="false">
                    <img src="{{ asset('dashboard/images/img.jpg') }}" alt="">
                    @if(Auth::guard('mahasiswa')->check())
                        NPM: <strong>{{Auth::guard('mahasiswa')->user()->npm}}</strong> - {{Auth::guard('mahasiswa')->user()->nama_lengkap}}
                    @elseif(Auth::guard('dosen')->check())
                        NIP: <strong>{{Auth::guard('dosen')->user()->nip}}</strong> - {{Auth::guard('dosen')->user()->nama_lengkap}}
                    @else
                        {{auth()->user()->name}}
                    @endif
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Version 0.0.1
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('dashboard/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('dashboard/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('dashboard/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('dashboard/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('dashboard/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('dashboard/vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('dashboard/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('dashboard/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('dashboard/vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('dashboard/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('dashboard/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('dashboard/vendors/DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('dashboard/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('dashboard/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('dashboard/build/js/custom.min.js') }}"></script>

    <!-- Select2 -->
    <script src="{{asset('dashboard/plugins/select2/js/select2.full.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('dashboard/plugins/select2/js/select2.full.min.js')}}"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="{{asset('dashboard/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    @yield('scripts')
  </body>
</html>
