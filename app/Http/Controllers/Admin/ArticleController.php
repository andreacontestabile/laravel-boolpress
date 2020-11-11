<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::where("user_id", Auth::id())->get();

        return view("admin.posts.index", compact("articles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();

        return view("admin.posts.create", compact("tags"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newArticle = new Article;

        $request->validate([
            "title" => "required",
            "slug" => "required|unique:articles",
            "content" => "required",
            "image" => "image"
        ]);

        $imageOriginalName = $data["image"]->getClientOriginalName();
        $imagePath = Storage::disk("public")->putFileAs("images", $data["image"], $imageOriginalName);

        $newArticle->user_id = Auth::id();
        $newArticle->title = $data["title"];
        $newArticle->slug = $data["slug"];
        $newArticle->content = $data["content"];
        $newArticle->image = $imagePath;

        $newArticle->save();

        $newArticle->tags()->sync($data["tags"]);

        $articleId = $newArticle->id;

        return redirect()->route("admin.posts.show", $articleId);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        $tags = $article->tags;

        return view("admin.posts.show", compact("article", "tags"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $tags = Tag::all();

        return view("admin.posts.edit", compact("article", "tags"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $article = Article::find($id);

        Storage::disk('public')->delete($article->image);

        $request->validate([
            "title" => "required",
            "slug" => [
                "required",
                Rule::unique('articles')->ignore($id)
            ],
            "image" => "image",
            "content" => "required"
        ]);

        $imageOriginalName = $data["image"]->getClientOriginalName();
        $imagePath = Storage::disk("public")->putFileAs("images", $data["image"], $imageOriginalName);

        $article->user_id = Auth::id();
        $article->title = $data["title"];
        $article->slug = $data["slug"];
        $article->content = $data["content"];
        $article->image = $imagePath;

        $article->save();

        return redirect()->route("admin.posts.show", $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);

        Storage::disk('public')->delete($article->image);

        $article->delete();

        return redirect()->route("admin.posts.index");
    }
}
