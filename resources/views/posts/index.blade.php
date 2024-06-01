<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
</head>
<body>
    <div class="card">
        <div class="card-header">
            Make a New post!
        </div>

        <div class="card-body">
            <h5 class="card-title">Make a new blog post</h5>
            <p class="card-text">Press the button below to make a new blog post</p>
            <a href="{{ route('posts.create') }}" class="btn btn-primary">New Post</a>
            @if ($message = Session::get('success'))
                <p>{{ $message }}</p>
            @endif
        </div>
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>