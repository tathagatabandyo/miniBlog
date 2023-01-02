<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function show_post() {
        
        $posts = User::find(Auth::id())->post;
        // $posts = Post::all();

        return view("dashboard",["posts"=>$posts]);
    }
}
