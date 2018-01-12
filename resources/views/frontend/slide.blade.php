
<style>
    [view=carousel] {
        position: relative;
        width: 100%;
        height: 400px;

        overflow: hidden;

        margin-bottom: 20px;
    }

    [view=carousel] img {
        object-fit: cover;
    }

    [view=carousel] img.hidden {
        display: none;
    }

    [view=carousel] .images {
        display: flex;
        justify-content: center;
        height: 100%;

        background: #333;
    }

    [view=carousel] .action {
        display: flex;
        align-items: center;
        justify-content: center;

        width: 60px;

        font-family: "Material Icons";
        font-size: 40px;
        color: black;

        z-index: 900;

        cursor: pointer;

        background: rgba(255, 255, 255, 0.8);
    }

    [view=carousel] .action-prev {
        position: absolute;

        top: 0px;
        left: 0px;
        bottom: 0px;
    }
    
    [view=carousel] .action-next {
        position: absolute;

        top: 0px;
        right: 0px;
        bottom: 0px;
    }
</style>

<div view="carousel" id="carousel">
    <div class="action action-prev">navigate_before</div>

    <div class="images">
        @foreach($slide as $photo)
        <img class="hidden"
            src="upload/slide/add/{{$photo->anh_slide }}"
            alt="{{$photo->ten_slide}}"
            height="100%" width="100%" align="center">
        @endforeach
    </div>

    <div class="action action-next">navigate_next</div>
</div>

<script>
    (function () {
        var carousel = document.getElementById('carousel')
        var images = carousel.querySelectorAll('img')
        var index = 0

        function next() {
            images[index].classList.add('hidden')
            
            index = (index + 1) % {{count($slide)}}

            images[index].classList.remove('hidden')
        }

        function prev() {
            images[index].classList.add('hidden')
            
            index = (index + {{count($slide)}} - 1) % {{count($slide)}}

            images[index].classList.remove('hidden')
        }

        var prevButton = carousel.querySelector('.action-prev')
        var nextButton = carousel.querySelector('.action-next')
        
        prevButton.addEventListener('click', prev)
        nextButton.addEventListener('click', next)

        var interval = setInterval(next, 10000)

        next()
    })()
</script>