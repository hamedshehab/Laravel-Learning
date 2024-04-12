<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller //StudlyCase
{

    public function index()
    {
        //select * from posts
        $postsFromDB = Post::all();// collection object

        // $allPosts = [
        //     ["id" => 1,"title"=> "PHP","posted_by"=> "Hamed","created_at"=> "2024-03-31 07:00:00"],
        //     ["id" => 2,"title"=> "HTML","posted_by"=> "Anas","created_at"=> "2023-03-31 07:00:00"],
        //     ["id" => 3,"title"=> "Javasctipt","posted_by"=> "Hussein","created_at"=> "2022-03-31 07:00:00"],
        // ];
        return view("posts.index", ['posts' => $postsFromDB]);
    }

    public function show($postid)
    {
        //$post = Post::find($postid);  //not query like
        $post = Post::where('id', $postid)->first(); //query like... you can apply filters... gives you the first record
        //$post = Post::where('id', $postid)->get(); //gives you more than one record
        
        return view('posts.show',['post' => $post]);
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
    

    public function update()
    {
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->postCreator;  
        
        //dd($title, $description,$postCreator);


        return redirect()->route('posts.show', 1);
    }

    public function destroy()
    {
        return redirect()->route('posts.index');
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