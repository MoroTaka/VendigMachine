<!doctype html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
        <link rel="stylesheet" href="{{asset('css/style.css')}}" >

    </head>
    <body>
   
        
       @yield('content')
 
       <script src="{{asset('js/first.js')}}"></script>
    </body>
</html>