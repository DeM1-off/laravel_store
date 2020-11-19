@extends('admin.layout')
@section('content_admin')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Categories</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('category.create') }}"> Create New category</a>
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
            <th> Name Categories</th>
            <th>Details  Categories</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name_categories }}</td>
                <td>{{ $category->detail_categories }}</td>

                <td>
                    <form action="{{ route('category.destroy',$category->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('category.show',$category->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('category.edit',$category->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{--    {!! $products->links() !!}--}}

@endsection
