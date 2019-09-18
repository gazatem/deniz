@extends('layouts.default')
@section('title') {{ isset($page->title) ? $page->title : 'Home' }} @parent @stop
@section('content')

@if($template)
    @include($template)
@else
<section class="page bg-light">
    <div class="container">
        {!! $page->content !!}
    </div>
</section>
@endif
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $("img").addClass("img-fluid");
});
</script>
@stop