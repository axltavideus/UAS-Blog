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
                <a class="nav-link" href="profile">Profile</a>
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
                            <a href="{{ route('posts.show', $post->id) }}">View</a>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit</a>
                            </div>
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
    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-3">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                @if ($posts->currentPage() > 2) {{-- Jika halaman saat ini lebih besar dari 2, tampilkan tombol untuk langsung ke halaman pertama --}}
                    <li class="page-item">
                        <a class="page-link" href="{{ $posts->url(1) }}" aria-label="First">
                            <span aria-hidden="true">&laquo;&laquo;</span>
                            <span class="sr-only">First</span>
                        </a>
                    </li>
                @endif

                @if ($posts->previousPageUrl())
                    <li class="page-item">
                        <a class="page-link" href="{{ $posts->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link" aria-hidden="true">&laquo;</span>
                    </li>
                @endif
                
                @php
                    $start = max(1, $posts->currentPage() - 2);
                    $end = min($start + 4, $posts->lastPage());
                @endphp
                
                @for ($i = $start; $i <= $end; $i++)
                    <li class="page-item {{ ($posts->currentPage() == $i) ? 'active' : '' }}">
                        <a class="page-link" href="{{ $posts->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                
                @if ($posts->nextPageUrl())
                    <li class="page-item">
                        <a class="page-link" href="{{ $posts->nextPageUrl() }}" aria-label="Next">
                            <span class="sr-only">Next</span>
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link" aria-hidden="true">&raquo;</span>
                    </li>
                @endif

                @if ($posts->currentPage() < ($posts->lastPage() - 1)) {{-- Jika halaman saat ini kurang dari total halaman dikurangi 1, tampilkan tombol untuk langsung ke halaman terakhir --}}
                    <li class="page-item">
                        <a class="page-link" href="{{ $posts->url($posts->lastPage()) }}" aria-label="Last">
                            <span aria-hidden="true">&laquo;&raquo;</span>
                            <span class="sr-only">Last</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
    <!-- End Pagination -->
    </div>
    
    <script>
        const postsContainer = document.getElementById('posts-container');
        const noPostsMessage = document.getElementById('no-posts-message');
        const postCategorySelect = document.getElementById('postCategory');
        const postTagsSelect = document.getElementById('postTags');
        const posts = document.querySelectorAll('.post-card');
        const categories = {
            'sport': ['all', 'Soccer', 'Basketball', 'Tennis', 'Cricket'],
            'pendidikan': ['all', 'Sekolah', 'Kuliah', 'Belajar Online', 'Beasiswa'],
            'teknologi': ['all', 'AI', 'Blockchain', 'Cybersecurity', 'Gadget'],
            'berita_terkini': ['all', 'Politik', 'Bencana Alam', 'Kesehatan', 'Pemerintahan']
        };

        function updateTagsAndFilterPosts() {
            const selectedCategory = postCategorySelect.value;
            const tags = categories[selectedCategory] || ['all'];
            
            postTagsSelect.innerHTML = tags.map(tag => `<option value="${tag}">${tag}</option>`).join('');
            filterPosts();
        }

        function filterPosts() {
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const selectedCategory = postCategorySelect.value;
            const selectedTag = postTagsSelect.value;

            let visiblePostsCount = 0;

            posts.forEach(post => {
                const postCategory = post.getAttribute('data-category');
                const postTags = post.getAttribute('data-tags').split(',').map(tag => tag.trim());

                const matchesSearch = post.querySelector('.card-title').textContent.toLowerCase().includes(searchInput) || 
                                      post.querySelector('.card-text').textContent.toLowerCase().includes(searchInput);

                const matchesCategory = selectedCategory === 'all' || postCategory === selectedCategory;
                const matchesTag = selectedTag === 'all' || postTags.includes(selectedTag);

                if (matchesSearch && matchesCategory && matchesTag) {
                    post.style.display = 'block';
                    visiblePostsCount++;
                } else {
                    post.style.display = 'none';
                }
            });

            noPostsMessage.style.display = visiblePostsCount === 0 ? 'block' : 'none';
        }

        function addSearchHistory() {
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            let searchHistory = JSON.parse(localStorage.getItem('searchHistory')) || [];
            if (searchInput && !searchHistory.includes(searchInput)) {
                searchHistory.unshift(searchInput);
                if (searchHistory.length > 5) {
                    searchHistory.pop();
                }
                localStorage.setItem('searchHistory', JSON.stringify(searchHistory));
            }
            showSearchSuggestions();
        }

        function showSearchSuggestions() {
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const searchHistory = JSON.parse(localStorage.getItem('searchHistory')) || [];
            const filteredSuggestions = searchHistory.filter(item => item.includes(searchInput));

            const suggestionsDropdown = document.getElementById('searchSuggestions');
            if (filteredSuggestions.length > 0 && searchInput) {
                suggestionsDropdown.innerHTML = filteredSuggestions.map(suggestion => 
                    `<li class="dropdown-item" onclick="selectSuggestion('${suggestion}')">${suggestion}</li>`).join('');
                suggestionsDropdown.classList.add('show');
            } else {
                suggestionsDropdown.classList.remove('show');
            }
        }

        function selectSuggestion(suggestion) {
            document.getElementById('searchInput').value = suggestion;
            filterPosts();
            document.getElementById('searchSuggestions').classList.remove('show');
        }

        document.addEventListener('click', function(event) {
            const suggestionsDropdown = document.getElementById('searchSuggestions');
            if (!event.target.closest('.search-container')) {
                suggestionsDropdown.classList.remove('show');
            }
        });

        window.addEventListener('DOMContentLoaded', function() {
            updateTagsAndFilterPosts();
            showSearchSuggestions();
        });
    </script>
</body>
</html>
