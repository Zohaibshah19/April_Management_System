<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Categorie::latest()->paginate(4);


        return view('categories.index',compact('categories'))->with('i',(request()->input('page',1) - 1 ) * 4);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
           // 'status'=>'required'

        ],[
            'name.required'=>'Please Enter the Name..',
            //'status.required'=>'Please Enter the Status Name..',
           
        ]
        
        );


        $data= new Categorie;
        $data->name = $request->name;
        $data->status = ($request->status === 'on' ) ? 1 : 0;

        $data->save();
        return redirect()->route('categories.index')->with('success',' Created Successfully');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorie $category)
    {
        $request->validate([
            'name'=>'required',
            //'status'=>'required'

        ],[
            'name.required'=>'Please Enter the Name..',
            //'status.required'=>'Please Enter the Status Name..',
           
        ]
        
        );


        $category->name = $request->name;
        $category->status = ($request->status === 'on' ) ? 1 : 0;
        $category->update();
        return redirect()->route('categories.index')->with('success',' Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categorie::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success','Category Deleted Successfully');
    }
}
