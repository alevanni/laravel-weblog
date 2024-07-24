<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleRequest;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        if ($user == null) {

            return redirect()->route('articles.login-page');
 
         }
        
        else return view('articles.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $validated = $request->validated();

        $validated['user_id'] =  Auth::user()->id; 

        Article::create($validated);

        return redirect()->route('articles.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $comments = $article->comments;

        $article->load('user', 'comments.user');
     
        return view('articles.article', compact('article', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, Article $article)
    {   
        $user = Auth::user();
        
        if ($user == null) {

            return redirect()->route('articles.login-page');
 
         }

        else {

            if ($article->user->id == $user->id) return view('articles.edit', compact('user', 'article'));

            else  return redirect()->route('articles.users.show', [$user->id]);
            
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreArticleRequest $request, User $user, Article $article)
    {
        $validated = $request->validated();

        $article->update($validated);

        return redirect()->route('articles.users.show', [$user->id]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, Article $article)
    {
        $user = auth()->user();
        //dd($article);
        $article->delete();
        return redirect()->route('articles.users.show', $user);

    }
}
