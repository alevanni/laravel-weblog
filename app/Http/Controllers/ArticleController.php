<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();
        //dd($articles);
        $authors = User::all();
        return view('articles.index', compact('articles', 'authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $validated = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|max:1000',
            'premium' => 'nullable',
        ]);
        
        Article::create($validated);
        return redirect()->route('articles.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $author = User::findOrFail($article->user_id);
        $comments = Comment::where('article_id', $article->id)->get();
        $users = User::all();
        //dd(compact('comments'));
        return view('articles.article', compact('article', 'author', 'comments', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
