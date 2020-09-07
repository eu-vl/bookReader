<?php

namespace App\Http\Controllers\BookReader;

use App\Models\BookReader\Category;
use Illuminate\Http\Request;

class bookCategoryController extends AppController
{
    public function getFilteredBooks($category_id)
    {
        $category = new Category();

        $books = $category::findOrFail($category_id)
            ->filteredCategories()->paginate(10);

        $filter = $category::find($category_id);

        return view('book.index', compact([
            'books' => $books,
            'filter' => $filter,
        ]));
    }
}
