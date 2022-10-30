@extends('layout.dashboard')

@section('main')
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h2>{{ $article->title }}</h2>

        <div class="action-button">
          <a href="/dashboard/articles" class="btn btn-success">
            <span data-feather="arrow-left"></span> Back to My Articles
          </a>
          <a href="/dashboard/articles/{{ $article->id }}/edit" class="btn btn-warning">
            <span data-feather="edit"></span> Edit
          </a>
          <form action="/dashboard/articles/{{ $article->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger" onclick="return confirm('Are you sure to delete this article?')">
              <span data-feather="x-circle"></span> Delete
            </button>
          </form>

        </div>
        @if ($article->image)
          <img class="img-fluid my-4" src="{{ asset('storage/' . $article->image) }}"
            alt="{{ $article->category->name }}">
        @else
          <img class="img-fluid my-4" src="https://source.unsplash.com/1200x400?{{ $article->category->name }}"
            alt="{{ $article->category->name }}">
        @endif
        <article>
          <p>{!! $article->content !!}</p>
        </article>

        <a href="/dashboard/articles" class="btn btn-success my-3">
          <span data-feather="arrow-left"></span> Back to My Articles
        </a>
        {{--  
          simbol {{  }} : digunakan print string secara escape (tag html gak bisa dipake)  
          Simbol {!!  !!} : diguanakn print tanpa escape, bisa mengguakan tag html pada string menjadi perintah html
        --}}
      </div>
    </div>
  </div>
@endsection
