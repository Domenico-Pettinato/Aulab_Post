<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class PublicController extends BaseController
{
    // public function __construct()
    // {
    //     // Applica il middleware "auth" a tutte le rotte eccetto "homepage"
    //     $this->middleware('auth')->except(['homepage']);
    // }


    public function homepage()
    {
        $articles = Article::where('is_accepted', true)->orderby('created_at', 'desc')->paginate(6);
        return view('welcome', compact('articles'));
    }

    public function candidature()
    {
        return view('candidature');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'role' => 'required|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|max:255',
        ]);

        return redirect()->route('homepage')->with('message', 'Candidatura inviata con successo!');
    }
}
