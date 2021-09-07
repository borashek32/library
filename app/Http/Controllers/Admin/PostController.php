<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidatePostForm;
use App\Mail\PostMail;
use App\Models\Category;
use App\Models\Post;
use App\Models\Subscription;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $search = request()->query('search');
        if ($search) {
            $posts = Post::where('page_text', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
                ->latest()
                ->paginate(6);
        } else {
            $posts = Post::latest()->paginate(6);
            $posts->withPath('/dashboard/posts');
        }

        return view('admin.posts.index', compact('posts', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create', [
            'categories' => $categories
        ]);
    }

    public function store(ValidatePostForm $request)
    {
        $post = Post::create([
            'img'         => $request->img,
            'category_id' => $request->category_id,
            'title'       => $request->title,
            'text'        => $request->text
        ]);

        // Не получилось реализовать отправку уведомлений на почту, как только появляется новый пост
        // Что-то изменилось в настройке smtp
//        $subscriptions = Subscription::where('category_id', $request->category_id)->get();
//        foreach ($subscriptions as $subscription) {
//            Mail::to($subscription->email)->send(new PostMail($post));
//        }

        return redirect('/dashboard/admin/posts')
            ->with('success', 'Новый пост был успешно добавлен');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function update(ValidatePostForm $request, Post $post)
    {
        $post->category_id   =  $request->category_id;
        $post->img           =  $request->img;
        $post->title         =  $request->title;
        $post->text          =  $request->text;
        $post->save();

        return redirect('dashboard/admin/posts')
            ->with('success', 'Новый пост был успешно обновлен.');
    }

    public function destroy(Post $post)
    {
       $post->delete();

        return redirect('dashboard/admin/posts')
            ->with('success', 'Пост был успешно успешно удален.');
    }
}
