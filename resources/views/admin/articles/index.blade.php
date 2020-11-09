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
              <a href="{{ route("admin.articles.show", $article->slug) }}" class="btn btn-primary">Mostra</a>
              <a href="#" class="btn btn-warning mt-2 mb-2">Modifica</a>
              <a href="#" class="btn btn-danger">Cancella</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
