<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $latestPosts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $recommendedPosts = Post::where('recommended', true)->take(3)->get();

        // Debugging data
        dd($latestPosts, $recommendedPosts);

        return view('home', compact('latestPosts', 'recommendedPosts'));
    }
}

