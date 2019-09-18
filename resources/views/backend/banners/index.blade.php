@extends('backend.layouts.panel')
@section('title') Banners @parent @stop @section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h4> Banners</h4>
                        </div>
                        <div class="col-6 text-right">

                            <a class="btn btn-sm btn-primary float-right ml-2"
                                href="{{ route('backoffice.banners.create') }}">
                                <i class="fas fa-plus align-middle "></i>
                                Add a Banner</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
 
                    @if($banners->count() < 1)
                    <div class="alert alert-warning" role="alert">
                    No banner found
                    </div>
                    @else
                    <div class="table-responsive-sm">
                        <table class="table table-striped table-hover">
                            <thead class="thead-header">
                                <tr>
                                    <th style="width:40%">Title</th>
                                    <th style="width:45%">Image</th>
                                    <th style="width:15%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($banners as $banner)
                                <tr>
                                    <td>{{ $banner->title }}</td>
                                    <td><img src="{{ Storage::url('uploads/banners/'.$banner->image) }}" class="img-fluid"
                                alt="{{ $banner->title }}" /></td>
                                    <td>{{ Carbon\Carbon::parse($banner->created_at)->format('d M Y H:i') }}</td>
                                    <td> <a class="btn btn-sm btn-primary  ml-1"
                                            href="{{ route('backoffice.banners.edit', $banner->id) }}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $banners->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('scripts') @stop