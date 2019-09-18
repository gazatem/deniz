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

                    <div class="table-responsive-sm">
                        <table class="table table-striped table-hover">
                            <thead class="thead-header">
                                <tr>
                                    <th style="width:40%">Url</th>
                                    <th style="width:20%">Name</th>
                                    <th style="width:25%">Gallery</th>
                                    <th style="width:15%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($photos as $photo)
                                <tr>
                                    <td>{{ Storage::url('uploads/photos/'.$photo->image) }}</td>
                                    <td>
                                        <img src="{{ Storage::url('uploads/photos/'.$photo->image) }}"
                                            class="modalimg img-fluid" alt="{{ $photo->alt_text }}"/>
                                     </td>
                                    <td>{{ $photo->menu_message }}</td>
                                    <td>{{ Carbon\Carbon::parse($photo->created_at)->format('d M Y H:i') }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary  ml-1"
                                            href="{{ route('backoffice.photo.show', $photo->id) }}">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $photos->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('scripts')


<script>
$(document).ready(function() {
    $('.modalimg').on('click', function() {
        var img = $(this).data('image');
        var title = $(this).data('title');
        bootbox.dialog({
            title: `${title}`,
            message: `<img src="${img}"  class="modalimg img-fluid" alt="${title}">`,
            closeButton: true,
            size: 'small',
            onEscape: true,
            backdrop: true,
        });
    });

});
</script>
@stop