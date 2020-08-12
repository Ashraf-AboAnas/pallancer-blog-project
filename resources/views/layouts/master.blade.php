<!--

=========================================================
* Now UI Dashboard - v1.5.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-dashboard
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Now UI Dashboard by Creative Tim
  </title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
<link href="{{ asset('assets/css/now-ui-dashboard.css?v=1.5.0')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
<link href="{{asset('assets/demo/demo.css') }}" rel="stylesheet" />

<link href="{{asset('assets/css/dataTables.min.css') }}" rel="stylesheet" />
@yield('stylesheets')
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" >
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          CT
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Creative Tim
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">




          <li class="{{'dashboard' == request()->path()?'active':' '}} ">
            <a href="{{route('admindashboard')}}">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
            <li class="{{'tags' == request()->path()?'active':' '}} ">
                <a href="{{route('tags.index')}}">
                  <i class="now-ui-icons education_atom"></i>
                  <p>Tags</p>
                </a>
              </li>
          </li>
          <li class="{{'categories' == request()->path()?'active':' '}} ">
            <a href="{{route('categories.index')}}">
              <i class="now-ui-icons education_atom"></i>
              <p>Catrgories</p>
            </a>
          </li>
          <li class="{{'posts' == request()->path()?'active':' '}} ">
            <a href="{{route('posts.index')}}">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Posts</p>
            </a>
          </li>


          <li class="{{'trashed-posts' == request()->path()?'active':' '}} ">
            <a href="{{route('trashed.index')}}">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Trashed Posts</p>
            </a>
          </li>
          <li class="{{'services' == request()->path()?'active':' '}} ">
            <a href="{{route('services.index')}}">
              <i class="now-ui-icons location_map-big"></i>
              <p>Services</p>
            </a>
          </li>
          <li class="{{'abouts' == request()->path()?'active':' '}} ">
              <a href="{{route('abouts.index')}}">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>About us</p>
            </a>
          </li>

          @if(Auth::user()->usertype=='admin')

          <li class="{{'role-register' == request()->path()?'active':' '}} ">
            <a href="{{route('userslogin')}}">
              <i class="now-ui-icons users_single-02"></i>
              <p>Users</p>
            </a>
          </li>
          @endif
          <li class="{{'profiles.edit' == request()->path()?'active':' '}} ">
            <a href="{{route('profiles.edit',Auth::user()->id)}}">
                <i class="now-ui-icons design_app"></i>
                <p>Profile</p>
              </a>
            </li>



          <li class="nav-item dropdown">



                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}

                <i class="fas fa-sign-out-alt"></i> </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

        </li>

        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Table List</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>

            <ul class="navbar-nav">
           <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Notifications <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <span class="dropdown-item">
                                      aaaaaaaaaaaaaaaaaaaaaaaa
                                   </span>
                                   <span class="dropdown-item">
                                    bbbbbbbbbbbbbbbbbbbbbbb
                                 </span>


                                </div>
                            </li>

                           {{-- ************************* --}}
                             {{-- <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Notifications <span class="caret"></span>
                                    @if(Auth::user()->usertype=='admin')

                                          {{count($countNotifications)}}

                                    @endif
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">

                                    @foreach ($notifications as $note)
                                  <li class="{{$note->read_at==null?'unread':'' }}" style="background-color: cornflowerblue">
                                    <a href="#" class="">
                                       <span style="text-align: center">
                                            {{$note->data['data']}}
                                            {{$note->data['user'] ?? '' }}

                                         </span><hr>

                                </a>

                                <?php $note->markAsRead()?>




                            </li>
                            @endforeach
                            </ul>
                            </li> --}}

                            {{-- ****************************** --}}



              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons location_world"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>

          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <div class="panel-header panel-header-sm">
      </div>
      @yield('content')
      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="http://presentation.creative-tim.com">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{asset('js/app.js')}}"></script>
  <script src="{{asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!--  Google Maps Plugin    -->
  {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
  <!-- Chart JS -->
  <script src="{{asset('/assets/js/plugins/chartjs.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{asset('/assets/js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('/assets/js/now-ui-dashboard.min.js')}}" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{asset('assets/demo/demo.js')}}"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="{{asset('text/javascript" src="js/noty/packaged/jquery.noty.packaged.min.js')}}"></script>
<script src="{{ asset('assets/js/sweetalert.js')}}"></script>
{{-- <script src="{{asset('js/app.js')}}"></script> --}}
<script>


        @if (session('status'))

        //  alert('{{session('status')}}');
          swal({
                title: '{{session('status')}}',
               // text: "You clicked the button!",
                icon: '{{session('statuscode')}}',
                button: "Ok",
               });
        @endif
    // it will show if not found any categories
        @if (session('middlwaralert'))

        //  alert('{{session('status')}}');
          swal({
                title: '{{session('middlwaralert')}}',
               // text: "You clicked the button!",
                icon: '{{session('statuscode')}}',
                button: "Ok",
               });
        @endif

</script>




<script>
         $('button.cofirmDelete').on('click',function(e){
          if(!confirm('Are You Sure Want Delete This Name'))
            {
             e.preventDefault();
            }

         })
</script>

@yield('scripts')




</body>

</html>
