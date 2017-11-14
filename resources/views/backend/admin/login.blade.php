<head>
    <!-- include js files -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>

<form style="width:400px;min-height:250px; border:black solid thin;margin:auto;margin-top:100px"
      action="{{route('admin/login')}}" method="post" class="beta-form-checkout">
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    @if(count($errors)> 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}}<br>
            @endforeach
        </div>
    @endif
    @if(Session::has('flag'))
        <div style="background: red;" class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}
        </div>
    @endif
    <div class="row">
        <div class="col-sm-3"></div>


            <h3 style="text-align: center">Đăng nhập</h3>
            <div class="space20">&nbsp;</div>

            <table>
                <tr >
                    <div  >
                        <td style="padding-left: 30px;">
                            <h5>Email address*</h5>
                        </td>
                        <td>
                            <input type="email" name="email" id="email" >
                        </td>
                    </div>
                </tr>
                <tr>
                    <div >
                        <td style="padding-left:30px;">
                            <h5>Password*</h5>
                        </td>
                        <td>
                            <input type="text" id="pasw" name="password" >
                        </td>
                    </div>
                </tr>
            </table>
            <div class="form-block" style="padding-top: 20px;">
                <button style="margin-left: 125px;" type="submit" class="btn btn-success">Login</button>
            </div>

        <div class="col-sm-3"></div>
    </div>
</form>

</body>