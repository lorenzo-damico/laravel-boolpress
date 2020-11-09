<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function index() {

      $articles = Article::all();

      return view('guest.articles.index', compact('articles'));
    }

    public function show($slug) {

      $article = Article::where('slug', $slug)->first();

      return view('guest.articles.show', compact('article'));
    }
}
