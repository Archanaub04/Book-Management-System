@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $book->title }}</h1>
        <p><strong>Author:</strong> {{ $book->author }}</p>
        <p><strong>Description:</strong> {{ $book->description }}</p>
        <p><strong>Publication Date:</strong> {{ $book->publication_date }}</p>
        <p><strong>Category:</strong> {{ $book->category->name }}</p>
        <p><a href="{{ url('pdfs/' . $book->pdf_file) }}" target="_blank">Download PDF</a></p>
        <a href="{{ route('books.index') }}" class="btn btn-primary">Back to List</a>
    </div>
@endsection
