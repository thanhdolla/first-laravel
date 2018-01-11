
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="height:320px;width:95%;margin:auto">

    <!-- Indicators -->
    <ol class="carousel-indicators">
        @foreach( $slide as $photo )
            <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}"
                class="{{ $loop->first ? 'active' : '' }}"></li>
        @endforeach
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox" style="height: 100%">
        @foreach( $slide as $photo )
            <div class="item {{ $loop->first ? ' active' : '' }}" style="height: 100%">
                <img style="height:320px" src="upload/slide/add/{{$photo->anh_slide }}" alt="{{$photo->ten_slide}}">
            </div>
        @endforeach
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- slide -->
<!-- slider -->
{{--<div class="row carousel-holder">--}}
    {{--<div class="col-md-12">--}}
        {{--<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">--}}
            {{--<ol class="carousel-indicators">--}}
                {{--@foreach( $slide as $photo )--}}
                {{--<li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}"--}}
                {{--class="{{ $loop->first ? 'active' : '' }}"></li>--}}
                {{--@endforeach--}}
            {{--</ol>--}}
            {{--<div class="carousel-inner">--}}
                {{--@foreach( $slide as $photo )--}}
                {{--<div class="item active">--}}
                    {{--<img class="slide-image" src="upload/slide/add/{{$photo->anh_slide }}"  alt="">--}}
                {{--</div>--}}
                {{--@endforeach--}}
            {{--</div>--}}
            {{--<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">--}}
                {{--<span class="glyphicon glyphicon-chevron-left"></span>--}}
            {{--</a>--}}
            {{--<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">--}}
                {{--<span class="glyphicon glyphicon-chevron-right"></span>--}}
            {{--</a>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
<!-- end slide -->