<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Task Managment Application</title>
    <link rel="stylesheet" href="/css/welcome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body class="antialiased">
    <div class="bg"></div>
    <div class="welcome" style="background-color: black;">
    </div>
    <div class="welcome text typewriter ">
        <h1 style="font-size: 80px;"> Welcome </h1>
        <h3>to</h3>
        <h4>!! Task Managment appication !!</h4>
    </div>
    <div class="auth">
        <a href="/login" class="button">I am Login😉</a>&nbsp;&nbsp;&nbsp;
        <a href="/register" class="button">I am register😎</a>
    </div>
</body>

</html>
