<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use DataTables;

class AuthController extends Controller
{
    public function Register(Request $req){

        $validator = Validator::make($req->all(),[
            'name' => 'required|regex:/^[a-zA-Z]/u',
            'email' => 'required|email',
            'password' => [
                'required',
                'min:5',
                'max:15',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/',
            ],
            'repassword' => [
                'required',
                'min:5',
                'max:15',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/',
                'same:password',
            ],
        ]);

        $user = User::where('email',$req['email'])->first();
        
        if($validator->passes()){
            if($user){
                return response()->json(['exists' => "User already Exists" ]);
            }
            else{
                $user = new User;
                $user->name = $req['name'];
                $user->email=$req['email'];
                $user->password = Hash::make($req['password']);
                $user->save();
                return response()->json(['success'=> 'User Registered sucessfully']);
            }
        }
        else{  
                return response()->json(['error' => $validator->errors() ]);
        }
    }

    public function Login(Request $req){
        $validator = Validator::make($req->all(),[
            'email' => 'required|email',
            'password' => [
                'required',
                'min:5',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/',
            ]
        ]);

        $user =  User::where(['email'=>$req->email])->first();
    
        if($validator->passes()){
            if(!$user || !Hash::check($req->password,$user->password)){
                return response()->json(['notexists' => "Username and password does not matched"]);
            }else{
                Session::put('userid',$user->id);
                return response()->json(['message' => 'Sucessfully Logged In']);
            }
        }else{ 
                return response()->json(['error' => $validator->errors()]);
        }
    }

    public function addTask(Request $request){

        if($request->task !== null){
            $task = new Task;
            $task->task = $request->task;
            $task->description = $request->description ?? "No Description";
            $task->status = 0;
            $task->save();

            return back()->with('success',"Task added sucessfully");
        }else{
            return back()->with('error',"Enter your task");
        }

    }

    public function taskData(Request $request){
        if ($request->ajax()) {
            $data = Task::select('*');
            return  Datatables::of($data)
            ->addIndexColumn()
            ->editColumn('status', function($row){
                if($row->status == 0) return "Pending";
                else return "Done";
            })
            ->addColumn('action', function($row){
                $btn = '<a href="/watchMe/'.$row->id.'"><i class="fa-regular fa-pen-to-square"></i></a>&nbsp;&nbsp;
                        <a href="/delete/'.$row->id.'"><i class="fa-solid fa-trash text-danger"></i></a>&nbsp;&nbsp;';
                return $btn;
            })
            ->addColumn('Checkcolumn', function($row){
                if($row->status == 0){
                    $btn = '<a href="/changestatus/'.$row->id.'">Mark as <i class="fa-solid fa-check"></i></a>';
                }else{
                    $btn = '<a href="/changestatus/'.$row->id.'">Mark as <i class="fa-solid fa-hourglass"></i></a>';
                }
                    return $btn;
            }) 
            ->rawColumns(['action','Checkcolumn'])   
            ->make(true);
        }
        return view('Dashboard');
    }

    public function seeMe($id){
        $data = Task::where(['id'=>$id])->first();
        return view("UpdateMe",['data'=> $data]);
    }
}
