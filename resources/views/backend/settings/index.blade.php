@extends('backend.layouts.panel')
@section('title') Settings @parent @stop @section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h4> Settings</h4>
                        </div>
                        <div class="col-6 text-right">


                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="table-responsive-sm">
                        <table class="table table-striped table-hover">
                            <thead class="thead-header">
                                <tr>
                                    <th style="width:20%">Setting Name</th>
                                    <th style="width:65%">Value</th>
                                    <th style="width:15%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($settings as $setting)
                                <form autocomplete="off" role="form" class="update_form"
                                    action="{{ route('backoffice.settings.update')   }}" method="POST">
                                    <tr>
                                        <td>{{ $setting->setting_label }}</td>
                                        <td>
                                            @if($setting->setting_type == 'input')
                                            {{ Form::text('setting_value', $setting->setting_value, ['class'=>'form-control col-sm-12']) }}
                                            @endif
                                            @if($setting->setting_type == 'textarea')
                                            {{ Form::textarea('setting_value', $setting->setting_value, ['class'=>'form-control col-sm-12']) }}
                                            @endif
                                            @if($setting->setting_type == 'select')
                                            {{ Form::select('setting_value', ['Yes' => 'Yes', 'No' => 'No'], $setting->setting_value, ['class'=>'form-control col-sm-12']) }}
                                            @endif                                            
                                        </td>
                                        <td>
                                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                            <input type="hidden" name="setting_id" value="{{ $setting->id }}" />
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-save" aria-hidden="true"></i> Update</button>
                                        </td>
                                    </tr>
                                </form>

                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('scripts') @stop