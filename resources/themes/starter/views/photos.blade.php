@extends('layouts.default')
@section('title') Gallery - {{ $gallery->name }} @parent @stop

@section('css')
<link href="{{ asset('themes/taylor/css/lightgallery.min.css') }}" rel="stylesheet">
@stop
@section('content')

<div class="py-5">
    <h3 class="text-center"> {{ $gallery->name }} </h3>
    <div class="container">
        <div class="row">
            <div class="card-columns">
                <div id="aniimated-thumbnials" class="list-unstyled">
                    @foreach($photos as $photo)
                    <a href="{{ Storage::url('uploads/photos/'.$photo->image) }}">
                        <img src="{{ Storage::url('uploads/photos/thump_'.$photo->image) }}" class=" img-fluid card-img"
                            alt="{{ $photo->alt_text }}" />
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        {{ $photos->links() }}
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('themes/taylor/js/lightgallery-all.min.js') }}"></script>
<script src="{{ asset('themes/taylor/js/lg-thumbnail.min.js') }}"></script>
<script src="{{ asset('themes/taylor/js/lg-fullscreen.min.js') }}"></script>
<script>
$(document).ready(function() {

    $('#aniimated-thumbnials').lightGallery({
        thumbnail: true,
        animateThumb: false,
        showThumbByDefault: false
    });

    $('.gallerylist').on('change', function() {
        var id = $(this).children("option:selected").val();
        window.location.href = `/gallery/${id}/photos`;
    });

});
</script>
@stop