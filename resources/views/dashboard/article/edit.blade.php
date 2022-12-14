@extends('layout.dashboard')

@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Articles</h1>
  </div>
  <div class="col-lg-8">
    <form method="post" action="/dashboard/articles/{{ $article->id }}" class="mb-5" enctype="multipart/form-data">
      @method('put')
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control @error('title')
          is-invalid
        @enderror" id="title"
          name="title" value="{{ old('title', $article->title) }}" required>
        @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="category_id">Category</label>
        <select name="category_id" class="form-select @error('category_id')
          is-invalid
        @enderror"
          required>
          <option value="" selected>Choose Category</option>
          @foreach ($categories as $category)
            @if (old('category_id', $article->category_id) == $category->id)
              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
            @else
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endif
          @endforeach
        </select>
        @error('category_id')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="image">Image</label>
        <input type="hidden" name="oldImage" value="{{ $article->image }}">
        <img src="{{ asset('storage/' . $article->image) }}" class="my-3 img-fluid col-sm-5 d-block" id="imagePreview">
        <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image"
          accept="image/png, image/jpeg, image/bmp">
        @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        @error('content')
          <p class="text-danger">{{ $message }}</p>
        @enderror
        <input id="content" type="hidden" name="content" value="{{ old('content', $article->content) }}">
        <trix-editor input="content"></trix-editor>
      </div>
      <button type="submit" class="btn btn-primary">Update Article</button>
    </form>
  </div>

  <script>
    $(document).ready(function() {
      window.addEventListener("trix-file-accept", function(event) {
        event.preventDefault();
        alert("File attachment not supported!");
      });

      $('#image').change(function() {
        const file = this.files[0];
        if (file) {
          let reader = new FileReader();
          reader.onload = function(event) {
            $('#imagePreview').attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
      });
    });
  </script>
@endsection
