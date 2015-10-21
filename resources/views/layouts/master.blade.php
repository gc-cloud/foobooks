<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'Foobooks' --}}
        @yield('title','Foobooks')
    </title>

    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap Latest compiled and minified CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/cerulean/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/foobooks.css" type='text/css'>
    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

</head>
<body>

    <header>

      <a href="/">
        <img src="http://making-the-internet.s3.amazonaws.com/laravel-foobooks-logo@2x.png" style="width:300px" alt="Foobooks Logo">
      </a>

        <nav class="navbar navbar-default">
          <ul class="nav navbar-nav">
           <li>{!! HTML::link('http://foobooks.localhost/books/show/', 'Show Books')!!}</li>
           <li>{!! HTML::link('http://foobooks.localhost/books', 'Books Index')!!}</li>
           <li>{!! HTML::link('http://foobooks.localhost/books/create', 'Books Create')!!}</li>
           <li>{!! HTML::link('http://foobooks.localhost/logs', 'Logs')!!}</li>
          </ul>
      </nav>
    </header>

    <section>
      <div class="container jumbotron">
        {{-- Main page content will be yielded here --}}
        @yield('content')
      </div>
    </section>

    <footer>
        &copy; {{ date('Y') }}
    </footer>

    @yield('body')

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>
