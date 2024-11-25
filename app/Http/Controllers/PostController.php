<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){

        $postsFromDB = Post::all();


    return view('posts.index',['posts'=> $postsFromDB]);
}

    public function show(Post $post)
    {
        // $singlepostsFromDB =Post::findorfail($PostId);
    return view('posts.show',['post'=>$post]);
}

public function create(){

    $users =User::all();

    return view('posts.create', ['users'=>$users]);
}
public function store(){

    request()->validate([
        'title'=>['required','min:3'],
        'description'=>['required','min:5'],
        'post_creator'=>['required','exists:users,id']
    ]);


    $data = request()->all();

    $title =request()->title;
    $description =request()->description;
    $postcreator =request()->post_creator;

    // dd($postcreator);
    // $post = new Post;

    // $post->title = $title;
    // $post->save();
    // $post->description = $description;
    Post::create([
        'title'=>$title,
        'description'=>$description,
        'user_id'=>$postcreator,
    ]);




    return to_route(route:'posts.index');
}

public function edit(Post $post) {

    $users =User::all();

    return view('posts.edit',['users'=>$users, 'post'=>$post]);

}

public function update($PostId){


    $title =request()->title;
    $description =request()->description;
    $postcreator =request()->post_creator;

$singlepostsFromDB = Post::find($PostId);
$singlepostsFromDB->update([
    'title' => $title,
    'description' =>$description,
    'user_id'=> $postcreator,
]);

    return to_route('posts.show' , $PostId);
}

public function destroy($PostId){

    $post = Post::find($PostId);

    $post->delete();
    return to_route(route:'posts.index');
}
}
