<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $locations = Location::latest()->paginate(4);


        return view('locations.index',compact('locations'))->with('i',(request()->input('page',1) - 1 ) * 4);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $locations = Location::latest()->paginate(4);
        return view('locations.create',compact('locations'));
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
            //'status'=>'required'

        ],[
            'name.required'=>'Please Enter the Location..',
            //'status.required'=>'Please Enter the Status Name..',
        ]
        
        );



        $data= new Location;

        $data->name = $request->name;
        $data->status = ($request->status === 'on' ) ? 1 : 0;
        

        $data->save();
        return redirect()->route('locations.index')->with('success',' Created Successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        return view('locations.show', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        return view('locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        $request->validate([
            'name'=>'required',
           
        ],[
            'name.required'=>'Please Enter the Location..',
            
        ]
        
        );


        $location->name = $request->name;
        $location->status = ($request->status === 'on' ) ? 1 : 0;
        $location->update();
        return redirect()->route('locations.index')->with('success',' Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();
        return redirect()->route('locations.index')->with('success','Location Deleted Successfully');
    }

    public function changeMemberStatus(Request $request){
        $locations = Location::find($request->location_id);
        $locations->status = $request->status;
        $locations->save();
    }

}
