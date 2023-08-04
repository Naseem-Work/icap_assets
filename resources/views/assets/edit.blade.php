<!-- resources/views/assets/edit.blade.php -->
@extends('app')

@section('content')
    <div class="container">
        <h1>Edit Asset</h1>
        <form action="{{ route('assets.update', $asset) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $asset->name }}" required>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" name="type" id="type" class="form-control" value="{{ $asset->type }}" required>
            </div>
            <div class="form-group">
                <label for="purchase_date">Purchase Date</label>
                <input type="date" name="purchase_date" id="purchase_date" class="form-control" value="{{ $asset->purchase_date }}" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Active" {{ $asset->status === 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="In-Active" {{ $asset->status === 'In-Active' ? 'selected' : '' }}>In-Active</option>
                </select>
            </div>
            <div class="form-group">
                <label for="user_added_id">Added By</label>
                <select name="user_added_id" id="user_added_id" class="form-control" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $asset->user_added_id === $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Asset</button>
        </form>
    </div>
@endsection
