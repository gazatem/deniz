<div class="bd-home">
    <div id="carouselHomeCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @php
            $count = 0
            @endphp
            @foreach($banners as $banner)
            @if ($banner->first)
            <li data-target="#carouselHomeCaptions" data-slide-to="0" class="active"></li>
            @else
            <li data-target="#carouselHomeCaptions" data-slide-to="{{ $count++}}"></li>
            @endif

            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach($banners as $banner)
            
                @if ($loop->first)
                <div class="carousel-item active">
                    @else
                    <div class="carousel-item">
                        @endif
                        <a href="{{ $banner->link }}">
                        <img src="{{ (Storage::disk('public')->exists('uploads/banners/'.$banner->image)) ? Storage::url('uploads/banners/'.$banner->image) : 'http://placeimg.com/640/280/any' }}" class="d-block w-100" style=""
                            alt="{{ $banner->title }}">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $banner->title }}</h5>
                            <p>{{ $banner->description }}</p>
                        </div>
                        </a>
                    </div>
           
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselHomeCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselHomeCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>