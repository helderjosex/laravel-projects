<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class BookController extends Controller{

    protected $book = null;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function index()
    {
        $books = $this->book->all();
        return response($books,200);
    }

    public function show($id)
    {
        $book = $this->book->getBook($id);
        if(!$book)
        {
            $output = ['response' => 'Livro não encontrado!'];
            return response($output,400);
        }
        return response($book,200);
    }

    public function save()
    {
        $book = $this->book->saveBook();
        return response($book,200);
    }

    public function update($id)
    {
        $book = $this->book->updateBook($id);
        if(!$book)
        {
            $output = ['response' => 'Livro não encontrado!'];
            return response($output,400);
        }
        return response($book,200);
    }

    public function delete($id)
    {
        $book = $this->book->deleteBook($id);
        if(!$book)
        {
            $output = ['response' => 'Livro não encontrado!'];
            return response($output,400);
        }
        $output = ['response' => 'Livro removido com sucesso!'];
        return response($output,200);
    }


}
