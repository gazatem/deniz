@extends('backend.layouts.panel')
@section('title') Dashboard @parent @stop
@section('content')



<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h4>Latest 5 Pages</h4>
                        </div>
                        <div class="col-6 text-right">

                            <a class="btn btn-sm btn-primary float-right ml-2"
                                href="{{ route('backoffice.pages.create') }}">
                                <i class="fas fa-plus align-middle "></i>
                                Add Page</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if($pages->count() < 1) <div class="alert alert-warning" role="alert">
                        No page found
                </div>
                @else
                <div class="table-responsive-sm">
                    <table class="table table-striped table-hover">
                        <thead class="thead-header">
                            <tr>
                                <th style="width:45%">Title</th>
                                <th style="width:15%">Status</th>
                                <th style="width:10%">Date</th>
                                <th style="width:15%"></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($pages as $page)
                            <tr>
                                <td>{{ $page->title }}</td>
                                <td>{{ $page->status_message }}</td>
                                <td>{{ Carbon\Carbon::parse($page->created_at)->format('d M Y H:i') }}</td>
                                <td><a class="btn btn-sm btn-primary ml-1"
                                        href="{{ route('backoffice.pages.view', $page->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <a class="btn btn-sm btn-primary  ml-1"
                                        href="{{ route('backoffice.pages.edit', $page->id) }}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h4> Contact Messages</h4>
                    </div>
                    <div class="col-6 text-right">


                    </div>
                </div>
                <div class="card-body">
                    @if($contacts->count() < 1) <div class="alert alert-warning" role="alert">
                        No contact messages found
                </div>
                @else
                <div class="table-responsive-sm">
                    <table class="table table-striped table-hover">
                        <thead class="thead-header">
                            <tr>
                                <th style="width:45%">Subject</th>
                                <th style="width:15%">Name</th>
                                <th style="width:10%">Date</th>
                                <th style="width:15%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $contact->subject }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ Carbon\Carbon::parse($contact->created_at)->format('d M Y H:i') }}</td>
                                <td><a class="btn btn-sm btn-primary ml-1 float-right"
                                        href="{{ route('backoffice.contact.show', $contact->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
@section('scripts')
<script>

</script>
@stop