@extends('backend.layouts.panel')
@section('title')
CMS Users
@parent
@stop

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header container-fluid">
                    <div class="row">
                        <div class="col-md-10">
                            <strong>
                                User List
                            </strong>
                        </div>
                        <div class="col-md-2 float-right">
                            <a class="btn btn-sm btn-primary float-right" href="{{ route('backoffice.users.create') }}">
                            <i class="fas fa-plus align-middle "></i> 
                                Create User</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table">
                            <thead class="thead-header">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th class="text-right"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-right">
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('backoffice.users.edit', $user->id) }}">
                                            <i class="far fa-edit"></i> Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')


@stop