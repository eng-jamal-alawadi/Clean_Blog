<?php

namespace App\Http\Controllers;

use App\Mail\contactMail;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class pagesController extends Controller
{
        public function index(){
            $posts = Post::latest()->simplePaginate(4);

            return view('front.index',compact('posts'));
        }

        public function single($slug){
            $post =Post::where('slug',$slug)->first();
            return view('front.single',compact('post'));
        }

        public function about(){
            return view('front.about');
        }

        public function contact(){
            return view('front.contact');
        }

        public function contactSubmit(Request $request){



            Mail::to('admin@example.com')->send(new contactMail($request->except('$_token')));

            return redirect()->route('contact')->with('success','Message send succesessfuly');
        }


}
