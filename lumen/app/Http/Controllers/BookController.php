<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class BookController extends Controller{


    public function index(){

        $books  = Book::all();

        return $books;

    }

    public function get($id){

        $book = Book::findorfail($id);

        return $book;
    }

    public function save(Request $request){

        $book = Book::create($request->all());

        return $book;

    }

    public function update(Request $request,$id){

        $book = Book::findorfail($id);

        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->isbn = $request->input('isbn');

        $book->save();

        return $book;
    }

    public function delete($id){

        $book = Book::findorfail($id);

        $book->delete();

        return response()->json('deleted');
    }


}
