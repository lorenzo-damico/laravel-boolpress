@extends('layouts.app')

@section('content')
  <div class="container">
    @if ($article->image != null)
      <div>
        <img src="{{asset("storage/". $article->image)}}" alt="{{ $article->title }}">
      </div>
    @endif
    <h1>{{ $article->title }}</h1>
    <div>{{ $article->content }}</div>
    <div class="col-2 offset-10">
      <a href="{{ route('admin.articles.index') }}">Torna all'indice</a>
    </div>
  </div>
@endsection
