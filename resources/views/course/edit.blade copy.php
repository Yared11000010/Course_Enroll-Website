<!-- resources/views/video/show.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Player</title>
    <!-- Include Playr CSS -->
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
</head>
<body>
    <div>
        <video id="player" playsinline controls data-poster="/path/to/poster.jpg">
            <source src="{{ $videoPath }}" type="video/mp4" />
        </video>
    </div>

    <!-- Include Playr JavaScript -->
    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
</body>
</html>
