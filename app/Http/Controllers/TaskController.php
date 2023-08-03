<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function deleteTask($id){
        if($id){
            $data = Task::where('id',"=",$id)->first();
            $data->delete();
            return back()->with(['message' => 'Successfully Deleted']);
        }else{
            return back()->with(['error' => 'Please Try again']);
        }
    }

    public function changeStatus($id){
        $query = Task::where('id',"=",$id);
        $status = $query->first();

        if($status->status == 0){
            $query->update(['status' => 1]);
            return back()->with(['message' => 'Task Updated Successfully']);
        }else if($status->status == 1){
            $query->update(['status' => 0]);
            return back()->with(['message' => 'Task Updated Successfully']);
        }
        else{
            return back()->with(['error' => 'Please Try again']);
        }
    }

    public function updateDetails(Request $req){
        $data = Task::where('id','=',$req->id)->update(['task'=>$req->task,'description'=>$req->Description]);
        if($data == 1){
            return view('seetask')->with(['message' => 'Successfully Updated']);
        }else{
            return view('seetask')->with(['error' => 'Please Try again']);
        };
    }
}
