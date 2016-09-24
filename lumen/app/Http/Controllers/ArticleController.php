<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ArticleController extends Controller{


    public function index(){

        $articles  = Article::all();

        return $articles;

    }

    public function get($id){

        $article  = Article::findorfail($id);

        return $article;
    }

    public function save(Request $request){

        $article = Article::create($request->all());

        return $article;

    }


    public function update(Request $request,$id){

        $article  = Article::findorfail($id);

        $article->title = $request->input('title');
        $article->content = $request->input('content');

        $article->save();

        return $article;
    }

    public function delete($id){

        $article  = Article::findorfail($id);

        $article->delete();

        return response()->json('deleted');
    }

}
