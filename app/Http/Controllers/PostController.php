<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use App\Models\User;



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

    public function show(Post $post) //type hinting
    {
        //$post = Post::findOrFail($postid);  //not query like
        //$post = Post::where('id', $postid)->first(); //query like... you can apply filters... gives you the first record
        //$post = Post::where('id', $postid)->get(); //gives you more than one record
        
        // if ($post->id == null) {
        //     return redirect()->route('posts.index');
        // }
        //$user = User::where('id', $post->user_id)->first();

        return view('posts.show',['post' => $post]);//,'user' => $user
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create', ['users'=> $users]);
    }

    public function store()
    {

        // $request = request();
        // dd($request->title);

        $data = request()->all();  //? Method 1 of getting data from form
        // $title = request()->title;
        // $description = request()->description;
        // $postCreator = request()->postCreator;  //? Method 2 of getting data from form
        
        // dd($title, $description,$postCreator);
        
        // $post = new Post;

        // $post->title = $data['title'];
        // $post->description = $data['description'];

        // $post->save();

        Post::create(
            [
                'title' => $data['title'],
                'description' => $data['description'],
                'user_id' => $data['post_creator'], //* this will get ignored by the framework because it is not in the fillale property
            ]
            );

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        $users = User::all();
        return view('posts.edit', ['users'=> $users,'post'=> $post]);
    }
    

    public function update($postid)
    {
 

        $title = request()->title;
        $description = request()->description;
        $post_creator = request()->post_creator;  //?FORM
        
        $post = Post::find($postid);              //?Database
  
        $post->update([
            'title'=> $title,
            'description'=> $description,
            'user_id'=> $post_creator,
        ]);

        //dd($title, $description,$postCreator);


        return redirect()->route('posts.show', $post->id);
    }

    public function destroy($postid)
    {
        $post = Post::find($postid);
        $post->delete();

        //Post::where('title', $title)->delete(); //? to delete all posts with a certain title... but model events won't occure
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