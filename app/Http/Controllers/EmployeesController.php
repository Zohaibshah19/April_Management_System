<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\User;
use App\Designation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mail;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = User::latest()->paginate(4);


        return view('employees.index',compact('employees'))->with('i',(request()->input('page',1) - 1 ) * 4);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=['Administrator','Manager','Normal'];
        $data = Designation::all();
        return view('employees.create', ['data' => $data],compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->email);
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:6',
            'confirm_password' => 'required|same:password',
            'user_role'=>'required|not_in:Choose User Role',
            'designation_id'=>'required|not_in:Choose Designation',
            

        ],[
            'name.required'=>'Please Enter the Name..',
            'email.required'=>'Please Enter Email',
            
           
        ]

        
        );
        $subject=$request->email;
        Mail::send('auth.passwords.emailuser', [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'user_role' => $request->get('user_role'),
            'designation_id' => $request->get('designation_id'),
            'status' => $request->get('status'),

         ],
         

            function ($message) use ($subject){
                    $message->from('zohaib.shah833786@gmail.com');
                    $message->to($subject)
                    ->subject('Welcome User');
    });


        $data= new User;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->user_role = $request->user_role;
        $data->status = ($request->status === 'on' ) ? 1 : 0;
        $des = Designation::find($request->designation_id);
        $des->employeeDesignation()->save($data);

        
        return redirect()->route('employees.index')->with('success','User Created Successfully and Welcome Email has been sent!!');

 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $employee)
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles=['Administrator','Manager','Normal'];
        $employee = User::find($id);
    
        $data = Designation::all();
        return view('employees.edit', ['data' => $data],compact('employee','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $employee)
    {
        //dd($request->all());
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|min:6',
            'confirm_password' => 'required|same:password',
            'user_role'=>'required',
            'designation_id'=>'required',
            

        ],[
            'name.required'=>'Please Enter the Name..',
            'email.required'=>'Please Enter Email',
            'password.required'=>'Please Enter the Password',
            'user_role.required'=>'Please select the User Role'
           
        ]
        );
      
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->password = Hash::make($request->password);
        $employee->user_role = $request->user_role;
        $employee->status = ($request->status === 'on' ) ? 1 : 0;
        $employee->designation_id= $request->designation_id;

        $employee->update();
        return redirect()->route('employees.index')->with('success','User Updated Successfully');

 
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
        $employee = User::findOrFail($id);
        $employee->delete();
        return redirect()->route('employees.index')->with('success','User Deleted Successfully');
    }
        catch(\Illuminate\Database\QueryException $ex) {
            if($ex->getCode() === '23000') {
                return 'cannot delete this field';
            } 
         }
    }
}
