@extends('layouts.app')

@section('content')
  <div class="container">
    <a href="{{ route("admin.articles.create") }}" class="btn btn-success mb-4">Scrivi un nuovo articolo</a>
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
              <a href="{{ route("admin.articles.show", $article->slug) }}" class="btn btn-primary btn-block">Mostra</a>
              <a href="#" class="btn btn-warning mt-2 mb-2 btn-block">Modifica</a>

              <form action="{{ route('admin.articles.destroy', $article->slug) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" name="delete" class="btn btn-danger btn-block">Cancella</button>

              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
