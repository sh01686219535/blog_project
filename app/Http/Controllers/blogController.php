<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class blogController extends Controller
{
    public function index(){
        return view('frontEnd.home.home');
    }
    public function singlePost(){
        return view('frontEnd.post.single-post');
    }
    public function singleResult(){
        return view('frontEnd.category.single-result');
    }
    public function about(){
        return view('frontEnd.about.about');
    }
    public function contact(){
        return view('frontEnd.contact.contact');
    }
}
