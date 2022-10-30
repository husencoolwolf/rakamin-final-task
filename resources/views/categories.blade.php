@extends('layout.main')

@section('context')
  <div class="row">
    @foreach ($categories as $category)
      <div class="col-md-4">
        <a href="/categories/{{ $category->id }}">
          <div class="card">
            <div class="text-white px-3 py-2" style="position: absolute;background-color: rgba(0, 0, 0, 0.5)">
              {{ $category->name }}
            </div>
            <img class="card-img-top" src="https://source.unsplash.com/500x400?{{ $category->name }}">
          </div>
        </a>
      </div>
    @endforeach
  </div>
@endsection
