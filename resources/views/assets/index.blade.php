@extends('app')

@section('content')
    <div class="container">



        <h1>Assets</h1>
        <table class="table mt-3">
            <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Purchase Date</th>
                <th>Status</th>
                <th>Added By</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($assets as $asset)
                <tr>
                    <td>{{ $asset->name }}</td>
                    <td>{{ $asset->type }}</td>
                    <td>{{ $asset->purchase_date }}</td>
                    <td>{{ $asset->status }}</td>
                    <td>{{ $asset->userAdded->name }}</td>
                    <td>
                        <a href="{{ route('assets.edit', $asset) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('assets.destroy', $asset) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this asset?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('assets.create') }}" class="btn btn-primary float-right">Add Asset</a>
    </div>
@endsection
