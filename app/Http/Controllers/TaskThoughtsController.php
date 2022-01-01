<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskThoughts;

class TaskThoughtsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taskthoughts = taskthoughts::all();
        return view('index', compact('taskthoughts'))
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storedata = $request->validate([
            'type'=>'required|max:255', 
            'details'=>'required|max:255',
            'actiontaken'=>'required|max:255', 
        ]);
        $taskthoughts = taskthoughts::create($storedata);
        return redirect('/taskthoughts')->with('completed', 'Task/Thoughts has been saved.');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taskthoughts = taskthoughts::findOrFail($id);
        return view('edit', compact('taskthoughts'));
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
        $updatedata = $request->validate([
            'type'=>'required|max:255', 
            'details'=>'required|max:255',
            'actiontaken'=>'required|max:255',  
        ]);
        taskthoughts::whereId($id)->update($updatedata);
        return redirect('/taskthoughts')->with('success', 'Task/Thoughts have been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $taskthoughts = taskthoughts::findOrFail($id);
        $taskthoughts->delete();
        return redirect('/taskthoughts')->with('success', 'Task/Thoughts have been deleted.');
    }
}
