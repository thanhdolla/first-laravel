@extends('master')
@section("content")
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Đăng kí</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb">
                    <a href="index.html">Home</a> / <span>Đăng kí</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container">
        <div id="content">

            <form action="{{route('sigin')}}" method="post" class="beta-form-checkout">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="row">
                    <div class="col-sm-3"></div>

                    <div class="col-sm-6">
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
                        @if(Session::has('thanhcong'))
                            <div class="alert alert-success">
                                {{Session::get('thanhcong')}}
                            </div>
                        @endif
                        <h4>Đăng kí</h4>
                        <div class="space20">&nbsp;</div>


                        <div class="form-block">
                            <label for="email">Email address*</label>
                            <input type="email" name="email" id="email" >
                        </div>

                        <div class="form-block">
                            <label for="your_last_name">Fullname*</label>
                            <input type="text" name ="fullname" id="your_last_name" >
                        </div>

                        <div class="form-block">
                            <label for="adress">Address*</label>
                            <input type="text" name="address" id="address" value="Street Address" >
                        </div>

                        <div class="form-block">
                            <label for="phone">Phone*</label>
                            <input type="number" name="phone" id="phone" >
                        </div>
                        <div class="form-block">
                            <label for="phone">Password*</label>
                            <input type="password" name="password" id="password" >
                        </div>
                        <div class="form-block">
                            <label for="phone">Re password*</label>
                            <input type="password" name="re_password" id="pho1ne" >
                        </div>
                        <div class="form-block">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </form>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection