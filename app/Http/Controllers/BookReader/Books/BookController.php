<?php

namespace App\Http\BookReader\Books;

use App\Http\Controllers\BookReader\AppController;
use App\Models\BookReader\Book;
use App\Models\BookReader\Category;
use Illuminate\Http\Request;

class BookController extends AppController
{
    public function index()
    {
        $books = Book::orderBy('created_at', 'DESC')->paginate(10);

        return view('book.index', compact([
            'books'
        ]));
    }


    public function create()
    {
        return view('book.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:5',
        ]);

        $book = new Book([
            'name' => $request['name'],
            'description' => $request['description'],
            'user_id' => auth()->id(),
        ]);
        $book->save();

        return redirect('/book/' . $book->id);
    }

    public function show(Book $book)
    {
        $allCategories = Category::all();
        $usedCategories = $book->categories;
        $availableCategories = $allCategories->diff($usedCategories);

        return view('book.show')->with([
            'book' => $book,
            'availableCategories' => $availableCategories,
        ]);
    }


    public function edit(Book $book)
    {
        return view('book.edit')->with([
            'book' => $book,
        ]);
    }


    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:5',
        ]);

        $book->update([
            'name' => $request['name'],
            'description' => $request['description'],
        ]);
        return $this->index();
    }


    public function destroy(Book $book)
    {
        $oldName = $book->name;
        $book->delete();
        return $this->index();
    }
}
