@extends('admin.layout')
@section('content_admin')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show attribute</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('attribute.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $attributes->name_attribute }}
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $attributes->detail_attribute }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Attributes Group:</strong>
                {{ $attributes->name_attribute_group }}
            </div>
        </div>

    </div>
@endsection
