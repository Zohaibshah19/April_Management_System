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
        $data = Categorie::all();
        return view('categories.create', ['data' => $data]);
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

        //$des = Categorie::find($request->parent_id);
        
        //$des->children()->save($data);
       // $data->save();
        $data->parent_id = $request->parent_id;
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
        $data = Categorie::all();
        return view('categories.edit',['data'=>$data], compact('category'));
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
        $category->parent_id= $request->parent_id;
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
        try{
        $category = Categorie::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success','Category Deleted Successfully');
        }
        catch(\Illuminate\Database\QueryException $ex) {
            if($ex->getCode() === '23000') {
                return 'cannot delete this field';
            } 
         }

    
    }

    
}
