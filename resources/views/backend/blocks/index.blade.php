@extends('backend.layouts.panel')
@section('title') Blocks @parent @stop @section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h4> Blocks</h4>
                        </div>
                        <div class="col-6 text-right">


                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if($blocks->count() < 1) <div class="alert alert-warning" role="alert">
                        No block found
                </div>
                @else
                <div class="table-responsive-sm">
                    <table class="table table-striped table-hover">
                        <thead class="thead-header">
                            <tr>
                                <th style="width:80%">Block Name</th>
                                <th style="width:20%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blocks as $block)
                            <tr>
                                <td>{{ $block->block_label }}</td>
                                <td>
                                    <a class="float-right btn btn-primary btn-sm"
                                        href="{{ route('backoffice.blocks.edit', $block->id) }}">
                                        <i class="fa fa-pen" aria-hidden="true"></i> Update</a>
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
@endsection @section('scripts') @stop