<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->has('archived') ? $articles = Article::archived() : $articles = Article::unarchived();

        $articles = $articles->searchTitle($request->search);


        return view('articles.index', ['articles' => $articles->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        return view('articles.create', ['article' => new Article(), 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        Article::create($request->all())->tags()->attach($request->tags);
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article)
    {
        //TODO FIX CA
        $article->update($request->all());
        // AU DESSUS
        return redirect()->route('articles.show', compact('article'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->archive();
        return redirect()->route('articles.index');
    }
}
