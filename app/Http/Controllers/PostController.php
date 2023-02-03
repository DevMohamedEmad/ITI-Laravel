<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(2);
        foreach ($posts as $post) {
            $post->time = \Carbon\Carbon::parse($post->created_at)->format('d/m/Y');
        }
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }
    public function show($id)
    {
        $post = Post::find($id);
        $createdAtVar =  $post->created_at;
        $x = explode(" ", $createdAtVar->toDateTimeString());
        $post->created_at = $x[0];
        $post->time = $x[0];
        $users = User::all();
        $comments = $post->comments;
        return view('posts.show', [
            'post' => $post,
            'comments'=>$comments,
            'users'=> $users
        ]);
    }
    public function create()
    {
        $users = User::all();
        return View(
            "posts.create",
            ['users' => $users,]
        );
    }
    public function store(Request $request)
    {
        if ($request->title && $request->description && $request->user_id) {
            Post::create([
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => $request->user_id
            ]);
            return redirect()->route('posts.index');
        } else {
            return redirect()->route('posts.create');
        }
    }
    public function edit($id)
    {
        $post = Post::find($id);
        return View("posts.edit", ['post' => $post]);
    }
    public function update(Request $request)
    {
        if ($request->title && $request->description && $request->user_id) {
            Post::find($request->id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => $request->user_id
            ]);
            return redirect()->route('posts.index');
        } else {
            return redirect()->route('posts.create');
        }
    }
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('posts.index');
    }
}
