@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Category</h1>
        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
            </div>
            <br />
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
