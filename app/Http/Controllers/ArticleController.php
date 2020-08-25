<?php

namespace App\Http\Controllers;

use App\rc;
use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'date' => 'required'
        ]);
        $article = Article::create([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'date' => $request->date
        ]);
        return redirect()->route('add')->withToastSuccess('Article Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\rc  $rc
     * @return \Illuminate\Http\Response
     */
    public function show(rc $rc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\rc  $rc
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Article::findOrFail($id);
        return view('edit', compact('data'));
    }
    public function delete($id)
    {
        $data = Article::findOrFail($id);
        return view('delete', compact('data'));
    }
    public function remove($id)
    {
        $data = Article::findOrFail($id);
        $data->delete();
        return redirect('/home')->withToastSuccess('Article Deleted Successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\rc  $rc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'date' => 'required'
        ]);

        $data = Article::FindOrFail($id);
        $data->title = $request->title;
        $data->author = $request->author;
        $data->description = $request->description;
        $data->date = $request->date;
        $data->save();
        return redirect('home')->withToastSuccess('Article Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\rc  $rc
     * @return \Illuminate\Http\Response
     */
    public function destroy(rc $rc)
    {
        //
    }
}
