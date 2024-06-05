<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .search-container {
            position: relative;
        }

        .search-container input[type="search"] {
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .search-container input[type="search"]:hover {
            border-color: #80bdff;
        }

        .search-container input[type="search"]:focus {
            border-color: #80bdff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            float: left;
            min-width: 100%;
            padding: 0.5rem 0;
            margin: 0.125rem 0 0;
            font-size: 1rem;
            color: #212529;
            text-align: left;
            list-style: none;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, 0.15);
            border-radius: 0.25rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.175);
            max-height: 200px;
            overflow-y: auto;
        }

        .dropdown-menu.show {
            display: block;
        }

        .dropdown-item {
            display: block;
            width: 100%;
            padding: 0.25rem 1.5rem;
            clear: both;
            font-weight: 400;
            color: #212529;
            text-align: inherit;
            white-space: nowrap;
            background-color: transparent;
            border: 0;
        }

        .dropdown-item:hover {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="#">Posts</a>
                <a class="nav-link" href="#">Profile</a>
            </div>
            <form class="d-flex ms-auto search-container" role="search" onsubmit="event.preventDefault(); addSearchHistory(); filterPosts();">
                <input class="form-control me-2" type="search" id="searchInput" placeholder="Search" aria-label="Search" oninput="showSearchSuggestions()">
                <ul class="dropdown-menu" id="searchSuggestions"></ul>
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
    
    <!-- Filter Category & Tags Start -->
    <div class="container d-flex flex-column">
        <div class="d-table-cell align-middle pt-3">
            <!-- Title "Posts" -->
            <h3>Posts</h3>
            
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-start">
                        <div class="col">
                            <!-- Category Dropdown -->
                            <div class="mt-3">
                                <label for="postCategory" class="form-label">Category</label>
                                <select class="form-select" id="postCategory" aria-label="Post Category" onchange="updateTagsAndFilterPosts()">
                                    <option value="all" selected>All</option>
                                    <option value="sport">Sport</option>
                                    <option value="pendidikan">Pendidikan</option>
                                    <option value="teknologi">Teknologi</option>
                                    <option value="berita_terkini">Berita Terkini</option>
                                </select>
                            </div>
                        </div> <!-- Col End --> 
                        
                        <!-- Tags Dropdown -->
                        <div class="col">
                            <div class="mt-3">
                                <label for="postTags" class="form-label">Tags</label>
                                <select class="form-select" id="postTags" aria-label="Post Tags" onchange="filterPosts()">
                                    <option value="all" selected>All</option>
                                    <!-- Options will be dynamically populated based on category -->
                                </select>
                            </div>
                        </div>
                    </div> <!-- Row End -->
                </div>
            </div> <!-- Card End -->
            
    <!-- Filter Category & Tags End -->
    
    <div class="container d-flex flex-column">
        <div class="d-table-cell align-middle pt-3">
            <div id="posts-container">
                @foreach ($posts as $post)
                    <div class="card mb-3 post-card" data-category="{{ $post->category }}" data-tags="{{ $post->tags }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->content }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <p id="no-posts-message" class="text-center mt-3" style="display: none;">Post yang kamu cari tidak ada T_T</p>
        </div>
    </div>
        <!-- Card Blog -->
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        const tags = {
            sport: ['Football', 'Basketball', 'Olympics'],
            pendidikan: ['Education Policy', 'E-learning', 'EdTech'],
            teknologi: ['AI', 'Gadgets', 'Software Updates'],
            berita_terkini: ['Breaking News', 'Politics', 'Global Events']
        };

        function updateTagsAndFilterPosts() {
            const selectedCategory = document.getElementById('postCategory').value;
            const tagsDropdown = document.getElementById('postTags');
            tagsDropdown.innerHTML = '<option value="all" selected>All</option>';

            if (selectedCategory !== 'all' && tags[selectedCategory]) {
                tags[selectedCategory].forEach(tag => {
                    const option = document.createElement('option');
                    option.value = tag;
                    option.textContent = tag;
                    tagsDropdown.appendChild(option);
                });
            }

            filterPosts();
        }

        function filterPosts() {
            const selectedCategory = document.getElementById('postCategory').value;
            const selectedTag = document.getElementById('postTags').value;
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const postCards = document.querySelectorAll('.post-card');
            let visiblePostsCount = 0;

            postCards.forEach(card => {
                const cardCategory = card.getAttribute('data-category');
                const cardTags = card.getAttribute('data-tags').split(',');
                const cardTitle = card.querySelector('.card-title').textContent.toLowerCase();
                const cardContent = card.querySelector('.card-text').textContent.toLowerCase();

                const categoryMatch = (selectedCategory === 'all' || cardCategory === selectedCategory);
                const tagMatch = (selectedTag === 'all' || cardTags.includes(selectedTag));
                const searchMatch = (cardTitle.includes(searchInput) || cardContent.includes(searchInput));

                if (categoryMatch && tagMatch && searchMatch) {
                    card.style.display = 'block';
                    visiblePostsCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            const noPostsMessage = document.getElementById('no-posts-message');
            if (visiblePostsCount === 0) {
                noPostsMessage.style.display = 'block';
            } else {
                noPostsMessage.style.display = 'none';
            }
        }

        function addSearchHistory() {
            const searchInput = document.getElementById('searchInput').value.trim();
            if (!searchInput) return;

            let searchHistory = JSON.parse(localStorage.getItem('searchHistory')) || [];
            if (!searchHistory.includes(searchInput)) {
                searchHistory.push(searchInput);
                localStorage.setItem('searchHistory', JSON.stringify(searchHistory));
            }
        }

        function showSearchSuggestions() {
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            let searchHistory = JSON.parse(localStorage.getItem('searchHistory')) || [];
            const suggestionsDropdown = document.getElementById('searchSuggestions');
            suggestionsDropdown.innerHTML = '';

            if (searchInput) {
                const filteredSuggestions = searchHistory.filter(item => item.toLowerCase().includes(searchInput));
                filteredSuggestions.forEach(suggestion => {
                    const suggestionItem = document.createElement('li');
                    suggestionItem.className = 'dropdown-item';
                    suggestionItem.textContent = suggestion;
                    suggestionItem.onclick = () => {
                        document.getElementById('searchInput').value = suggestion;
                        filterPosts();
                        suggestionsDropdown.style.display = 'none';
                    };
                    suggestionsDropdown.appendChild(suggestionItem);
                });

                suggestionsDropdown.style.display = filteredSuggestions.length ? 'block' : 'none';
            } else {
                suggestionsDropdown.style.display = 'none';
            }
        }

        document.addEventListener('click', function(event) {
            const suggestionsDropdown = document.getElementById('searchSuggestions');
            if (!suggestionsDropdown.contains(event.target) && !document.getElementById('searchInput').contains(event.target)) {
                suggestionsDropdown.style.display = 'none';
            }
        });
    </script>
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 2000 // millisecond
                });
            });
        </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
