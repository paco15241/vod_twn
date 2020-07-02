<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('pageTitle')</title>
  <link href="https://fonts.googleapis.com/css?family=Noto+Sabs+TC|Open+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <section class="container">
    @yield('content')
  </section>
  <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>
