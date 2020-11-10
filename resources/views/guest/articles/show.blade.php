@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>{{ $article->title }}</h1>
    <div>{{ $article->content }}</div>
    <div class="col-2 offset-10">
      <a href="{{ route('articles.index') }}">Torna all'indice</a>
    </div>
  </div>
@endsection