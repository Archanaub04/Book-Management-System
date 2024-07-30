@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Books</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary">Add Book</a>

        <div class="row mb-3">
            <div class="col-md-12 d-flex justify-content-end">
                <form action="{{ route('books.index') }}" method="GET" class="d-flex align-items-center me-2">
                    <input type="text" name="search" placeholder="Search books" value="{{ request('search') }}"
                        class="form-control me-2" style="width: 200px;">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
                <div class="col-md-4">
                    <select id="categoryFilter" class="form-select">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <table id="books-table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->category->name }}</td>
                        <td>
                            <a href="{{ route('books.show', $book) }}" class="btn btn-info">View</a>
                            <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $books->links() }} --}}
    </div>
@endsection
