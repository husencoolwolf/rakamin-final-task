<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Dashboard Blog Sederhana</title>

  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  {{-- Jquery Core JS --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    .trix-button-group--file-tools {
      display: none !important;
    }


    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="/css/dashboard.css" rel="stylesheet">
  {{-- trix editor --}}
  <link href="/css/trix.css" rel="stylesheet">

</head>

<body>

  @include('part.dashboard.header')

  @include('part.dashboard.navbar')
  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    @yield('main')
  </main>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  {{-- Bootstrap dashboard js --}}
  <script src="/js/dashboard.js"></script>
  {{-- Trix editor JS --}}
  <script src="/js/trix.js"></script>
</body>

</html>
