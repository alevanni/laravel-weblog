<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('categories', 'user')->orderBy('created_at', 'desc')->get();

        $categories = Category::all();

        return view('articles.index', compact('articles', 'categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $categories = Category::all();

        if ($user == null) return redirect()->route('articles.login-page');
        
        return view('articles.create', compact('user', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request, Category $category)
    {   
        if (Auth::check()) return redirect()->route('articles.login-page');

        $validated = $request->validated();
        $validated['user_id'] =  Auth::id(); 

        $image_name = $request->file('image')->getClientOriginalName();
        $file=file_get_contents($request->file('image'));

        if (Storage::exists(('public/images/').$image_name) ){
            $image_name = time()."_". $image_name;
        }

        Storage::disk('local')->put(('public/images/').$image_name, $file);
        
        $validated['image'] = $image_name;

        $article = Article::create($validated);

        if ($request['category'] !==null) {
            $article -> categories() ->attach($request['category']) ;
        }
    
        return redirect()->route('articles.index');

        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {  

        if ($article->premium === 1) {

            $user = Auth::user();
            
            if ($user == null)  return redirect()->route('articles.login-page');
            else if ($user->premium === 0 ) return redirect()-> route('users.become-premium', [$user->id]);
            
        }

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

            if ($article->user->id == $user->id) {
                  
                  $categories = Category::whereDoesntHave('articles', function (Builder $query) use($article) {
                    $query->where('article_id', $article->id);
                })->get();
                 
                  return view('articles.edit', compact('user', 'article', 'categories'));
            }

            else  return redirect()->route('articles.users.index', [$user->id]);
            
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreArticleRequest $request, User $user, Article $article)
    {   
        $user = Auth::user();
        
        if ($user == null) {

            return redirect()->route('articles.login-page');
 
        }
        
        else { 

            if ($article->user->id == $user->id) {

                $validated = $request->validated();
        
                if ( !isset($validated['premium'])) {

                    $validated['premium'] = false;

                }
                
                if ( isset($validated['image'])) {

                    if (Article::where('image', $article->image)->count() === 1 ) {

                        Storage::delete( ('public/images/').$article->image );
                    }

                    $image_name = $request->file('image')->getClientOriginalName();
                    $file = file_get_contents($request->file('image'));

                    if (Storage::exists(('public/images/').$image_name) ){

                        $image_name = time()."_". $image_name;

                    }

                    Storage::disk('local')->put(('public/images/').$image_name, $file );
                    $validated['image']=$image_name;

                }
        
                $article->update($validated);
                
                $article->categories()->attach($request['category']);

                return redirect()->route('articles.users.index', [$user->id]);

            }

            else  return redirect()->route('articles.users.index', [$user->id]);
        }
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, Article $article)
    {
        $user = Auth::user();
         
        if ($user == null) {

            return redirect()->route('articles.login-page');
 
         }

        else {

            if ($article->user->id == $user->id) {

                $article->categories()->detach();

                if (Article::where('image', $article->image)->count() === 1 ) {
                    Storage::delete( ('public/images/').$article->image );
                }

                $article->delete();

                return redirect()->route('articles.users.index', $user);

            }

        
        }

    }
    
}
