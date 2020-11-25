@extends('admin.layout')
@section('content_admin')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Attribute group</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('attribute_group.create') }}">New Attribute group</a>
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
            <th width="280px">Action</th>
        </tr>
        @foreach ($attributes as $attribute)
            <tr>
                <td>{{ $attribute->attribute_group_id }}</td>
                <td>{{ $attribute->name_attribute_group }}</td>
                <td>{{ $attribute->detail_attribute_group }}</td>
                <td>
                    <form action="{{ route('attribute_group.destroy',$attribute->attribute_group_id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('attribute_group.show',$attribute->attribute_group_id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('attribute_group.edit',$attribute->attribute_group_id) }}">Edit</a>

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
