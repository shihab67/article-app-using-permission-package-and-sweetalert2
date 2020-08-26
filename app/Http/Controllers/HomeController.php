<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Spatie\QueryBuilder\QueryBuilder;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $article = Article::all();
        // $users = QueryBuilder::for(Article::class)
        // ->allowedFilters(['author'])
        // ->get();
        // return $users;
        return view('home', compact('article'));
    }
}
