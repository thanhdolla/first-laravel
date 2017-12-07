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
                <img style="height:320px" src="source/frontend/image/slide/{{$photo->anh_slide }}" alt="{{$photo->ten_slide}}">
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