<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

class LibraryController extends Controller
{
    public function categories()
    {
        $categories = Category::all();

        return view('categories.categories', compact('categories'));
    }

    public function category($id)
    {
        $category = Category::where('id', $id)->first();

        return view('categories.category', compact('category'));
    }

    public function post($id)
    {
        $post = Post::where('id', $id)->first();

        return view('posts.post', compact('post'));
    }
}
