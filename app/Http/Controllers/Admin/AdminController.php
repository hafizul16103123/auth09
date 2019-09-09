<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
        return view('admin_dashboard');
    }
    public function allUser(){
        $users=User::all();
        return view('admin.alluser',compact('users'));
    }
    public function ajaxAllUser(){
        return datatables()->of(User::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);

    }
    public function editUser($id){
       dd($id);
    }
    public function test(){
       return view('test');
    }
    public function registerUser(Request $request){
        
        $form_data = array(
            'name'        =>  $request->name,
            'gender'         =>  $request->gender,
            'dob'             =>  $request->dob,
            'blood'             =>  $request->blood,
            'father'             =>  $request->father,
            'mother'             =>  $request->mother,
            'present_address'    =>  $request->present_address,
            'permanent_address'=>  $request->permanent_address,
            'phone'             =>  $request->phone,
            'email'             =>  $request->email,
            'password'             =>  $request->password,
        );

        User::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
    }
}
