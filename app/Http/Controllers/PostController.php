<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = [
            [
                "id"=>"1",
                "title"=>"laravel",
                "Posted_by"=>"Ali",
                "description"=>"Laravel Is PHP Framework",
                "created_at"=>"2023 01 30",

            ]
            ,
            [
                "id"=>"2",
                "title"=>"Symfony",
                "Posted_by"=>"Ali",
                "description"=>"Symfony Is PHP Framework",
                "created_at"=>"2022 01 31",
            ]
            ,
            [
                "id"=>"3",
                "title"=>"Codeginator",
                "Posted_by"=>"Kariem",
                "description"=>"Codeginator Is PHP Framework",
                "created_at"=>"2023 02 12"
            ]
        ];
        return view('posts.index', [
            'posts' => $posts,
        ]);

    }
    public function show($id){

        $post = [
            "id" => "3",
            "title" => "Codeginator",
            "Posted_by" => "Kariem",
            "description" => "Codeginator Is PHP Framework",
            "created_at" => "2023 02 12",
            "email"=>"kariem12@gmail.com"
        ];

        return view('posts.show', [
            'post' => $post,
        ]);

    }
    public function create (){
        return View("posts.create");
    }
    public function store(Request $request){
        if($request->title && $request->description && $request->postedBy){
            return "The Data Is Stored Successfully";
        }else {
            return View("posts.create");
        }
    }
    public function edit($id){
        $post = [
            "id" => "3",
            "title" => "Codeginator",
            "Posted_by" => "Kariem",
            "description" => "Codeginator Is PHP Framework",
            "created_at" => "2023 02 12"
        ];
        return View("posts.edit" , ['post' => $post,]);
    }
    public function update(Request $request){
        return "The Data Is Updated Successfully";
    }
    public function destroy(){
        return "The Data Is Deleted Successfully";
    }

}
