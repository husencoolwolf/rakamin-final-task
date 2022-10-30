@extends('layout.main')
@section('context')
  @if ($article->count())
    <div class="row">
      @foreach ($article as $art)
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.5)">
              <a class="text-white text-decoration-none"
                href="/categories/{{ $art->category->id }}">{{ $art->category->name }}</a>
            </div>
            @if ($art->image)
              {{-- Kalau Tidak ada value image di database, Pakai image random dengan tema sesuai category --}}
              <img src="{{ asset('storage/' . $art->image) }}" class="card-img-top" alt="{{ $art->category->name }}">
            @else
              {{-- Jika ada pakai image yang ada --}}
              <img src="https://source.unsplash.com/500x400?{{ $art->category->name }}" class="card-img-top"
                alt="{{ $art->category->name }}">
            @endif
            <div class="card-body">
              <h5 class="card-title">{{ $art->title }}</h5>
              {{-- Pakai Str::limit ambil 150 karakter dari artikel content --}}
              <p class="card-text">{{ Str::limit(strip_tags($art->content), 150, '...') }}</p>
              <a href="/articles/{{ $art->id }}" class="btn btn-dark">Read More</a>
            </div>
          </div>

        </div>
      @endforeach
    </div>
    {{-- //pakai paginator dari laravel --}}
    {{ $article->links() }}
  @else
    <h1>No Articles Found!</h1>
  @endif
@endsection
