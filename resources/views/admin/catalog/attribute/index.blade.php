@extends('admin.layout')
@section('content_admin')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Attributes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('attribute.create') }}"> Create New attributes</a>
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
            <th>Name attributes</th>
            <th>Details attributes</th>
            <th>Attribute group</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($attributes as $attribute)
            <tr>
                <td>{{ $attribute->attribute_id }}</td>
                <td>{{ $attribute->name_attribute }}</td>
                <td>{{ $attribute->detail_attribute }}</td>
                <td>{{ $attribute->name_attribute_group }}</td>
                <td>
                    <form action="{{ route('attribute.destroy',$attribute->attribute_id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('attribute.show',$attribute->attribute_id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('attribute.edit',$attribute->attribute_id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

        {!! $attributes->links() !!}

@endsection
