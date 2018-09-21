<!DOCTYPE html> 
    <html lang="en" style="height:100%;">
    <head> 
        <meta charset="utf-8"> 
        <title>ProEducation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="keywords" content="ProEducation, " />
        <meta name="description" content="My new website" />
        <link rel="shortcut icon" href="ico/favicon.png"> 
        <!-- Core CSS -->         
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet">
        <!-- Style Library -->         
        <link href="css/style-library-1.css" rel="stylesheet">
        <link href="css/plugins.css" rel="stylesheet">
        <link href="css/blocks.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->         
        <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->         
    </head>     
    <body data-spy="scroll" data-target="nav">
        <header id="header-3" class="soft-scroll header-3">
            <nav>
                <div class="container">
                    <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                        <nav class="pull">
                            <ul class="top-nav">
                                <li>
                                    <a href="#">Home <span class="indicator"><i class="fa fa-angle-right"></i></span></a>
                                </li>
                                <li>
                                    <a href="#">Features <span class="indicator"><i class="fa fa-angle-right"></i></span></a>
                                </li>
                                <li>
                                    <a href="#">Pages <span class="indicator"><i class="fa fa-angle-right"></i></span></a>
                                </li>
                                <li>
                                    <a href="#">Portfolio <span class="indicator"><i class="fa fa-angle-right"></i></span></a>
                                </li>
                                <li>
                                    <a href="#">Team <span class="indicator"><i class="fa fa-angle-right"></i></span></a>
                                </li>
                                <li>
                                    <a href="#">Contact <span class="indicator"><i class="fa fa-angle-right"></i></span></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </nav>
            <!-- /.nav -->
            <section class="hero">
                <div class="container">
                    <div class="brand">
                        <a href="#">
                            <img src="images/brand/pgblocks-logo-nostrap.png" class="brand-img img-responsive">
                        </a>
                    </div>
                    <div class="navicon">
                        <a id="nav-toggle" class="nav-slide-btn" href="#"><span></span></a>
                    </div>
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <div class="editContent">
                            <h1>ProEducating</h1>
                        </div>
                        <div class="editContent">
                            <p class="lead">Hire Expert FreeLancer for your online job</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <div class="col-md-6">
                            <a href="{{ url('/register') }}" class="btn btn-info btn-block">sign Up</a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('/login') }}" class="btn btn-danger btn-block">Login here</a>
                        </div>
                    </div>
                </div>
            </section>
        </header>
        <section id="content-1-2" class="content-block content-1-2">
            <div class="container">
                <!-- Start Row -->
                <div class="row">
                    <div class="col-sm-6">
                        <h2></h2>
                        <h1><b><i>Need Work Done?</i></b></h1>
                        <p>&nbsp;Post your project and receive competitive bids from freelancers within minutes. Our reputation system will make it easy to find the perfect freelancer for your job. It's the simplest and safest way to get work done online!</p>
                        <div class="row">
                            <div class="col-sm-5 col-xs-12">
                                <a href="{{ url('/login') }}" class="btn btn-block btn-primary">hire projects</a>
                            </div>
                            <div class="col-sm-5 col-xs-12">
                                <a href="{{ url('/login') }}" class="btn btn-block btn-warning">post projects</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 col-sm-offset-1">
                        <img class="img-rounded img-responsive" src="http://placehold.it/600x400">
                    </div>
                </div>
                <!--// END Row -->
            </div>
        </section>
        <section class="content-block gallery-1 gallery-1-1">
            <div class="container">
                <div class="underlined-title">
                    <h1>Some Catogery of products</h1>
                    <hr>
                    <h2>Hand-picked just for you</h2>
                </div>
                <ul class="filter">
                    <li class="active">
                        <a href="#" data-filter="*">All</a>
                    </li>
                    <li>
                        <a href="#" data-filter=".artwork">Electronics</a>
                    </li>
                    <li>
                        <a href="#" data-filter=".creative">Creative</a>
                    </li>
                    <li>
                        <a href="#" data-filter=".nature">app</a>
                    </li>
                    <li>
                        <a href="#" data-filter=".outside">web Development</a>
                    </li>
                    <li>
                        <a href="#" data-filter=".photography">C Projects</a>
                    </li>
                </ul>
                <!-- /.gallery-filter -->
                <div class="row">
                    <div class="isotope-gallery-container">
                        <div class="col-md-3 col-sm-6 col-xs-12 gallery-item-wrapper artwork creative">
                            <div class="gallery-item">
                                <div class="gallery-thumb">
                                    <img src="http://placehold.it/800x600" class="img-responsive" alt="1st gallery Thumb">
                                    <div class="image-overlay"></div>
                                    <a href="http://placehold.it/800x600" class="gallery-zoom"><i class="fa fa-eye" alt="This is the title"></i></a>
                                    <a href="#" class="gallery-link" target="_blank"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="gallery-details">
                                    <h5>1st Gallery Item<br><br></h5>
                                </div>
                            </div>
                        </div>
                        <!-- /.gallery-item-wrapper -->
                        <div class="col-md-3 col-sm-6 col-xs-12 gallery-item-wrapper nature outside">
                            <div class="gallery-item">
                                <div class="gallery-thumb">
                                    <img src="http://placehold.it/800x600" class="img-responsive" alt="2nd gallery Thumb">
                                    <div class="image-overlay"></div>
                                    <a href="http://placehold.it/800x600" class="gallery-zoom"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="gallery-link"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="gallery-details">
                                    <h5>2nd Gallery Item<br><br></h5>
                                </div>
                            </div>
                        </div>
                        <!-- /.gallery-item-wrapper -->
                        <div class="col-md-3 col-sm-6 col-xs-12 gallery-item-wrapper photography artwork">
                            <div class="gallery-item">
                                <div class="gallery-thumb">
                                    <img src="http://placehold.it/800x600" class="img-responsive" alt="3rd gallery Thumb">
                                    <div class="image-overlay"></div>
                                    <a href="http://placehold.it/800x600" class="gallery-zoom"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="gallery-link"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="gallery-details">
                                    <h5>3rd Gallery Item<br><br></h5>
                                </div>
                            </div>
                        </div>
                        <!-- /.gallery-item-wrapper -->
                        <div class="col-md-3 col-sm-6 col-xs-12 gallery-item-wrapper creative nature">
                            <div class="gallery-item">
                                <div class="gallery-thumb">
                                    <img src="http://placehold.it/800x600" class="img-responsive" alt="4th gallery Thumb">
                                    <div class="image-overlay"></div>
                                    <a href="http://placehold.it/800x600" class="gallery-zoom"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="gallery-link"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="gallery-details">
                                    <h5>4th Gallery Item<br><br></h5>
                                </div>
                            </div>
                        </div>
                        <!-- /.gallery-item-wrapper -->
                        <div class="col-md-3 col-sm-6 col-xs-12 gallery-item-wrapper nature">
                            <div class="gallery-item">
                                <div class="gallery-thumb">
                                    <img src="http://placehold.it/800x600" class="img-responsive" alt="5th gallery Thumb">
                                    <div class="image-overlay"></div>
                                    <a href="http://placehold.it/800x600" class="gallery-zoom"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="gallery-link"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="gallery-details">
                                    <h5>5th Gallery Item<br><br></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 gallery-item-wrapper artwork creative">
                            <div class="gallery-item">
                                <div class="gallery-thumb">
                                    <img src="http://placehold.it/800x600" class="img-responsive" alt="6th gallery Thumb">
                                    <div class="image-overlay"></div>
                                    <a href="http://placehold.it/800x600" class="gallery-zoom"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="gallery-link"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="gallery-details">
                                    <h5>6th Gallery Item<br><br></h5>
                                </div>
                            </div>
                        </div>
                        <!-- /.gallery-item-wrapper -->
                        <!-- /.gallery-item-wrapper -->
                        <div class="col-md-3 col-sm-6 col-xs-12 gallery-item-wrapper nature outside">
                            <div class="gallery-item">
                                <div class="gallery-thumb">
                                    <img src="http://placehold.it/800x600" class="img-responsive" alt="7th gallery Thumb">
                                    <div class="image-overlay"></div>
                                    <a href="http://placehold.it/800x600" class="gallery-zoom"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="gallery-link"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="gallery-details">
                                    <h5>7th Gallery Item<br><br></h5>
                                </div>
                            </div>
                        </div>
                        <!-- /.gallery-item-wrapper -->
                        <div class="col-md-3 col-sm-6 col-xs-12 gallery-item-wrapper photography artwork">
                            <div class="gallery-item">
                                <div class="gallery-thumb">
                                    <img src="http://placehold.it/800x600" class="img-responsive" alt="8th gallery Thumb">
                                    <div class="image-overlay"></div>
                                    <a href="http://placehold.it/800x600" class="gallery-zoom"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="gallery-link"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="gallery-details">
                                    <h5>8th Gallery Item<br><br></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.isotope-gallery-container -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <section id="content-1-3" class="content-block content-1-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="underlined-title">
                            <h1>Every service under one roof</h1>
                            <hr>
                        </div>
                        <div class="services-wrapper">
                            <div class="col-md-4">
                                <div class="icon bg-crete">
                                    <span class="fa fa-laptop"></span>
                                </div>
                                <h4>Web Design</h4>
                                <p>Starts from 50$<br></p>
                            </div>
                            <div class="col-md-4">
                                <div class="icon bg-finn">
                                    <span class="fa fa-code"></span>
                                </div>
                                <h4>Web Development</h4>
                                <p>Starts from 100$<br></p>
                            </div>
                            <div class="col-md-4">
                                <div class="icon bg-sunflower">
                                    <span class="fa fa-rocket"></span>
                                </div>
                                <h4>Creative Design</h4>
                                <p>Starts from 75$</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <section class="content-block contact-1">
            <div class="container text-center">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="underlined-title">
                        <h1>Get in Touch</h1>
                        <hr>
                        <h2>Feel free to drop us a line to contact us</h2>
                    </div>
                    <p>Cras mattis consectetur purus sit amet fermentum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porta sem malesuada magna mollis euismod. Nulla vitae elit libero, a pharetra augue. Aenean eu leo quam. Pellentesque ornare sem lacinia.</p>
                    <ul class="contact-info">
                        <li>
                            <span class="fa fa-map-marker"></span>
                            <wp-span>KLUniversity, Vaddeshwaram, Guntur Destrict, Andhra Pradesh</wp-span>
                        </li>
                        <li>
                            <span class="fa fa-phone"></span>
                            <wp-span>+91 9876543210</wp-span>
                        </li>
                        <li>
                            <span class="fa fa-envelope"></span>
                            <a href="mailto:buyme@example.com">proeducating@example.com</a> 
                        </li>
                    </ul>
                    <div id="contact" class="form-container">
                        <div id="message"></div>
                        <form method="post" action="js/contact-form.php" name="contactform" id="contactform">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="name" id="name" type="text" value="" placeholder="Name" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="email" id="email" type="text" value="" placeholder="Email" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input name="phone" id="phone" type="text" value="" placeholder="Phone" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                            <div class="form-group">
                                <textarea name="comments" id="comments" class="form-control" rows="3" placeholder="Message" id="textArea"></textarea>
                                <p class="small text-muted"><span class="guardsman">* All fields are required.</span> Once we receive your message we will respond as soon as possible.</p>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" id="cf-submit" name="submit">Send</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.form-container -->
                </div>
                <!-- /.col-sm-10 -->
            </div>
            <!-- /.container -->
        </section>
        <section class="content-block-nopad bg-deepocean footer-wrap-1-3">
            <div class="container footer-1-3">
                <div class="col-md-4 pull-left">
                    <img src="images/brand/pgblocks-logo-white.png" class="brand-img img-responsive">
                    <ul class="social social-light">
                        <li>
                            <a href="#"><i class="fa fa-2x fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-2x fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-2x fa-google-plus"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-2x fa-pinterest"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-2x fa-behance"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-2x fa-dribbble"></i></a>
                        </li>
                    </ul>
                    <!-- /.social -->
                </div>
                <div class="col-md-3 pull-right">
                    <p class="address-bold-line">We <i class="fa fa-heart pomegranate"></i> our amazing customers</p>
                    <p class="address small">
                    123 Anywhere Street,<br>Earth,<br>MilkyWay</p>
                </div>
                <div class="col-xs-12 footer-text">
                    <p>Please take a few minutes to read our <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a></p>
                </div>
            </div>
            <!-- /.container -->
        </section>
        <div class="copyright-bar bg-black">
            <div class="container">
                <p class="pull-left small">© All rights reserved - Proeducating.com 2016</p>
                <p class="pull-right small">Made with <i class="fa fa-heart pomegranate"></i> on Planet Earth</p>
            </div>
        </div>
        <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>         
        <script type="text/javascript" src="js/bootstrap.min.js"></script>         
        <script type="text/javascript" src="js/plugins.js"></script>
        <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
        <script type="text/javascript" src="js/bskit-scripts.js"></script>         
    </body>     
</html>