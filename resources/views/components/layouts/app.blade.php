<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv=”X-UA-Compatible” content=”ie=edge”>
    <title>BroobeChallenge - {{ $title ?? '' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Default meta description' }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<x-layouts.navigation />

{{ $slot }}

</body>
</html>