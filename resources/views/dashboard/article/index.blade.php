@extends('layout.dashboard')
@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Articles</h1>
  </div>
  @if (session('success'))
    <div class="alert alert-success my-3">
      {{ session('success') }}
    </div>
  @endif
  <div class="table-responsive col-lg-9">
    <a href="/dashboard/articles/create" class="btn btn-primary my-3"><span data-feather="plus-circle"></span> Create New
      Article</a>
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
@endsection
