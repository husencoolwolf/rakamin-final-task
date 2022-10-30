@extends('layout.main')
@section('context')
  <a href="/articles" class="btn btn-dark my-4"><i class="bi bi-arrow-left"></i> Back To Articles</a>

  <h1>{{ $article->title }}</h1>
  <p>
    <small>In <a href="/categories/{{ $article->category->id }}">{{ $article->category->name }}</a> By
      {{ $article->user->name }}</small>
  </p>
  @if (!$article->image)
    {{-- Kalau Tidak ada value image di database, Pakai image random dengan tema sesuai category --}}
    <img src="https://source.unsplash.com/500x400?{{ $article->category->name }}" class="img-fluid"
      alt="{{ $article->category->name }}">
  @else
    {{-- Jika ada pakai image yang ada --}}
    <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid" alt="{{ $article->category->name }}">
  @endif

  <hr>
  <article class="mt-3 mb-5">
    {!! $article->content !!}
  </article>
@endsection
