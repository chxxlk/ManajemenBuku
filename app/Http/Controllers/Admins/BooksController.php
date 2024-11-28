<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Genres;

class BooksController extends Controller
{
    public function index()
    {
        $books = Books::with('genre')->get();
        $genres = Genres::all();
        return view('admins.books', compact('books', 'genres'));
    }

    public function show($id)
    {
        $book = Books::with('genre')->findOrFail($id);
        return view('admins.books', compact('book'));
    }

    public function destroy($id)
    {
        $book = Books::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }
}
