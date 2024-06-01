<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .dropdown-menu {
            max-height: 200px;
            overflow-y: auto;
        }
        .dropdown-menu a {
            padding: 8px 15px;
        }
        .dropdown-menu a:hover {
            background-color: #f1f1f1;
        }
        .dropdown-toggle::after {
            margin-left: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="container d-flex flex-column pt-6">
        <div class="d-table-cell align-middle pt-3">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                </div>

                <!-- Hidden input for category -->
                <input type="hidden" id="category" name="category" required>

                <!-- Category Button -->
                <div class="mb-3">
                    <div class="dropdown">
                        <button class="btn btn-danger dropdown-toggle" type="button" id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Select Category
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="categoryDropdown" id="category-menu">
                            <li><a class="dropdown-item" href="#" onclick="filterTags('sport')">Sport</a></li>
                            <li><a class="dropdown-item" href="#" onclick="filterTags('pendidikan')">Pendidikan</a></li>
                            <li><a class="dropdown-item" href="#" onclick="filterTags('teknologi')">Teknologi</a></li>
                            <li><a class="dropdown-item" href="#" onclick="filterTags('berita_terkini')">Berita Terkini</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Tags Button -->
                <div class="mb-3">
                    <div class="dropdown">
                        <button class="btn btn-danger dropdown-toggle" type="button" id="tagsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Select Tags
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="tagsDropdown" id="tags-menu">
                            <!-- Tags will be populated here based on the category -->
                        </ul>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Create Post</button>
            </form>
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

        function filterTags(category) {
            // Update hidden input with selected category
            document.getElementById('category').value = category;

            const tagsMenu = document.getElementById('tags-menu');
            tagsMenu.innerHTML = ''; // Clear previous tags

            tags[category].forEach(tag => {
                const li = document.createElement('li');
                const a = document.createElement('a');
                a.className = 'dropdown-item';
                a.href = '#';
                a.textContent = tag;
                li.appendChild(a);
                tagsMenu.appendChild(li);
            });

            // Update the category dropdown button text
            const categoryDropdownButton = document.getElementById('categoryDropdown');
            categoryDropdownButton.textContent = category.charAt(0).toUpperCase() + category.slice(1).replace('_', ' ');
        }
    </script>
</body>
</html>
