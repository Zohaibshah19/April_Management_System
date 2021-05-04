<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Designation;

class DesignationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designations = Designation::latest()->paginate(4);


        return view('designations.index',compact('designations'))->with('i',(request()->input('page',1) - 1 ) * 4);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('designations.create');
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
           // 'status'=>'required'

        ],[
            'title.required'=>'Please enter the title..',
            //'status.required'=>'Please Enter the Status Name..',
           
        ]
        
        );


        $data= new Designation;
        $data->title = $request->title;
        $data->status = ($request->status === 'on' ) ? 1 : 0;

        $data->save();
        return redirect()->route('designations.index')->with('success',' Created Successfully');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Designation $designation)
    {
        return view('designations.show', compact('designation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Designation $designation)
    {
        return view('designations.edit', compact('designation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Designation $designation)
    {
        $request->validate([
            'title'=>'required',
            //'status'=>'required'

        ],[
            'title.required'=>'Please Enter the title..',
            //'status.required'=>'Please Enter the Status Name..',
           
        ]
        
        );


        $designation->title = $request->title;
        $designation->status = ($request->status === 'on' ) ? 1 : 0;
        $designation->update();
        return redirect()->route('designations.index')->with('success',' Updated Successfully');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
        $designation = Designation::findOrFail($id);
        $designation->delete();
        return redirect()->route('designations.index')->with('success','Designation Deleted Successfully');
    
    }
    catch(\Illuminate\Database\QueryException $ex) {
        if($ex->getCode() === '23000') {
            return 'cannot delete this field';
        }
    
    }
}
}