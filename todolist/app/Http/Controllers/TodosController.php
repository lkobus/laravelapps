<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$todos = Todo::all();
        $todos = Todo::orderBy('created_at', 'DESC')->get();
        return view('todos.index')->with("todos", $todos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'text' => 'required'
        ]);

        //create todo
        $t = new Todo;
        $t->text = $request->input('text');
        $t->body = $request->input('body');
        $t->due = $request->input('due');
        $t->save();
        return redirect('/')->with('success', 'Todo Created');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $t = Todo::find($id);
        return view('todos.show')->with('todo', $t);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $t = Todo::find($id);
        return view('todos.edit')->with('todo', $t);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $t = Todo::find($id);
        $t->text = $request->input('text');
        $t->body = $request->input('body');
        $t->due = $request->input('due');
        $t->save();
        return redirect('/')->with('success', 'Todo updated');        
        return 123;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $todo = Todo::find($id);
        $todo->delete();
        return redirect('/')->with('success', 'Todo deleted');        
        
    }
}
