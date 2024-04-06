<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller //StudlyCase
{

    public function index()
    {
        $allPosts = [
            ["id" => 1,"title"=> "PHP","posted_by"=> "Hamed","created_at"=> "2024-03-31 07:00:00"],
            ["id" => 2,"title"=> "HTML","posted_by"=> "Anas","created_at"=> "2023-03-31 07:00:00"],
            ["id" => 3,"title"=> "Javasctipt","posted_by"=> "Hussein","created_at"=> "2022-03-31 07:00:00"],
        ];
        return view("posts.index", ['posts' => $allPosts]);
    }

    public function show($postid)
    {
        $singlePost = ['id' => 1, 'title'=> 'PHP','posted_by'=> 'Hamed','created_at'=> '2024-03-31 07:00:00'];
        return view('posts.show',['post' => $singlePost]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {

        // $request = request();
        // dd($request->title);

        $data = request()->all();  //? Method 1 of getting data from form

        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->postCreator;  //? Method 2 of getting data from form
        
        // dd($title, $description,$postCreator);


        return redirect()->route('posts.index');
    }

    public function edit()
    {
        return view('posts.edit');
    }
    
    // public function firstAction()//camelCase
    // {  
    // $name = 'Ahmed';
    // $books = ['PHP','HTML','CSS'];
    // return view('test',['name' => $name, 'books'=> $books]);
    // }

    // public function greet() {
    //     echo "Hello, my friend.";
    // }
}