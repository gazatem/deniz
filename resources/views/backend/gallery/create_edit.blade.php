@extends('backend.layouts.panel')
@section('title')
{{ (isset($gallery)) ? 'Update a gallery' : 'Add a gallery' }}
@parent
@stop
@section('css')
@stop
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <strong>{{ (isset($gallery)) ? 'Update a gallery' : 'Add a gallery' }}</strong>
                        </div>
                        <div class="col-md-8 ">
                            <a class="btn btn-sm btn-primary float-right ml-2"
                                href="{{ route('backoffice.gallery.create') }}">
                                <i class="fas fa-plus align-middle "></i>
                                Add Gallery</a>

                            <a class="btn btn-sm btn-primary float-right ml-2"
                                href="{{ route('backoffice.gallery.upload') }}">
                                <i class="fas fa-plus align-middle "></i>
                                Upload Photo</a>

                            <a class="btn btn-sm btn-primary float-right  ml-2"
                                href="{{ route('backoffice.gallery.list_galleries') }}">
                                <i class="fas fa-list align-middle "></i>
                                List Galleries</a>

                                <a class="btn btn-sm btn-primary float-right  ml-2"
                                href="{{ route('backoffice.gallery') }}">
                                <i class="fas fa-list align-middle "></i>
                                List Photos</a>                                
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    @include('backend.partials.notifications')

                    <div class="row">
                        <div class="col-sm-10 offset-sm-1">
                            <form autocomplete="off" role="form"
                                action="{{ (isset($gallery)) ? route('backoffice.gallery.update', $gallery->id ) : route('backoffice.gallery.store') }}"
                                method="POST">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                                <div class="form-group row row {!! $errors->first('name', 'has-warning') !!}">
                                    <label for="name" class="col-sm-4 col-form-label">Name
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="name" name="name" autocomplete="off"
                                            value="{{{ old('name', isset($gallery) ? $gallery->name : null) }}}">
                                        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">
                                    <i class="fa fa-save" aria-hidden="true"></i> Save</button>

                            </form>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@stop