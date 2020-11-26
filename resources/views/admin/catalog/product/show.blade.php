@extends('admin.layout')
@section('content_admin')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <ul class="nav nav-tabs">
        <!-- Первая вкладка (активная) -->
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#description">Описание</a>
        </li>
        <!-- Вторая вкладка -->
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#characteristics">Характеристики</a>
        </li>

    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="description">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $products->name }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Details:</strong>
                    {{ $products->detail }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    {{ $products->price }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    @if($products->image== null)
                        <img src="{{ asset('upload').'/'.'noimage.png'}}" alt="" style="width: 100px;height: 100px"></td>
                    @endif
                    @if($products->image != null)
                        <img src="{{ asset('upload/image').'/'.$products->image}}" style="width: 100px;height: 100px" alt=""></td>
                    @endif
                </div>
            </div>
        </div>
        <div class="tab-pane" id="characteristics">






        </div>

    </div>
@endsection
