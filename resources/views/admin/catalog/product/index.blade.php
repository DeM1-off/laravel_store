@extends('admin.layout')
@section('content_admin')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('product.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th>Price</th>
            <th>Image</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->product_id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->detail }}</td>
                <td>{{ $product->price }}</td>
                <td>

                    @if($product->image== null)
                    <img src="{{ asset('upload').'/'.'noimage.png'}}" alt="" style="width: 100px;height: 100px"></td>
                @endif
                @if($product->image != null)
                    <img src="{{ asset('upload/image').'/'.$product->image}}" style="width: 100px;height: 100px" alt=""></td>
                @endif
                <td>
                    <form action="{{ route('product.destroy',$product->product_id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('product.show',$product->product_id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('product.edit',$product->product_id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $products->links() !!}

@endsection
