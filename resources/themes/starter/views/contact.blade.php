@extends('layouts.default')
@section('title') Contact @parent @stop
@section('content')

<div class="row mt-2">
    <div class="col-md-12">

        <div class="row">
            <div class="col-sm-10 offset-sm-1">


                <blockquote class="blockquote mx-4">
                    <p class="mb-0">Get in touch and I’ll talk you through whichever photo session you’re looking to
                        purchase. I’ll answer any questions you may have on my studio, location of outdoor sessions, at
                        home sessions and more.
                    </p>
                </blockquote>
                @include('backend.partials.notifications')
                <div class="row">
                    <div class="col-sm-10 offset-sm-1 m-4">

                        <form autocomplete="off" role="form" action="{{  route('frontend.contact.send') }}"
                            method="POST">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="name">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" id="name" aria-describedby="name"
                                        placeholder="Enter name"  value="{{{ old('name' , null) }}}">
                                    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="subject">Subject</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="subject" id="name" aria-describedby="subject"
                                        placeholder="Enter subject"  value="{{{ old('subject' , null) }}}">
                                    {!! $errors->first('subject', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="email">Email address</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" id="email" name="email" aria-describedby="email"
                                        placeholder="Enter email"  value="{{{ old('email', null) }}}">
                                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="phone">Phone Number</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        aria-describedby="phone" placeholder="Enter phone" value="{{{ old('phone' , null) }}}">
                                    {!! $errors->first('phone', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="message">Your
                                    Message</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="message" id="message" rows="3"> {{{ old('message' , null) }}}</textarea>
                                    {!! $errors->first('message', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')

@stop