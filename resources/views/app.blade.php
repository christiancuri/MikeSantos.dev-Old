<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="MikeSantos">
        <link rel="shortcut icon" href="{{asset('style/images/favicon.png')}}">
        <title>MikeSantos Web & Mobile developer</title>

        <link href="{{asset('style/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('style/css/plugins.css')}}" rel="stylesheet">
        <link href="{{asset('style/css/prettify.css')}}" rel="stylesheet">
        <link href="{{asset('style/css/style.css')}}" rel="stylesheet">
        <link href="{{asset('style/css/color/blue.css')}}" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,800,700,600,500,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,400italic' rel='stylesheet' type='text/css'>
        <link href="{{asset('style/type/fontello.css')}}" rel="stylesheet">
        <link href="{{asset('style/type/budicons.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{asset('app/assets/app.css')}}">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="{{asset('style/js/html5shiv.js')}}"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="full-layout">
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>
        <div class="body-wrapper">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header"> <a class="btn responsive-menu" data-toggle="collapse" data-target=".navbar-collapse"><i></i></a>
                    <div class="navbar-brand text-center">
                        <a href="{{route('home')}}">
                            <img width="200px" height="auto" src="{{asset('style/images/logo.png')}}" alt="" data-src="{{asset('style/images/logo.png')}}" data-ret="{{asset('style/images/logo@2x.png')}}" class="retina" />
                        </a>
                    </div>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="{{ Request::is('/') ? 'current' : '' }}">
                            <a href="{{ Request::is('/') ? '' : '/'  }}#home">Home</a>
                        </li>
                        <li>
                            <a href="{{ Request::is('/') ? '' : '/'  }}#about">About me</a>
                        </li>
                        <li>
                            <a href="{{ Request::is('/') ? '' : '/'  }}#contact">Contact</a>
                        </li>
                        <li class="{{ Request::is('blog*') ? 'current' : '' }}">
                            <a href="{{route('blog')}}">Blog</a>
                        </li>
                        <li>
                            <a href="#elsewhere" class="fancybox-inline" data-fancybox-width="325" data-fancybox-height="220">
                                <i class="icon-heart-1"></i>
                                <span>Elsewhere</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div id="elsewhere" style="display:none;">
                    <h1>Me, Elsewhere</h1>
                    <div class="divide20"></div>
                    <ul class="social">
                        <li><a href="#"><i class="icon-s-instagram invisible"></i></a></li>
                        <li><a href="#"><i class="icon-s-flickr invisible"></i></a></li>


                        <li><a href="https://github.com/christiancuri" target="_blank"><i class="icon-s-github"></i></a></li>
                        <li><a href="https://twitter.com/_mikesantos_" target="_blank"><i class="icon-s-twitter"></i></a></li>

                        <li><a href="#"><i class="icon-s-pinterest invisible"></i></a></li>
                        <li><a href="#"><i class="icon-s-linkedin invisible"></i></a></li>
                    </ul>
                </div>
            </nav>

            @yield('content')

            <footer class="footer box">
                <p class="pull-left">© 2018 StoreDev. All rights reserved. Theme by <a href="http://elemisfreebies.com/" target="_blank">elemis</a>.</p>
                <ul class="social pull-right">
                    <li><a href="https://github.com/christiancuri" target="_blank"><i class="icon-s-github"></i></a></li>
                    <li><a href="https://twitter.com/_mikesantos_" target="_blank"><i class="icon-s-twitter"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </footer>
        </div>
        <script src="{{asset('style/js/jquery.min.js')}}"></script>
        <script src="{{asset('style/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('style/js/jquery.themepunch.tools.min.js')}}"></script>
        <script src="{{asset('style/js/classie.js')}}"></script>
        <script src="{{asset('style/js/plugins.js')}}"></script>
        <script src="{{asset('style/js/scripts.js')}}"></script>
        <script type="text/javascript" src="{{asset('app/assets/app.js')}}"></script>
        <script>
            $.backstretch(["{{asset('style/images/background.jpg')}}"]);
        </script>
    </body>
</html>
