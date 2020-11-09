<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return view("guests.posts.index", compact("articles"));
    }

    public function show($slug)
    {
        $article = Article::where("slug", $slug)->first();

        return view("guests.posts.show", compact("article"));
    }
}
