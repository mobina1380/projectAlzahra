<?php

namespace App\Http\Controllers;
use App\Models\events;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function index()
    {
        $events = events::orderBy('id','asc')->paginate(5);
        return view('dashbord.index', compact('events'));
    }

    public function create()
    {
        return view('dashbord.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',

        ]);

        events::create($request->post());

        return redirect()->route('events.index')->with('success','Company has been created successfully.');
    }


    public function show(events $event)
    {

        return view('dashbord.show',compact('event'));
    }


    public function edit(events $event)

    {

        return view('dashbord.edit',compact('event'));
    }


    public function update(Request $request, events $event)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',

        ]);

        $event->fill($request->post())->save();

        return redirect()->route('events.index')->with('success','Company Has Been updated successfully');
    }


    public function destroy(events $event)
    {

        $event->delete();
        return redirect()->route('events.index')->with('success','Company has been deleted successfully');
    }
}
