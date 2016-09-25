<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ArticleController extends Controller{

    protected $article = null;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function index()
    {
        $articles = $this->article->allArticles();
        return response($articles,200);
    }

    public function show($id)
    {
        $article = $this->article->getArticle($id);
        if(!$article)
        {
            $output = ['response' => 'Artigo não encontrado!'];
            return response($output,400);
        }
        return response($article,200);
    }

    public function save()
    {
        $article = $this->article->saveArticle();
        return response($article,200);
    }

    public function update($id)
    {
        $article = $this->article->updateArticle($id);
        if(!$article)
        {
            $output = ['response' => 'Artigo não encontrado!'];
            return response($output,400);
        }
        return response($article,200);
    }

    public function delete($id)
    {
        $article = $this->article->deleteArticle($id);
        if(!$article)
        {
            $output = ['response' => 'Artigo não encontrado!'];
            return response($output,400);
        }
        $output = ['response' => 'Artigo removido com sucesso!'];
        return response($output,200);
    }

}
