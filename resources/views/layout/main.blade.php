<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1e1e5779b9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/app.min.css">
    <link rel="stylesheet" href="/css/demo.css">
</head>

<body>
    <main>
        <div class="container">
        @yield('content')        
        </div>
    </main>
</body>

</html>