@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>{{ $article->title }}</h1>
    @if ($article->image != null)
      <div>
        <img src="{{asset("storage/". $article->image)}}" alt="{{ $article->title }}">
      </div>
    @endif
    <div>{{ $article->content }}</div>
    <div class="col-2 offset-10">
      <a href="{{ route('admin.articles.index') }}">Torna all'indice</a>
    </div>
  </div>
@endsection
