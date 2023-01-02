<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index() {
        return view("post");
    }


    public function create(Request $request) {
        $user = $request->user();
        $post = new Post();
        $post->title=$request->title;
        $post->body=$request->body;
        $user->post()->save($post);

        return redirect(route("post_index"))->with("status","Post Added");
    }

    public function edit($id){
        $post = Post::find($id);
        
        //Gate
        // if(Gate::denies("isAdmin",$post)) {
        //     abort(403,"EDIT ACTION IS UNAUTHORIZED.");
        // }
        return view("editpost",["post"=>$post]);
    }

    public function update(Request $request,$id){
        $post = Post::find($id);
        $post->title=$request->title;
        $post->body=$request->body;
        $post->save();

        return redirect(route("dashboard"))->with("status","Post Updated");
    }

    public function destroy($id){
        $post = Post::destroy($id);

        //Gate
        // if(Gate::denies("isAdmin",$post)) {
        //     abort(403);
        // }
        return redirect(route("dashboard"))->with("status","Post Deleted !!");
    }
}
