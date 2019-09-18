@extends('backend.layouts.panel')
@section('title')
{{ (isset($page)) ? 'Update a page' : 'Add a page' }}
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

                            <strong>{{ (isset($page)) ? 'Update a page' : 'Add a page' }}</strong>
                        </div>
                        <div class="col-md-4 ">


                            <a class="btn btn-sm btn-primary float-right  ml-2" href="{{ route('backoffice.pages') }}">
                                <i class="fas fa-list align-middle "></i>
                                List Pages</a>

                            <a class="btn btn-sm btn-primary float-right ml-2"
                                href="{{ route('backoffice.pages.create') }}">
                                <i class="fas fa-plus align-middle "></i>
                                Add Page</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    @include('backend.partials.notifications')

                    <div class="row">
                        <div class="col-sm-10 offset-sm-1">
                            <form autocomplete="off" role="form"
                                action="{{ (isset($page)) ? route('backoffice.pages.update', $page->id ) : route('backoffice.pages.store') }}"
                                method="POST">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                                <div class="form-group row row {!! $errors->first('title', 'has-warning') !!}">
                                    <label for="title" class="col-sm-4 col-form-label">Title
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="title" name="title"
                                            autocomplete="off"
                                            value="{{{ old('title', isset($page) ? $page->title : null) }}}">
                                        {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>

                                <div class="form-group row row {!! $errors->first('meta_keyword', 'has-warning') !!}">
                                    <label for="meta_keyword" class="col-sm-4 col-form-label">Meta Keyword
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="meta_keyword" name="meta_keyword"
                                            autocomplete="off"
                                            value="{{{ old('meta_keyword', isset($page) ? $page->meta_keyword : null) }}}">
                                        {!! $errors->first('meta_keyword', '<span class="help-block">:message</span>')
                                        !!}
                                    </div>
                                </div>

                                <div
                                    class="form-group row row {!! $errors->first('meta_description', 'has-warning') !!}">
                                    <label for="meta_description" class="col-sm-4 col-form-label">Meta Description
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="meta_description"
                                            name="meta_description" autocomplete="off"
                                            value="{{{ old('meta_description', isset($page) ? $page->meta_description : null) }}}">
                                        {!! $errors->first('meta_description', '<span
                                            class="help-block">:message</span>') !!}
                                    </div>
                                </div>

                                <div class="form-group row row {!! $errors->first('slug', 'has-warning') !!}">
                                    <label for="slug" class="col-sm-4 col-form-label">Slug
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="slug" name="slug" autocomplete="off"
                                            value="{{{ old('slug', isset($page) ? $page->slug : null) }}}">
                                        {!! $errors->first('slug', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>

                                <div class="form-group row {!! $errors->first('template_id', 'has-warning') !!}">
                                    <label for="template_id" class="col-sm-4 col-form-label">Template
                                    </label>
                                    <div class="col-sm-8">
                                        {{ Form::select('template', $templates, (isset($page) ? $page->template : null), ['class'=>'form-control col-sm-3']) }}
                                        {!! $errors->first('template', '<span class="help-inline">:message</span>') !!}
                                    </div>
                                </div>

                                <div class="form-group row {!! $errors->first('status', 'has-warning') !!}">
                                    <label for="status" class="col-sm-4 col-form-label">Status
                                    </label>
                                    <div class="col-sm-8">
                                        {{ Form::select('status', $status, (isset($page) ? $page->status : null), ['class'=>'form-control col-sm-3']) }}
                                        {!! $errors->first('status', '<span class="help-inline">:message</span>') !!}
                                    </div>
                                </div>

                                <div class="form-group row {!! $errors->first('is_menu_item', 'has-warning') !!}">
                                    <label for="is_menu_item" class="col-sm-4 col-form-label">Menu Item
                                    </label>
                                    <div class="col-sm-8">
                                        {{ Form::select('is_menu_item', $is_menu_item, (isset($page) ? $page->is_menu_item : null), ['class'=>'form-control col-sm-3']) }}
                                        {!! $errors->first('is_menu_item', '<span class="help-inline">:message</span>')
                                        !!}

                                    </div>
                                </div>

                                <div class="form-group {!! $errors->first('summary', 'has-warning') !!}">
                                    <label for="summary" class="col-sm-4 col-form-label">Summary</label>

                                    <textarea class="form-control" id="summary" style="height: 150px"
                                        name="summary">{{{ old('summary', isset($page) ? $page->summary : null) }}}</textarea>
                                    {!! $errors->first('summary', '<span class="help-block">:message</span>') !!}
                                </div>

                                <div class="form-group {!! $errors->first('content', 'has-warning') !!}">
                                    <label for="content" class="col-sm-4 col-form-label">Content</label>

                                    <textarea class="form-control" id="content"
                                        name="content">{{{ old('content', isset($page) ? $page->content : null) }}}</textarea>
                                    {!! $errors->first('content', '<span class="help-block">:message</span>') !!}

                                </div>

                                <button type="submit" class="btn btn-primary pull-right">
                                    <i class="fa fa-save" aria-hidden="true"></i> Save</button>

                            </form>
                            @if(isset($page))
                            <form autocomplete="off" role="form" class="delete_form float-left"
                                action="{{ route('backoffice.pages.delete', $page->id )   }}" method="POST">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <button type="submit" class="btn btn-primary m-4">
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
<script src="{{ mix('assets/backend/js/summernote-bs4.min.js') }}"></script>
<script>
$(document).ready(function() {

    $('.delete_form').on('submit', function(e) {
        var currentForm = this;
        e.preventDefault();

        bootbox.confirm({
            message: "Are you sure you want to delete the page?",
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

    $('#content').summernote({
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