<?php

namespace App\Http\Controllers;

use App\rc;
use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
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

}
