<?php

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    public function index()
    {
        $news = news::orderBy('id','asc')->paginate(5);
        return view('News.index', compact('news'));
    }

    public function create()
    {
        return view('News.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',

        ]);

        news::create($request->post());

        return redirect()->route('news.index')->with('success','Company has been created successfully.');
    }


    public function show(news $news)
    {

        return view('News.show',compact('news'));
    }


    public function edit(news $news)

    {
        //dd($news); die();

        return view('News.edit',compact('news'));
    }


    public function update(Request $request, news $news)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',

        ]);

        $news->fill($request->post())->save();

        return redirect()->route('news.index')->with('success','Company Has Been updated successfully');
    }


    public function destroy(news $news)
    {
        $news->delete();
        return redirect()->route('news.index')->with('success','Company has been deleted successfully');
    }
}
