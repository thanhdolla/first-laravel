<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BKSmart</title>
        <base href="{{asset('')}}">
        <link rel="stylesheet" title="style" href="css/index.css">
        <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="source/frontend/assets/dest/css/bootstrap.css">
        <link rel="stylesheet" href="source/frontend/assets/dest/css/font-awesome.min.css">
        <link rel="stylesheet" href="source/frontend/assets/dest/vendors/colorbox/example3/colorbox.css">
        <link rel="stylesheet" href="source/frontend/assets/dest/rs-plugin/css/settings.css">
        <link rel="stylesheet" href="source/frontend/assets/dest/rs-plugin/css/responsive.css">
        <link rel="stylesheet" title="style" href="source/frontend/assets/dest/css/style.css">
        <link rel="stylesheet" href="source/frontend/assets/dest/css/animate.css">
        <link rel="stylesheet" title="style" href="source/frontend/assets/dest/css/huong-style.css">
        <link rel="stylesheet" title="style" href="source/frontend/assets/dest/css/custom.css">

    </head>
    <body>
        @include('frontend.header')
        @include('frontend.slide')
        @yield('content')
        @include('frontend.footer')


        <div class="copyright">
            <div class="container">
                <p class="pull-left">Privacy policy. (&copy;) 2017</p>
                <p class="pull-right pay-options">
                </p>
                <div class="clearfix"></div>
            </div> <!-- .container -->
        </div> <!-- .copyright -->


        <!-- include js files -->
        <script src="source/frontend/assets/dest/js/jquery.js"></script>
        <script src="source/frontend/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
        <script src="source/frontend/assets/dest/css/js/bootstrap.min.js"></script>
        <script src="source/frontend/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
        <script src="source/frontend/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
        <script src="source/frontend/assets/dest/vendors/animo/Animo.js"></script>
        <script src="source/frontend/assets/dest/vendors/dug/dug.js"></script>
        <script src="source/frontend/assets/dest/js/scripts.min.js"></script>
        <script src="source/frontend/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
        <script src="source/frontend/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
        <script src="source/frontend/assets/dest/js/waypoints.min.js"></script>
        <script src="source/frontend/assets/dest/js/wow.min.js"></script>
        <!--customjs-->
        <script src="source/frontend/assets/dest/js/custom2.js"></script>
        
        <script>
            (function () {
                var header = document.getElementById('header')
                var fixed = false
                document.addEventListener('scroll', function (event) {
                    if (document.scrollingElement.scrollTop > 300 && fixed === false) {
                        header.classList.add('fixed')
                        fixed = true
                    } else if (document.scrollingElement.scrollTop <= 300 && fixed === true) {
                        header.classList.remove('fixed')
                        fixed = false
                    } else {
                        // Do nothing!
                    }
                })
            })()
        </script>
    </body>
</html>
