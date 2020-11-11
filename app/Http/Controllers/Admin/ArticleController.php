<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Mail;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();

        $articles = Article::where('user_id', $user_id)->get();

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255|unique:articles',
            'content' => 'required',
            'image' => 'image|dimensions:width=200,height=250'
        ]);

        $user_id = Auth::id();

        $newArticle = new Article();

        $newArticle->user_id = $user_id;
        $newArticle->title = $data["title"];
        $newArticle->slug = $data["slug"];
        $newArticle->content = $data["content"];

        if (empty($data["image"]) == false) {
          $file_name = $request->file('image')->getClientOriginalName();

          $path = $request->file('image')->storeAs(
            "images/". $user_id,
            $file_name,
            "public"
          );

          $newArticle->image = $path;
        }
        
        $newArticle->save();

        Mail::to($newArticle->user->email)->send(new SendNewMail($newArticle));

        return redirect()->route('admin.articles.show', $newArticle->slug);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $article = Article::where('user_id', Auth::id())->where('slug', $slug)->first();

        if ($article == null) {
          abort(404);
        }

        return view('admin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $article = Article::where('user_id', Auth::id())->where('slug', $slug)->first();

        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $data = $request->all();

      $validatedData = $request->validate([
          'title' => 'required|max:255',
          'slug' => [
            'required',
            'max:255',
            Rule::unique('articles')->ignore($id)
          ],
          'content' => 'required',
          'image' => 'image|dimensions:width=200,height=250'
      ]);

      $user_id = Auth::id();

      $article = Article::find($id);

      $article->title = $data["title"];
      $article->slug = $data["slug"];
      $article->content = $data["content"];

      if (empty($data["image"]) == false) {
        $file_name = $request->file('image')->getClientOriginalName();

        $path = $request->file('image')->storeAs(
          "images/". $user_id,
          $file_name,
          "public"
        );

        $article->image = $path;

      } else {

        $article->image = null;
      }

      $article->update();

      return redirect()->route('admin.articles.show', $article->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
      $article = Article::where('slug', $slug)->first();

      $article->delete();

      return redirect()->route('admin.articles.index');
    }
}
