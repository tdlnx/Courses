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
        return view('articles.index', ['articles' => $articles]);
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
    }

    public function store()
    {
        // Save a resource
    }

    public function edit()
    {
        // Edit an existing resource
    }

    public function update()
    {
        // Save the edited resource
    }

    public function destroy()
    {
        // Delete the resource
    }
}
