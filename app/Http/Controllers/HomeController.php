<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $randomPosts = $this->getRandomPosts();

        // Mengirim data ke view
        return view('home', compact('randomPosts'));
    }
}
