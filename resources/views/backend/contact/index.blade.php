@extends('backend.layouts.panel')
@section('title') Contact Messages @parent @stop @section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
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
                @include('backend.partials.notifications')

                @if($contacts->count() < 1)
                    <div class="alert alert-warning" role="alert">
                    No contact form found
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
                                <td><a class="btn btn-sm btn-primary ml-1"
                                        href="{{ route('backoffice.contact.show', $contact->id) }}">
                                        <i class="fas fa-eye"></i>
                                        </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $contacts->links() }}
                @endif
            </div>
        </div>
    </div>
</div>
</div>
@endsection @section('scripts') @stop