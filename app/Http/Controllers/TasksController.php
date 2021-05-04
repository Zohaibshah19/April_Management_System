<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $tasks = Task::latest()->paginate(4);


        return view('tasks.index',compact('tasks'))->with('i',(request()->input('page',1) - 1 ) * 4);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Categorie::all();
        return view('tasks.create', ['data' => $data]);
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
            'name'=>'required',
            'description'=>'required',
            'category_id'=>'required|not_in:Select Category',
            

        ],[
            'name.required'=>'Please Enter the Name..',
            'description.required'=>'Please Enter description',
           
            

        ]
        
        );

     


        $data= new Task;



        $data->name = $request->name;
        

        $data->description = $request->description;
        $data->status = ($request->status === 'on' ) ? 1 : 0;
        
        //$data->category_id = $request->category_id;

      
        //$data->save();
        //$data->category()->attach($request->category_id);
        //$data->Task::tasksCategory()->save($data);
        
        //dd($request->all());
        $cat = Categorie::find($request->category_id);
        $cat->tasksCategory()->save($data);

        
        return redirect()->route('tasks.index')->with('success','Task Created Successfully');

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
    
        $data = Categorie::all();
        return view('tasks.edit', ['data' => $data],compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            
        
        ],[
            'name.required'=>'Please Enter the Name..',
            'description.required'=>'Please Enter Section',
          
          
        ]
        
        );
  
        $task->name = $request->name;
        $task->description = $request->description;
        $task->category_id= $request->category_id;
        $task->status = ($request->status === 'on' ) ? 1 : 0;
       
        $task->update();
        return redirect()->route('tasks.index')->with('success','Task Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index')->with('success','Task Deleted Successfully');
    }
}
