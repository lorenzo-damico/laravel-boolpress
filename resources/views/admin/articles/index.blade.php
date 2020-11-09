@extends('layouts.app')

@section('content')
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Titolo</th>
          <th scope="col">Slug</th>
          <th scope="col">Contenuto</th>
          <th scope="col">Azioni</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($articles as $article)
          <tr>
            <td>{{ $article->title }}</td>
            <td>{{ $article->slug }}</td>
            <td>{{ $article->content }}</td>
            <td>
              <a href="{{ route("articles.show", $article) }}">Mostra</a>
              <a href="#">Modifica</a>
              <a href="#">Cancella</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
