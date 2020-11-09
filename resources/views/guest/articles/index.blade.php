@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Articoli</h1>
    <div class="row mb-2">
      @foreach ($articles as $article)
        <div class="col-md-6">
          <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-primary">{{ $article->user->name }}</strong>
              <h3 class="mb-0">{{ $article->title }}</h3>
              <a href="{{ route('articles.show', $article->slug) }}" class="stretched-link btn btn-primary">Vai all'articolo</a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
