<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Add other CSS files if needed -->
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="navbar-nav">
                <a class="nav-link" aria-current="page" href="/posts">Posts</a>
                <a class="nav-link" href="#">Profile</a>
            </div>
        </div>
    </nav>

    <div class="container d-flex flex-column pt-6">
        <div class="d-table-cell align-middle pt-3">
            <form action="{{ route('posts.update', $post) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="3" required>{{ $post->content }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="markdown-preview" class="form-label">Markdown Preview</label>
                    <div id="markdown-preview"></div>
                </div>

                <!-- Hidden input for category -->
                <input type="hidden" id="category" name="category" required>
                <input type="hidden" id="tags" name="tags" required>

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
                        <div class="invalid-feedback">Please select a category.</div>
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
                        <div class="invalid-feedback">Please select at least one tag.</div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update Post</button>
                
                <!-- Delete Button -->
                <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $post->id }})">Delete Post</button>
                <!-- Modal Delete Confirmation -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this post?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger" onclick="deletePost()">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
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
            // Add event listener to handle click on tag
            a.addEventListener('click', function() {
                toggleTag(tag);
            });
            li.appendChild(a);
            tagsMenu.appendChild(li);
        });

        // Update the category dropdown button text
        const categoryDropdownButton = document.getElementById('categoryDropdown');
        categoryDropdownButton.textContent = category.charAt(0).toUpperCase() + category.slice(1).replace('_', ' ');
        }

        function toggleTag(tag) {
            const tagsInput = document.getElementById('tags');
            let currentTags = tagsInput.value ? tagsInput.value.split(',') : [];
            const index = currentTags.indexOf(tag);
            if (index === -1) {
                // Add tag if not already selected
                currentTags.push(tag);
            } else {
                // Remove tag if already selected
                currentTags.splice(index, 1);
            }
            tagsInput.value = currentTags.join(',');
            
            // Update the tags dropdown button text
            const tagsDropdownButton = document.getElementById('tagsDropdown');
            tagsDropdownButton.textContent = currentTags.length > 0 ? currentTags.join(', ') : 'Select Tags';
        }

        function addTag(tag) {
            const tagsInput = document.getElementById('tags');
            let currentTags = tagsInput.value ? tagsInput.value.split(',') : [];
            if (!currentTags.includes(tag)) {
                currentTags.push(tag);
            }
            tagsInput.value = currentTags.join(',');
            
            // Update the tags dropdown button text
            const tagsDropdownButton = document.getElementById('tagsDropdown');
            tagsDropdownButton.textContent = currentTags.join(', ');
        }

        function updateMarkdownPreview(content) {
            const markdownPreview = document.getElementById('markdown-preview');
            markdownPreview.innerHTML = marked(content);
        }

        function validateTags() {
            const tagsInput = document.getElementById('tags');
            const currentTags = tagsInput.value ? tagsInput.value.split(',') : [];

            if (currentTags.length === 0) {
                alert("Please select at least one tag.");
                return false; // Prevent form submission
            }

            return true; // Allow form submission
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/showdown/dist/showdown.min.js"></script>
    <script>
        // Initialize Showdown.js converter
        const converter = new showdown.Converter();

        // Function to update the markdown preview
        function updatePreview() {
            const markdownInput = document.getElementById('content').value;
            const htmlOutput = converter.makeHtml(markdownInput);
            document.getElementById('markdown-preview').innerHTML = htmlOutput;
        }

        // Update preview when content changes
        document.getElementById('content').addEventListener('input', updatePreview);

        // Initial preview update
        updatePreview();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        let postIdToDelete = null;

        function confirmDelete(postId) {
            postIdToDelete = postId;
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            deleteModal.show();
        }

        function deletePost() {
            axios.post(`/posts/${postIdToDelete}`, {
                _method: 'DELETE'
            }, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                window.location.href = '/posts';
            })
            .catch(error => {
                console.error('Error deleting post:', error);
            })
            .finally(() => {
                const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
                deleteModal.hide();
            });
        }
    </script>
</body>
</html>
