<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Exception;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::where('is_accepted', true)->orderby('created_at', 'desc')->paginate(6);
        return view('articles.index', compact('articles'));
    }

    public function byCategory(Category $category)
    {
        $articles = $category->articles()->where('is_accepted', true)->orderby('created_at', 'desc')->paginate(6);
        return view('articles.bycategory', compact('category', 'articles'));
    }
    public function byUser(User $user)
    {
        $articles = $user->articles()->where('is_accepted', true)->orderby('created_at', 'desc')->paginate(6);
        return view('articles.byuser', compact('user', 'articles'));
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
        // Validazione dei dati
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
            'body' => 'required|string',
            'tags' => 'required|string',
            'image' => 'nullable|image|max:2048', // Aggiungi validazioni per l'immagine
        ]);

        // Crea l'articolo associando l'utente loggato
        $article = new Article();
        $article->title = $request->title;
        $article->category_id = $request->category;
        $article->body = $request->body;
        $article->user_id = Auth::user()->id; // Associa l'utente loggato
        $article->slug = Str::slug($request->title);

        // Gestisci l'immagine (se presente)
        if ($request->hasFile('image')) {
            $article->image = $request->file('image')->store('articles_images', 'public');
        }

        // Salva l'articolo nel database per ottenere l'ID
        $article->save();

        // Aggiungi i tag
        $tags = explode(',', $request->tags);
        foreach ($tags as $i => $tag) {
            $tags[$i] = trim($tag);
        }

        foreach ($tags as $tag) {
            // Usa updateOrCreate per creare o recuperare il tag
            $newTag = Tag::updateOrCreate([
                'name' => strtolower($tag),
            ]);

            // Associa il tag all'articolo ora che è stato salvato
            $article->tags()->attach($newTag->id);
        }

        return redirect()->route('homepage')->with('message', 'Articolo creato con successo in revisione');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        // Cerca l'articolo usando lo slug e carica i tag associati
        $article = Article::where('slug', $slug)->with('tags')->firstOrFail();
    
        return view('articles.show', compact('article'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        if (Auth::user()->id == $article->user_id) {
            return view('articles.edit', compact('article'));
        }
        return redirect()->route('homepage')->with('alert', 'Non sei autorizzato');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
            'body' => 'required|string',
            'tags' => 'required|string',
            'image' => 'nullable|image|max:2048', // Aggiungi validazioni per l'immagine
        ]);

        $article->update(
            [
                'title' => $request->title,
                'category_id' => $request->category,
                'body' => $request->body,
                'slug' => Str::slug($request->title),
            ]
        );

        //   mofifica immagine //
        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $article->update([
                'image' => $request->file('image')->store('articles_images', 'public'),
            ]);
        }

        // Aggiorna i tag
        $tags = explode(',', $request->tags);
        foreach ($tags as $i => $tag) {
            $tags[$i] = trim($tag);
        }
        $article->tags()->detach();
        foreach ($tags as $tag) {
            $newTag = Tag::updateOrCreate([
                'name' => strtolower($tag),
            ]);
            $article->tags()->attach($newTag->id);
        }
        return redirect()->route('homepage')->with('message', 'Articolo modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if (Auth::user()->id == $article->user_id) {
            foreach ($article->tags as $tag) {
                $article->tags()->detach($tag->id);
            }
            $article->delete();
            return redirect()->route('homepage')->with('message', 'Articolo cancellato con successo');
        }
        return redirect()->route('homepage')->with('alert', 'Non sei autorizzato');
    }

    public static function middleware()
    {
        return [
            new Middleware('auth', except: ['index', 'show', 'byCategory', 'byUser', 'articleSearch']),
        ];
    }

    public function articleSearch(Request $request)
    {
        $query = $request->input('query');
        $articles = Article::search($query)->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('articles.search-index', compact('articles', 'query'));
    }
}
