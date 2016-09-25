<?php

namespace App;

use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable = ['title', 'author', 'isbn'];

    public function allBooks()
    {
        return self::all();
    }

    public function getBook($id)
    {
        $book = self::find($id);
        if(is_null($book))
        {
            return false;
        }
        return $book;
    }

    public function saveBook()
    {
        $request = Request::all();
        $book = new Book();
        $book = $book->create($request);
        return $book;
    }

    public function updateBook($id)
    {
        $book = self::find($id);
        if(is_null($book)){
            return false;
        }
        $request = Request::all();
        $book->fill($request);
        $book->save();
        return $book;
    }

    public function deleteBook($id)
    {
        $book = self::find($id);
        if(is_null($book))
        {
            return false;
        }
        return $book->delete();
    }

}