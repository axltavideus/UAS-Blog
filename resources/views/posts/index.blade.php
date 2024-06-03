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
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="#">Posts</a>
                <a class="nav-link" href="#">Profile</a>
            </div>
            <form class="d-flex ms-auto" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <!-- Navbar end -->

    <div class="container d-flex flex-column">
        <div class="d-table-cell align-middle pt-3">
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
        </div>
    </div>
    <!-- Card End -->

    <div class="container d-flex flex-column">
        <div class="d-table-cell align-middle pt-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="card-link">Card link</a>
            </div>
        </div>
        <!-- Card Blog -->
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>