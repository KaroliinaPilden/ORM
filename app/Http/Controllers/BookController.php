<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;


class BookController extends Controller
{
    public function index() {

         $order = request('order') == 'asc'? 'desc':'asc';
        $books = Book::query();

        if (request()->has('sort')) {
            $books = Book::orderBy(request()->query('sort'), $order);
        }
        
        return view('welcome', ['books'=>$books->paginate(20), 'order' => $order]);        
    }

    public function show($book){
        //get book from database
        $book = Book::with('author')->find($book);
        //send book to view
        return view('show', compact('book'));
    }
}
