<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WriterController extends Controller
{
    public function dashboard()
    {
        // Verifica che l'utente sia autenticato
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Devi essere autenticato per accedere al dashboard.');
        }

        // Recupera gli articoli dell'utente autenticato
        $articles = Auth::user()->articles()->orderBy('created_at', 'desc')->get();

        // Filtra gli articoli per stato di revisione
        $acceptedArticles = $articles->where('is_accepted', true);
        $rejectedArticles = $articles->where('is_accepted', false);
        $unrevisonedArticles = $articles->where('is_accepted', null);

        // Ritorna la vista
        return view('writer.dashboard', compact('unrevisonedArticles', 'acceptedArticles', 'rejectedArticles'));
    }
}


