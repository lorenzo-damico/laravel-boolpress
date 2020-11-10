@extends('layouts.app')

@section('content')
  <div class="container">

    <a href="{{ route('admin.articles.index') }}" class="btn btn-danger mb-4">Torna all'indice</a>

    <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="title">Titolo</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}">
      </div>
      <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" value="{{ $article->slug }}">
      </div>
      <div class="form-group">
        <label for="content">Contenuto</label>
        <textarea class="form-control" id="content" name="content" rows="8" cols="80">{{ $article->content }}</textarea>
      </div>
      <div class="form-group">
        <label for="image">Immagine (200x250)</label>
        <input type="file" id="image" name="image" accept="image/*">
      </div>
      <button type="submit" class="btn btn-primary">Modifica</button>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

  </div>
@endsection
