<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incident;
use App\Severity;
use App\Categorie;
use App\User;
use Mail;
use Auth;



class IncidentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidents = Incident::latest()->paginate(4);


        return view('incidents.index',compact('incidents'))->with('i',(request()->input('page',1) - 1 ) * 4); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
       // $category_id = $request->category_id;
    //$emails = User::whereIn('id', $user_id)->get('email');
   // $em = Categorie::whereIn('parent_id', $category_id)->get()->pluck('parent_id'); 

        $categories = Categorie::where('parent_id',null)->get();

        $stat=['Open','Close','inProgress'];
        $data = Severity::all();
        $dat = User::all();
        $da = Categorie::all();
        return view('incidents.create', ['data' => $data,'dat' => $dat, 'da' => $da],compact('stat','categories'));
    }
    
    public function data(Request $request){

        if($request->has('category_id')){
            $parentId = $request->get('category_id');
            $data = Categorie::where('parent_id',$parentId)->get();
            return ['success'=>true,'data'=>$data];
        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //dd($request->all());
       // $user_id = $request->user_id;
        //$emails = User::whereIn('id', $user_id)->get();   
    
       // $emails = User::whereIn('id', $user_id)->get()->pluck('email')->toArray();   

        //dd($emails[0]->email);
      //   dd($emails);


        //dd(User::pluck('email')->toArray());
         //dd($emails);

        //d($request->user());
        //dd( User::with('name')->get());
        // $user = User::where('id',1)->with(['email'])->first();
        // dd($user);
        // dd($request->from(Auth::user()->email));
        //dd(Auth::user()->email);
        $request->validate([
            'subject'=>'required',
            'status'=>'required',
            'start_date'=>'required',
            'description' => 'required',
            'status' => 'required|not_in:Choose Status',
            'user_id'=>'required',
            'severity_id'=>'required|not_in:Choose Severity',
            

        ],

    );

    $user_id = $request->user_id;
    //$emails = User::whereIn('id', $user_id)->get('email');
    $em = User::whereIn('id', $user_id)->get()->pluck('email')->toArray(); 
    //$em = $emails[0]->email;
//$em = User::pluck('email')->toArray();
       // $subject=$request->user()->email;
        Mail::send('auth.passwords.emailmulusers', [
            'subject' => $request->get('subject'),
            'status' => $request->get('status'),
            'start_date' => $request->get('start_date'),
            'description' => $request->get('description'),
         ],
         
            function ($message) use ($em){
                    $message->from('zohaib.shah833786@gmail.com');
                    $message->to($em)
                    ->subject('Welcome User');
    });

        $data= new Incident;
        $data->subject = $request->subject;
        $data->status = $request->status;
        $data->start_date = $request->start_date;
        $data->description = $request->description;
        $des = Severity::find($request->severity_id);
        $des->userSeverity()->save($data);
        //$dess = User::find($request->user_id);
        //$dess = User::all();
        //$dess->incidentUsers()->save($data);
        //$dess->users()->save($data);
        
        //$incident_id = Input::get('incident_id');
   // $user_ids = Input::get('user_id'); // This is an array of activities
    // $incident = Incident::find($request->incident_id);
    
    //     $incident->incidentUsers()->attach($data);
        $data->users()->attach($request->user_id);  
        return redirect()->route('incidents.index')->with('success','Incident Created Successfully and Welcome Email has been sent!!');

 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Incident $incident)
    {
        return view('incidents.show', compact('incident'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stat=['Open','Close','inProgress'];
        $incident = Incident::find($id);
        $data = Severity::all();
        $dat = User::all();
        return view('incidents.edit',['data' => $data,'dat' => $dat],compact('incident','stat'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incident $incident)
    {
        $request->validate([
            'subject'=>'required',
            'status'=>'required',
            'start_date'=>'required',
            'description' => 'required',
            'status' => 'required|not_in:Choose Status',

            'user_id'=>'required',
            'severity_id'=>'required|not_in:Choose Severity',
            

        ]);

       
        $incident->subject = $request->subject;
        $incident->status = $request->status;
        $incident->start_date = $request->start_date;
        $incident->description = $request->description;
        $incident->severity_id= $request->severity_id;
       // $incident->user_id= $request->user_id;


        $incident->update();
        $incident->users()->sync($request->user_id);
        return redirect()->route('incidents.index')->with('success','Incident Updated Successfully');

 
        
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
        $incident = Incident::findOrFail($id);
        $incident->delete();
        return redirect()->route('incidents.index')->with('success','Incident Deleted Successfully');
    }
        catch(\Illuminate\Database\QueryException $ex) {
            if($ex->getCode() === '23000') {
                return 'cannot delete this field';
            } 
         }
    }
}
