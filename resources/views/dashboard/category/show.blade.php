@extends('layout.dashboard')
@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Articles In {{ $category->name }}</h1>
  </div>
  @if (session('success'))
    <div class="alert alert-success my-3">
      {{ session('success') }}
    </div>
  @endif
  @if ($articles->count())
    <div class="table-responsive col-lg-9">
      <a href="/dashboard/categories" class="btn btn-dark my-3"><span data-feather="arrow-left"></span> Back To
        Categories</a>
      <table class="table table-hover table-sm">
        <thead>
          <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Category</th>
            <th>Action</th>
          </tr>
        </thead>
        @foreach ($articles as $article)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $article->title }}</td>
            <td>{{ $article->category->name }}</td>
            <td>
              <a href="/dashboard/articles/{{ $article->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
              <a href="/dashboard/articles/{{ $article->id }}/edit" class="badge bg-success"><span
                  data-feather="edit"></span></a>
              <form action="/dashboard/articles/{{ $article->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" class="badge bg-danger border-0"
                  onclick="return confirm('Are you sure to delete this article?')">
                  <span data-feather="x-circle"></span>
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </table>
      {{-- paginator --}}
      {{ $articles->links() }}
    </div>
  @else
    <h1>No Articles in this category yet!</h1>
  @endif

@endsection
