<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\task_tbl;
use Illuminate\support\Facades\Auth;


class MyTaskController extends Controller
{
    // Add task
    public function addTaskFunction()
    {
        return view('myTask.addmyTask');
    }

    //Store task
    function storeTaskFunction(Request $REQUEST){
         $data = new task_tbl;
         $data->user_id = Auth::user()->id;
         $data->task_name = $REQUEST ->taskName;
         $data->task_date = $REQUEST ->taskDate;
         $data->task_time = $REQUEST ->taskTime;
         $data->save();
        return redirect()->back()->with('message','Data added successfully');
}

//View task
    function viewTaskFunction(){
        $data = task_tbl::where('user_id',Auth::user()->id)->get();
        return view('myTask.viewmyTask')->with('data',$data);
    }

    // Edit Task View
    function editTaskFunction(){
        $data = task_tbl::where('user_id', Auth::user()->id)->get();
        return view('myTask.editmyTask')->with('data',$data);
}


    // Delete Task
    function deleteTaskFunction($id){
        $data = task_tbl::find($id);
        $data->delete();

        return redirect()->back()->with('message','Task Deleted Successfully');
}

     // Show Update Form
     function updateTaskForm($id){
         $data = task_tbl::find($id);
         return view('myTask.updateTask')->with('data',$data);
}

     // Update Task
     function updateTaskFunction(Request $request,$id){
          $data = task_tbl::find($id);

          $data->task_name = $request->taskName;
          $data->task_date = $request->taskDate;
          $data->task_time = $request->taskTime;

         $data->save();

         return redirect('/editTask')->with('message','Task Updated Successfully');
}

}