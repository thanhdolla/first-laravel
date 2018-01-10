@extends('master')
@section('content')
    <style>
        .outer-wrapper {
            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
        }

        .outer-wrapper > .right {
            margin-left: 40px;
        }
    </style>
    
    <div class="outer-wrapper">
        <div class="left">
            @include('frontend.page.dashboard')
        </div>

        <div class="right">
            @include('frontend.page.sidebar')
        </div>
    </div>
@endsection