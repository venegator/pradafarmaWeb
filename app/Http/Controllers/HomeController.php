<?php

namespace App\Http\Controllers;

use App\Post;
use App\Evento;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->take(3)->get();
        $eventos = Evento::orderBy('id', 'desc')->take(3)->get();
        
        return view('layouts.home', compact('posts', 'eventos'));
    }

}
