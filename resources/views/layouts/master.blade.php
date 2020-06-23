<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('pageTitle')</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <section class="container">
    @yield('content')
  </section>
  <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>
