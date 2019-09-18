@extends('backend.layouts.panel')
@section('title')
{{ (isset($banner)) ? 'Update a banner' : 'Add a banner' }}
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
                        <div class="col-md-8">

                            <strong>{{ (isset($banner)) ? 'Update a banner' : 'Add a banner' }}</strong>
                        </div>
                        <div class="col-md-4 ">


                            <a class="btn btn-sm btn-primary float-right  ml-2"
                                href="{{ route('backoffice.banners') }}">
                                <i class="fas fa-list align-middle "></i>
                                List Banners</a>

                            <a class="btn btn-sm btn-primary float-right ml-2"
                                href="{{ route('backoffice.banners.create') }}">
                                <i class="fas fa-plus align-middle "></i>
                                Add Banner</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    @include('backend.partials.notifications')

                    @if(isset($banner))
                    <div class="row">
                        <div class="col-sm-10 offset-sm-1 text-center">
                            <img src="{{ Storage::url('uploads/banners/'.$banner->image) }}" class="img-fluid"
                                alt="{{ $banner->title }}" />
                            <p><b>{{ $banner->title }}</b></p>
                            <p>{{ $banner->description }}</p>
                        </div>
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-sm-10 offset-sm-1">
                            <form autocomplete="off" role="form" enctype="multipart/form-data"
                                action="{{ (isset($banner)) ? route('backoffice.banners.update', $banner->id ) : route('backoffice.banners.store') }}"
                                method="POST">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                                <div class="form-group {!! $errors->first('image', 'has-warning') !!}">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input"
                                                id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                                            <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button"
                                                id="inputGroupFileAddon04">Upload</button>
                                        </div>
                                    </div>
                                    {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                                </div>

                                <div class="form-group {!! $errors->first('link', 'has-warning') !!}">
                                    <label for="link" class="col-sm-4 col-form-label">Link to page
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="link" name="link" autocomplete="off"
                                            value="{{{ old('link', isset($banner) ? $banner->link : null) }}}">
                                        {!! $errors->first('link', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>

                                <div class="form-group {!! $errors->first('title', 'has-warning') !!}">
                                    <label for="title" class="col-sm-4 col-form-label">Title
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="title" name="title"
                                            autocomplete="off"
                                            value="{{{ old('title', isset($banner) ? $banner->title : null) }}}">
                                        {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>

                                <div class="form-group {!! $errors->first('description', 'has-warning') !!}">
                                    <label for="description" class="col-sm-4 col-form-label">Content</label>

                                    <textarea class="form-control" id="description"
                                        name="description">{{{ old('description', isset($banner) ? $banner->content : null) }}}</textarea>
                                    {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
                                </div>

                                <button type="submit" class="btn btn-primary pull-right">
                                    <i class="fa fa-save" aria-hidden="true"></i> Save</button>

                            </form>

                            @if(isset($banner))
                            <form autocomplete="off" role="form" class="delete_form float-left"
                                action="{{ route('backoffice.banners.delete', $banner->id )   }}" method="POST">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <button type="submit" class="btn btn-danger m-4">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                            </form>
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

<script>
$(document).ready(function() {

    $('.delete_form').on('submit', function(e) {
        var currentForm = this;
        e.preventDefault();

        bootbox.confirm({
            message: "Are you sure you want to delete the banner?",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
                }
            },
            callback: function(result) {
                if (result) {
                    currentForm.submit();
                }
            }
        });
    });
});
</script>
@stop