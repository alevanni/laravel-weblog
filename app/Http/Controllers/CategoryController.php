<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

         else return view('articles.category-create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $user = Auth::user();

        if ($user == null) {

            return redirect()->route('articles.login-page');
 
         }
       else {

            $validated = $request->validated();
            Category::create($validated);
            return redirect()->route('articles.users.index', [$user->id]);

       }  
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {   
        
        if ($request['category'] !== null)         {

            if ($request['category'] != 'null') {

                $articles = Article::with('categories', 'user')->whereHas('categories', function (Builder $query) use ($request){
                    $query->where('category_id', $request['category']);

                })->orderBy('created_at', 'desc')->get();
            }

            else {

                $articles = Article::doesntHave('categories')->get();
            }

            $categories = Category::all();
            
            return view('articles.index', compact('articles', 'categories'));
        }
        
        else return redirect()->route('articles.index');
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
