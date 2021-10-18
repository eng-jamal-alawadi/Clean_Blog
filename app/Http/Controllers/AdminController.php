<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(){

        $posts_count = Post::count();
        $categories_count = Category::count();
        $users_count = User::count();




        return view('clean_blog.admin.index',compact('posts_count','categories_count','users_count'));
    }


}
