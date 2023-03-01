<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'つぶやき' }}</title>
    <link rel="stylesheet" href="/css/app.css">
    @stack('css')
</head>

<body class="bg-grey-50">
  {{ $slot }}
</body>

</html>
