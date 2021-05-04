<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Severity;

class SeveritysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $severitys = Severity::latest()->paginate(4);


        return view('severitys.index',compact('severitys'))->with('i',(request()->input('page',1) - 1 ) * 4);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('severitys.create');
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
            'title'=>'required',
            'due_date'=>'required | numeric'

        ],[
            'name.required'=>'Please Enter the Name..',
            'due_date.required'=>'Please Enter the due date..',
           
        ]
        
        );


        $data= new Severity;
        $data->title = $request->title;
        $data->due_date = $request->due_date;
        $data->status = ($request->status === 'on' ) ? 1 : 0;

        $data->save();
        return redirect()->route('severitys.index')->with('success',' Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Severity $severity)
    {
        return view('severitys.show', compact('severity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Severity $severity)
    {
        return view('severitys.edit', compact('severity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Severity $severity)
    {
        $request->validate([
            'title'=>'required',
            'due_date'=>'required'

        ],[
            'title.required'=>'Please Enter the Name..',
            'due_date.required'=>'Please Enter the due date..',
           
        ]
        
        );


        $severity->title = $request->title;
        $severity->due_date = $request->due_date;
        $severity->status = ($request->status === 'on' ) ? 1 : 0;
        $severity->update();
        return redirect()->route('severitys.index')->with('success',' Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $severity = Severity::findOrFail($id);
            $severity->delete();
            return redirect()->route('severitys.index')->with('success','Deleted Successfully');
            
         }
         catch(\Illuminate\Database\QueryException $ex) {
            if($ex->getCode() === '23000') {
                return 'cannot delete this field';
            } 
         }
         
       
    }
}
