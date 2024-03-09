<!DOCTYPE html>
<html>
<head>
    <title>{{ $videoTitle }}</title>
</head>
<body>
    <h1>{{ $videoTitle }}</h1>
    <p>{{ $videoDescription }}</p>
    <img src="{{ $videoThumbnail }}" alt="{{ $videoTitle }}" width="320" height="180">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0" allowfullscreen></iframe>
</body>
</html>
