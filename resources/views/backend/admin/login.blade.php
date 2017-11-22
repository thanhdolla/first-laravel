<head>
    <title>Admin Login</title>
    <!-- include js files -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="source/frontend/assets/dest/css/font-awesome.min.css">
    <link rel="stylesheet" href="source/backend/admin/css/simple-line-icons.css">
    <link rel="stylesheet" href="source/backend/admin/css/uniform.default.css">
    <link rel="stylesheet" href="source/backend/admin/css/bootstrap-switch.min.css">
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="source/backend/admin/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="source/backend/admin/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="source/backend/admin/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="source/backend/admin/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="source/backend/admin/css/login-3.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->


    <!-- Latest compiled and minified JavaScript -->
</head>
<body class="login">

<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="{{route('admin/login')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        @if(Session::has('flag'))
            <div style="background: red;" class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}
            </div>
        @endif
        <h3 class="form-title">Login to your account</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> Enter any username and password. </span>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" type="email" autocomplete="off" placeholder="Username" name="email" /> </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
        </div>
        <div class="form-actions">
            <label class="checkbox">
                <input type="checkbox" name="remember" value="1" /> Remember me </label>
            <button type="submit" class="btn green pull-right"> Login </button>
        </div>
        {{--<div class="login-options">--}}
        {{--<h4>Or login with</h4>--}}
        {{--<ul class="social-icons">--}}
        {{--<li>--}}
        {{--<a class="facebook" data-original-title="facebook" href="javascript:;"> </a>--}}
        {{--</li>--}}
        {{--<li>--}}
        {{--<a class="twitter" data-original-title="Twitter" href="javascript:;"> </a>--}}
        {{--</li>--}}
        {{--<li>--}}
        {{--<a class="googleplus" data-original-title="Goole Plus" href="javascript:;"> </a>--}}
        {{--</li>--}}
        {{--<li>--}}
        {{--<a class="linkedin" data-original-title="Linkedin" href="javascript:;"> </a>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--<div class="forget-password">--}}
        {{--<h4>Forgot your password ?</h4>--}}
        {{--<p> no worries, click--}}
        {{--<a href="javascript:;" id="forget-password"> here </a> to reset your password. </p>--}}
        {{--</div>--}}
        {{--<div class="create-account">--}}
        {{--<p> Don't have an account yet ?&nbsp;--}}
        {{--<a href="javascript:;" id="register-btn"> Create an account </a>--}}
        {{--</p>--}}
        {{--</div>--}}
    </form>
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <!-- END FORGOT PASSWORD FORM -->
    <!-- BEGIN REGISTRATION FORM -->
    <!-- END REGISTRATION FORM -->
</div>
<!-- BEGIN CORE PLUGINS -->
<script src="source/backend/admin/js/jquery.min.js" type="text/javascript"></script>
<script src="source/backend/admin/js/bootstrap.min.js" type="text/javascript"></script>
{{--<script src="source/backend/admin/js/js.cookie.min.js" type="text/javascript"></script>--}}
{{--<script src="source/backend/admin/js/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>--}}
{{--<script src="source/backend/admin/js/jquery.slimscroll.min.js" type="text/javascript"></script>--}}
{{--<script src="source/backend/admin/js/jquery.blockui.min.js" type="text/javascript"></script>--}}
{{--<script src="source/backend/admin/js/jquery.uniform.min.js" type="text/javascript"></script>--}}
{{--<script src="source/backend/admin/js/bootstrap-switch.min.js" type="text/javascript"></script>--}}
{{--<!-- END CORE PLUGINS -->--}}
{{--<!-- BEGIN PAGE LEVEL PLUGINS -->--}}
{{--<script src="source/backend/admin/js/jquery.validate.min.js" type="text/javascript"></script>--}}
{{--<script src="source/backend/admin/js/additional-methods.min.js" type="text/javascript"></script>--}}
{{--<script src="source/backend/admin/select2/js/select2.full.min.js" type="text/javascript"></script>--}}
{{--<!-- END PAGE LEVEL PLUGINS -->--}}
{{--<!-- BEGIN THEME GLOBAL SCRIPTS -->--}}
{{--<script src="source/backend/admin/js/app.min.js" type="text/javascript"></script>--}}
{{--<!-- END THEME GLOBAL SCRIPTS -->--}}
{{--<!-- BEGIN PAGE LEVEL SCRIPTS -->--}}
{{--<script src="source/backend/admin/js/login.min.js" type="text/javascript"></script>--}}
<!-- END PAGE LEVEL SCRIPTS -->




</body>