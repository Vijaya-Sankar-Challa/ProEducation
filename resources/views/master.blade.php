<!DOCTYPE html> 
<html lang="en" style="height:100%;">
    <head> 
        <meta charset="utf-8"> 
        <title>@yield('title')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="keywords" content="@yield('keywords')" />
        <meta name="description" content="@yield('description')" />
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}"> 
        <!-- Core CSS -->         
        <link href="{{ url('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> 
        <link href="{{ url('css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ url('css/font1.css') }}" rel="stylesheet">
        <link href="{{ url('css/font2.css') }}" rel="stylesheet">
        <!-- Style Library -->         
        <link href="{{ url('css/style-library-1.css') }}" rel="stylesheet">
        <link href="{{ url('css/plugins.css') }}" rel="stylesheet">
        <link href="{{ url('css/blocks.css') }}" rel="stylesheet">
        <link href="{{ url('css/custom.css') }}" rel="stylesheet">
        <link href="{{ url('css/select2.min.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ url('css/toastr.min.css') }}">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->         
        <!--[if lt IE 9]>
      <script src="{{ url('js/html5shiv.js') }}"></script>
      <script src="{{ url('js/respond.min.js') }}"></script>
        <![endif]-->       
        
        <style type="text/css">
            @media only screen and (min-width: 1200px) and (max-width: 2560px)
            {
                #search {display: none;}
                #extra {display: none;}
            }
            @media only screen and (min-width: 768px) and (max-width: 1200px)
            {
                #search {display: inline-block;}
                #searchform {display: none;}
                #extra {display: none;}
            }
            @media only screen and (min-width: 768px) and (max-width: 1000px)
            {
                #intern {display: none;}
                #work {display: none;}
                #free {display: none;}
                #pro {display: none;}
                #extra {display: inline-block;}
            }
            @media only screen and (min-width: 1px) and (max-width: 768px)
            {
               #searchform {display: none;}
               #extra {display: none;}
            }
        </style>
        @yield('style')
    </head>     
    <body data-spy="scroll" data-target="nav">
        <header id="header-2" class="soft-scroll header-2">
            <nav class="main-nav navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="#">
                            <img src="{{ url('images/brand/pgblocks-logo-nostrap.png')}}" class="brand-img img-responsive">
                        </a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-collapse">
                        <ul class="nav navbar-nav navbar-right" style="margin-top: 20px;margin-bottom: 20px;">
                            <li class="nav-item" id="free">
                                <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">Freelancer <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ url('/postproject') }}">Post A Project</a>
                                    </li>
                                    <li>
                                        <a href="#">Project With My Skills </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/jobs') }}">Browse Projects</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item" id="pro">
                                <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">My Projects <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ url('/myprojects') }}">Projects In Progress</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/dashboard') }}">Dashboard </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/inbox') }}">Inbox</a>
                                    </li>
                                    <li>
                                        <a href="#">FeedBack</a>
                                    </li>
                                </ul>    
                            </li>
                            <li class="nav-item" id="intern">
                                <a href="{{ url('/internship') }}">Internships</a> 
                            </li>                       
                            <li class="nav-item" id="work">
                                <a href="#">Workshops</a>
                            </li>
                            <li class="nav-item" id="extra">
                                <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">Menu <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ url('/internship') }}">Internships</a>
                                    </li>
                                    <li>
                                        <a href="#">WorkShops</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/postproject') }}">Post A Project</a>
                                    </li>
                                    <li>
                                        <a href="#">Project With My Skills </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/jobs') }}">Browse Projects</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/myprojects') }}">Projects In Progress</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/dashboard') }}">Dashboard </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/inbox') }}">Inbox</a>
                                    </li>
                                    <li>
                                        <a href="#">FeedBack</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="" id="search"><i class="fa fa-search fa-lg" aria-hidden="true"></i></a>
                            </li>    
                                <form class="navbar-form navbar-right" id="searchform">
                                    <div class="form-group col-xs-10">
                                        <input type="text" class="form-control" placeholder="Search">
                                    </div>
                                </form>
                            <li class="nav-item">
                                <a href="#"><i class="fa fa-commenting fa-lg" aria-hidden="true"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href=""><i class="fa fa-bell fa-lg" aria-hidden="true"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href=""><i class="fa fa-paper-plane fa-lg" aria-hidden="true"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" style="padding: 13px;">
                                    <img src="{{ url('images/uploads/avatars/') }}/{{ Auth::user()->avatar }}" class="" style="background-color: gray;width: 30px;height: 30px;border-radius: 5px;margin-top: -5px;">
                                </a>    
                                    <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/profile') }}">Profile</a></li>
                                    <li>
                                        <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <!-- <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li> -->
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </header>
        <div style="margin-top: 100px;"></div>
        @yield('content')
        <script type="text/javascript" src="{{ url('js/jquery-1.12.4.js') }}"></script>         
        <script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>         
        <script type="text/javascript" src="{{ url('js/plugins.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/bskit-scripts.js') }}"></script>
        <script src="{{ url('js/select2.full.min.js') }}"></script>
        <script src="{{ url('js/jquery.tablesorter.min.js') }}"></script>
        <script src="{{ url('js/toastr.min.js') }}"></script>
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        <script>
            $(".js-example-basic-multiple-limit").select2({
                maximumSelectionLength: 5
            });
        </script>
        <script>
          toastr.options = {
              "closeButton": true,
              "debug": false,
              "newestOnTop": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
    @if(Session::has('message'))
        var type="{{Session::get('alert-type','info')}}"


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

        @yield('script')
    </body>
</html>