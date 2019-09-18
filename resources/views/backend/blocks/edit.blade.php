@extends('backend.layouts.panel')
@section('title')
Update Block
@parent
@stop
@section('css')
<link href="{{ mix('assets/backend/css/summernote-bs4.css') }}" rel="stylesheet">
@stop
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header container-fluid">
                    <div class="row">
                        <div class="col-md-8">

                            <strong>Update Block</strong>
                        </div>
                        <div class="col-md-4 ">
                            <a class="btn btn-sm btn-primary float-right  ml-2" href="{{ route('backoffice.blocks') }}">
                                <i class="fas fa-list align-middle "></i>
                                List Blocks</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('backend.partials.notifications')

                    <div class="row">
                        <div class="col-sm-10 offset-sm-1">
                            <form autocomplete="off" role="form"
                                action="{{   route('backoffice.blocks.update', $block->id ) }}"
                                method="POST">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                                <div class="form-group {!! $errors->first('content', 'has-warning') !!}">
                                    <label for="content" class="col-sm-4 col-form-label">Content</label>

                                    <textarea class="form-control" id="block_value"
                                        name="block_value">{{{ old('block_value', isset($block) ? $block->block_value : null) }}}</textarea>
                                    {!! $errors->first('block_value', '<span class="help-block">:message</span>') !!}
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
<script src="{{ mix('assets/js/summernote-bs4.min.js') }}"></script>

<script>
$(document).ready(function() {
 

    $('#block_value').summernote({
        height: 600,
        tabsize: 2,
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'paragraph']],
            ['height', ['height']],
            ['insert', ['link', 'picture', 'video']],
            ['misc', ['codeview']]
        ]
    });
});
</script>
@stop