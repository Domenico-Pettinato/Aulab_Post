<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function dashboard()
    {
        $unrevisonedArticles = Article::where('is_accepted', null)->get();
        $acceptedArticles = Article::where('is_accepted', true)->get();
        $rejectedArticles = Article::where('is_accepted', false)->get();

        return view('revisor.dashboard', compact('unrevisonedArticles', 'acceptedArticles', 'rejectedArticles'));
    }

    public function acceptArticle(Article $article)
    {
        $article->is_accepted = true;
        $article->save();
        return redirect()->route('revisor.dashboard')->with('message', "Articolo $article->title accettato con successo");
    }

    public function rejectArticle(Article $article)
    {
        $article->is_accepted = false;
        $article->save();
        return redirect()->route('revisor.dashboard')->with('message', "Articolo $article->title rifiutato con successo");
    }

    public function undoArticle(Article $article)
    {
        $article->is_accepted = null;
        $article->save();
        return redirect()->route('revisor.dashboard')->with('message', "Articolo $article->title riportato in revisione");
    }
}
