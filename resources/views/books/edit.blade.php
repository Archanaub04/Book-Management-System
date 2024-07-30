@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Book</h1>
        <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control">{{ $book->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="publication_date">Publication Date</label>
                <input type="date" name="publication_date" class="form-control" value="{{ $book->publication_date }}"
                    required>
            </div>
            <div class="form-group">
                <label for="pdf_file">PDF File</label>
                <input type="file" name="pdf_file" class="form-control">
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <br />
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
