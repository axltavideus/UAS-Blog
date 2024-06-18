<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run()
    {
        Post::create([
            'title' => 'Hot News',
            'summary' => 'Ringkasan mengenai berita terkini...',
            'content' => 'Konten lengkap mengenai berita terkini...',
            'image_url' => 'https://via.placeholder.com/1500x600?text=Hot+News',
        ]);

        Post::create([
            'title' => 'Sport',
            'summary' => 'Ringkasan mengenai kejadian seputar olahraga...',
            'content' => 'Konten lengkap mengenai olahraga...',
            'image_url' => 'https://via.placeholder.com/1500x600?text=Sport',
        ]);     
    }
}
