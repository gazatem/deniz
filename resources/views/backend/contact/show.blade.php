@extends('backend.layouts.panel')
@section('title') Contact Messages @parent @stop @section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h4> Contact Form Message</h4>
                        </div>
                        <div class="col-6 text-right">


                        </div>
                    </div>
                    <div class="card-body p-4">


                        <h3>{{ $contact->subject }}</h3>

                        Name: {{ $contact->name }}<br />
                        Email: {{ $contact->email }}<br />
                        Date: {{ Carbon\Carbon::parse($contact->created_at)->format('d M Y H:i') }}<br />

                        {{ $contact->message }}

                        <form autocomplete="off" role="form" class="delete_form"
                            action="{{ route('backoffice.contact.delete', $contact->id )   }}" method="POST">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                            <button type="submit" class="btn btn-primary m-4">
                                <i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                        </form>
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
            message: "Are you sure you want to delete the message?",
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