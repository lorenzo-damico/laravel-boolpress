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
              <a href="{{ route('articles.show', $article->slug) }}" class="stretched-link btn btn-primary mt-4">Vai all'articolo</a>
            </div>
              @if ($article->image != null)
                <div class="col-auto d-none d-lg-block">
                  <img src="{{ asset("storage/". $article->image) }}" alt="{{ $article->title }}">
                </div>
              @endif
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
