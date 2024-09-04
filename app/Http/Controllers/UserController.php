<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user == null) {

           return redirect()->route('articles.login-page');

        }
        
        else {

            $articles = Article::whereBelongsTo($user)->orderBy('created_at', 'desc')->get();

            return view('users.index', compact('user', 'articles'));

        }
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
        //
    }

    /**
     * Display the specified resource. PREMIUM ARTICLES
     */
    public function show()
    {
        $user = Auth::user();
        
        if ($user == null) {

           return redirect()->route('articles.login-page');

        }
        
        else {
            if ($user->premium === 1) {

                $articles = Article::where('premium', 1)->orderBy('created_at', 'desc')->get();
                return view('articles.premium', compact('user', 'articles'));

            }
            else return redirect()-> route('users.become-premium', [$user->id]);

        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user();
        if ($user == null) {

            return redirect()->route('articles.login-page');
 
         }
        else return view('users.become-premium', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $logged = Auth::user();
        
        if ($logged == null)  return redirect()->route('articles.login-page');

        else if ($logged->id != $user->id) return redirect()->route('articles.users.index', [$logged->id]);

        else {
            
            if ($request->premium === null) return redirect()-> route('users.become-premium', [$logged->id]);
            else {
                $user->update(['premium' => 1]);
                return redirect()->route('articles.users.premium');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
