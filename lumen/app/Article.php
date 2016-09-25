<?php

namespace App;

use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = ['title', 'content'];

    public function allArticles()
    {
        return self::all();
    }

    public function getArticle($id)
    {
        $article = self::find($id);
        if(is_null($article))
        {
            return false;
        }
        return $article;
    }

    public function saveArticle()
    {
        $request = Request::all();
        $article = new Article();
        $article = $article->create($request);
        return $article;
    }

    public function updateArticle($id)
    {
        $article = self::find($id);
        if(is_null($article)){
            return false;
        }
        $request = Request::all();
        $article->fill($request);
        $article->save();
        return $article;
    }

    public function deleteArticle($id)
    {
        $article = self::find($id);
        if(is_null($article))
        {
            return false;
        }
        return $article->delete();
    }

}
