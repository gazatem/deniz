@extends('backend.layouts.panel')
@section('title') Photo Galleries @parent @stop @section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <strong> Photo Galleries</strong>
                        </div>
                        <div class="col-md-8">
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
                    <img src="{{ Storage::url('uploads/photos/'.$photo->image)  }}" class="img-fluid"
                        alt="{{ $photo->alt_text }}" />
                    <p>{{ $photo->alt_text }}</p>

                    @if(isset($photo))
                    <form autocomplete="off" role="form" class="delete_form float-left"
                        action="{{ route('backoffice.photo.delete', $photo->id )   }}" method="POST">
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
@endsection @section('scripts')


<script>
$(document).ready(function() {
    $('.delete_form').on('submit', function(e) {
        var currentForm = this;
        e.preventDefault();

        bootbox.confirm({
            message: "Are you sure you want to delete the photo?",
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