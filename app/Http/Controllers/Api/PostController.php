<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        $posts = Post::all();
        return PostResource::collection($posts);
    }
    public function store(StorePostRequest $request){
        if (User::where('id', '=', $request->user_id)->exists()) {
            Post::create([
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => $request->user_id
            ])->replicate();
            return ['msg'=>'success'];
        }
    }
}
