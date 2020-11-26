@extends('admin.layout')
@section('content_admin')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show attribute</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('product_attribute.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Id:</strong>
                {{ $product->product_attribute_id }}
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name product:</strong>
                {{ $product->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name Attribute</strong>
                {{ $product->name_attribute }}
            </div>
        </div>

    </div>
@endsection
