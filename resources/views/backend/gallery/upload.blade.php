@extends('backend.layouts.panel')
@section('title')
Upload A Photo
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
                            <strong>Upload A Photo</strong>
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
                        <div class="col-sm-10 offset-sm-1 mt-4">
                            <form autocomplete="off" role="form"  enctype="multipart/form-data"
                                action="{{ route('backoffice.gallery.upload_save') }}"
                                method="POST">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                                <div class="form-group row  {!! $errors->first('name', 'has-warning') !!}">
                                    <label for="alt_text" class="col-sm-4 col-form-label">Alt Text
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="alt_text" name="alt_text" autocomplete="off"
                                            value="{{{ old('alt_text',  null) }}}">
                                        {!! $errors->first('alt_text', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>

                                <div class="form-group row {!! $errors->first('gallery_id', 'has-warning') !!}">
                                    <label for="gallery_id" class="col-sm-4 col-form-label">Gallery
                                      </label>
                                    <div class="col-sm-8">
                                        {{ Form::select('gallery_id', $galleries, null, ['class'=>'form-control col-sm-3']) }}
                                        {!! $errors->first('stagallery_idtus', '<span class="help-inline">:message</span>') !!}
                                      
                                    </div>
                                </div>

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