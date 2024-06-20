<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        // Mendapatkan artikel terbaru dan rekomendasi
        $latestPosts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $recommendedPosts = Post::where('recommended', true)->take(3)->get();

        // Mengirim data ke view
        return view('home', compact('latestPosts', 'recommendedPosts'));
    }
}
