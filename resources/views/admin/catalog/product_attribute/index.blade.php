@extends('admin.layout')
@section('content_admin')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('product_attribute.create') }}"> Create New Product</a>
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
            <th>Name Attribute</th>

            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->product_attribute_id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->name_attribute }}</td>

                <td>
                    <form action="{{ route('product_attribute.destroy',$product->product_attribute_id) }}" method="POST">

                       <a class="btn btn-info" href="{{ route('product_attribute.show',$product->product_attribute_id) }}">Show</a>


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
