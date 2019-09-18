@extends('backend.layouts.panel')
@section('title')
Update Profile
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
                            Update Profile
                            </strong>
                        </div>
                        <div class="col-md-2 float-right">
                            
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('backend.partials.notifications')
                    <div class="row">
                        <div class="col-sm-10 offset-sm-1">
                            <form autocomplete="off" role="form"
                                action="{{ route('backoffice.profile.update', $user->id ) }}"
                                method="POST">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                                <div class="form-group {!! $errors->first('name', 'has-warning') !!}">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" autocomplete="off"
                                        value="{{{ old('name', isset($user) ? $user->name : null) }}}">
                                    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                </div>

                                <div class="form-group {!! $errors->first('email', 'has-warning') !!}">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" autocomplete="off"
                                        value="{{{ old('email', isset($user) ? $user->email : null) }}}">
                                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                </div>


                                <div class="form-group {!! $errors->first('password', 'has-warning') !!}">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" />
                                    {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                </div>

                                <div class="form-group {!! $errors->first('password_confirmation', 'has-warning') !!}">
                                    <label for="password_confirmation">Password</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" />
                                    {!! $errors->first('password_confirmation', '<span
                                        class="help-block">:message</span>') !!}
                                </div>
 
                                <button type="submit" class="btn btn-primary float-right">
                                    <i class="fa fa-save" aria-hidden="true"></i>
                                    Save</button>

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
<script>
$(document).ready(function() {

});
</script>
@stop