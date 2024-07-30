@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Category</h1>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <br />
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
@endsection
