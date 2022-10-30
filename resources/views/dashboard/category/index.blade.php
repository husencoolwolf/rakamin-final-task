@extends('layout.dashboard')
@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Categories</h1>
  </div>
  @if (session('success'))
    <div class="alert alert-success my-3">
      {{ session('success') }}
    </div>
  @endif
  <div class="table-responsive col-lg-9">
    <a href="/dashboard/categories/create" class="btn btn-primary my-3"><span data-feather="plus-circle"></span> Create New
      Category</a>
    <table class="table table-hover table-sm">
      <thead>
        <tr>
          <th>No.</th>
          <th>ID</th>
          <th>Category</th>
          <th>Creator</th>
          <th>Action</th>
        </tr>
      </thead>
      @foreach ($categories as $category)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $category->id }}</td>
          <td>{{ $category->name }}</td>
          <td>{{ $category->user->name }}</td>
          <td>
            <a href="/dashboard/categories/{{ $category->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
            @if ($category->user_id == auth()->user()->id)
              <a href="/dashboard/categories/{{ $category->id }}/edit" class="badge bg-success"><span
                  data-feather="edit"></span></a>
            @endif
          </td>
        </tr>
      @endforeach
    </table>
  </div>
@endsection
