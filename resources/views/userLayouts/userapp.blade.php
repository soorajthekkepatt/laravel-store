<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>My store</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <!-- Fontawesome core CSS -->
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--Slide Show Css -->
    <link href="/assets/ItemSlider/css/main-style.css" rel="stylesheet" />
    <!-- custom CSS here -->
    <link href="/assets/css/style.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/home"><strong>MyStore</strong> Shop</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Track Order</a></li>
                    <li><a href="#">{{ Auth::user()->name }}</a></li>
                    <li><a href="/home/logout">logout</a></li>

                    <li>
                        <a href="/home/mycart" >My Cart <i class="fas fa-shopping-cart"></i></a>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" placeholder="Enter Keyword Here ..." class="form-control">
                    </div>
                    &nbsp; 
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <div class="container">
        @yield('content')
    </div>
       <div class="col-md-12 download-app-box text-center">

        <span class="glyphicon glyphicon-download-alt"></span>Download Our Android App and Get 10% additional Off on all Products . <a href="#" class="btn btn-danger btn-lg">DOWNLOAD  NOW</a>

    </div>

    <!--Footer -->
    <div class="col-md-12 footer-box">

        <div class="row">
            <div class="col-md-4">
                <strong>Send a Quick Query </strong>
                <hr>
                <form>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Email address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <textarea name="message" id="message" required="required" class="form-control" rows="3" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit Request</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-4">
                <strong>Our Location</strong>
                <hr>
                <p>
                     234, New york Street,<br />
                                    Just Location, USA<br />
                    Call: +09-456-567-890<br>
                    Email: info@yourdomain.com<br>
                </p>

                2014 www.yourdomain.com | All Right Reserved
            </div>
            <div class="col-md-4 social-box">
                <strong>We are Social </strong>
                <hr>
                <a href="#"><i class="fa fa-facebook-square fa-3x "></i></a>
                <a href="#"><i class="fa fa-twitter-square fa-3x "></i></a>
                <a href="#"><i class="fa fa-google-plus-square fa-3x c"></i></a>
                <a href="#"><i class="fa fa-linkedin-square fa-3x "></i></a>
                <a href="#"><i class="fa fa-pinterest-square fa-3x "></i></a>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur nec nisl odio. Mauris vehicula at nunc id posuere. Curabitur nec nisl odio. Mauris vehicula at nunc id posuere. 
                </p>
            </div>
        </div>
        <hr>
    </div>
    <!-- /.col -->
    <div class="col-md-12 end-box ">
        &copy; 2018 | &nbsp; All Rights Reserved | &nbsp; www.mystore.com | &nbsp; 24x7 support | &nbsp; Email us: info@mystore.com
    </div>
    <!-- /.col -->
    <!--Footer end -->
    <!--Core JavaScript file  -->
    <script src="/assets/js/jquery-1.10.2.js"></script>
    <!--bootstrap JavaScript file  -->
    <script src="/assets/js/bootstrap.js"></script>
    <!--Slider JavaScript file  -->
    <script src="/assets/ItemSlider/js/modernizr.custom.63321.js"></script>
    <script src="/assets/ItemSlider/js/jquery.catslider.js"></script>
    <script>
        $(function () {

            $('#mi-slider').catslider();

        });
        </script>
</body>
</html>
