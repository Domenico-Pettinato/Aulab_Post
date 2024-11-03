<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Exception;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::orderby('created_at', 'desc')->paginate(4);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'body' => 'required|min:3', 
            'image' => 'required',
        ]);
        

        $article = Article::create([
            'title' => $request->title,
            'category_id' => $request->category,  // richiama la category con il nome
            'body' => $request->body,
            'image' => $request->image,
            
        ]);

        // Store the image if it was uploaded
        // if ($request->hasFile('image')) {
        //     $article->image = $request->file('image')->store('public/images');
        //     $article->save();
        // }

        return redirect()->route('articles.index')->with('message', 'Article created successfully');
    }



    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact(['article']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }

    public function byCategory(Category $category)
    {
        $articles = $category->articles()->orderby('created_at', 'desc')->get();
        return view('articles.bycategory', compact('category', 'articles'));
    }

    public function byUser(User $user)
    {
        $articles = $user->articles()->orderby('created_at', 'desc')->get();
        return view('articles.byuser', compact('user', 'articles'));
    }

    public static function middleware()
    {
        return [
            new Middleware ('auth', except: ['index', 'show', 'byCategory', 'byUser'])
        ];
    }
}
