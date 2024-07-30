<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;

use Illuminate\Http\Request;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    // display list of books
   public function index(Request $request)
    {
        $query = Book::where('user_id', Auth::id());

        if ($request->has('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'LIKE', '%' . $request->search . '%')
                ->orWhere('author', 'LIKE', '%' . $request->search . '%');
            });
        }

        // $books = $query->paginate(10);
        $books = $query->get();

        $categories = Category::all(); // To populate the category filter dropdown

        return view('books.index', compact('books', 'categories'));
    }

    // create new book - display book create page
    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }


    // store new book
    public function store(StoreBookRequest $request)
    {

        $pdfFileName = time() . '.' . $request->pdf_file->extension();
        $request->pdf_file->move(public_path('pdfs'), $pdfFileName);

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'publication_date' => $request->publication_date,
            'pdf_file' => $pdfFileName,
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('books.index');
    }

    // book edit page
    public function edit(Book $book)
    {
        $this->authorize('update', $book);

        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    // update the edited books details
    public function update(UpdateBookRequest $request, Book $book)
    {
        $this->authorize('update', $book);

        $pdfFileName = $book->pdf_file;
        if ($request->hasFile('pdf_file')) {
            $pdfFileName = time() . '.' . $request->pdf_file->extension();
            $request->pdf_file->move(public_path('pdfs'), $pdfFileName);
        }

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'publication_date' => $request->publication_date,
            'pdf_file' => $pdfFileName,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('books.index');
    }

    // show a particular book details

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // delete a book
    public function destroy(Book $book)
    {
        $this->authorize('delete', $book);

        $book->delete();
        return redirect()->route('books.index');
    }
}
