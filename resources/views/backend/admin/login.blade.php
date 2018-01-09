<head>
    <title>Admin Login</title>
    <!-- include js files -->

    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">--}}
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="source/frontend/assets/dest/css/bootstrap.css">
    <link rel="stylesheet" href="source/frontend/assets/dest/css/font-awesome.min.css">
    <link rel="stylesheet" href="source/backend/admin/css/simple-line-icons.css">
    <link rel="stylesheet" href="source/backend/admin/css/uniform.default.css">
    <link rel="stylesheet" href="source/backend/admin/css/bootstrap-switch.min.css">
    <link href="source/backend/admin/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="source/backend/admin/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="source/backend/admin/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="source/backend/admin/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="source/backend/admin/css/login-3.min.css" rel="stylesheet" type="text/css" />
    <!-- Latest compiled and minified JavaScript -->
</head>
<body class="login">

<div class="content" style="margin-top: 50px;">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="{{route('admin/login')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        @if(count($errors)> 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
            </div>
        @endif
        @if(Session::has('loi'))
            <div class="alert alert-danger">
                {{Session::get('loi')}}
            </div>
        @endif
        <h3 class="form-title">Đăng nhập tài khoản</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> Enter any username and password. </span>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" type="email"  placeholder="Username" name="email" /> </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
        </div>
        <div class="form-actions" style="padding-bottom: 50px;">
            <button type="submit" class="btn green pull-right"> Đăng nhập </button>
        </div>
    </form>

</div>
<!-- BEGIN CORE PLUGINS -->
<script src="source/backend/admin/js/jquery.min.js" type="text/javascript"></script>
<script src="source/backend/admin/js/bootstrap.min.js" type="text/javascript"></script>

</body>