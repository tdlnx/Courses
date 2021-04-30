<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
    public function index()
    {
        // Renders a list of resources
        $articles = Article::latest()->get();
        return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
        // Renders a single resource
        $article = Article::find($id);

        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {
        // Show a way to create a new resource
        return view('articles.create');
    }

    public function store()
    {
        // Save a resource
        $article = new Article();

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles');
    }

    public function edit($id)
    {
        // Edit an existing resource
        $article = Article::find($id);

        return view('articles.edit', compact('article'));
    }

    public function update($id)
    {
        // Save the edited resource
        $article = Article::find($id);

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();
        return redirect('/articles/' . $article->id);
    }

    public function destroy()
    {
        // Delete the resource
    }
}
