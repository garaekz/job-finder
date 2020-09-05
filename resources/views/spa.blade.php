@php
$config = [
    'appName' => config('app.name'),
    'locale' => $locale = app()->getLocale(),
    'locales' => config('app.locales'),
    'githubAuth' => config('services.github.client_id'),
];
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="/images/fav.png" type="image/gif" sizes="64x64">

  <title>{{ config('app.name') }}</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&display=swap&subset=latin-ext" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}">
</head>
<body>
  <div id="app"></div>

  {{-- Global configuration object --}}
  <script>
    window.config = @json($config);
  </script>

  {{-- Load the application scripts --}}
  <script src="{{ mix('dist/js/app.js') }}"></script>
  <script src="{{ mix('dist/js/custom.js') }}"></script>
</body>
</html>
