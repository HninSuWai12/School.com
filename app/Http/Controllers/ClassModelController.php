<?php

namespace App\Http\Controllers;

use App\Models\classModel;
use App\Models\User;
use Illuminate\Http\Request;

class ClassModelController extends Controller
{
    public function classList(){
        $data=classModel::paginate('10');
        return view('adminDashboard.classDashboard.class',compact('data'));
    }
    public function searchData(Request $request){
        $query = $request->input('searchKey');

        $data = classModel::where('class_name', 'like', '%' . $query . '%')
                            ->orWhere('status', 'like', '%' . $query . '%')
                            ->orWhere('created_at', 'like', '%' . $query . '%')
                            ->paginate(10);
        return view('adminDashboard.classDashboard.class', compact('data'));
    }

    public function classAdd(){

        $status=User::getStatus();

        return view('adminDashboard.classDashboard.classAdd',compact('status' ));
    }
    public function classAddPost(Request $request){
        $this->checkValidate($request);
        $data=$this->requestData($request);
        classModel::create($data);
        return redirect('admin/classList')->with(['success'=>'Successfully class created']);

    }
    public function classEdit($id){
        $status=User::getStatus();

       $class= classModel::where('id',$id)->first();
       return view('adminDashboard.classDashboard.classEdit',compact('class' , 'status'));

    }
    public function classEditPost($id , Request $request){

        $data = $this->requestData($request);

        classModel::where('id', $id)->update($data);

        return redirect('admin/classList')->with('success', 'Update Successfully.');
    }
    public function classDelete($id){
        classModel::where('id',$id)->delete();
        return redirect()-> back()->with([ 'success' , 'Successfully deleted class.']);
    }

    private function requestData($request){
        return[
            'class_name'=> $request->name,
            
            'status'=>$request->status,

        ];
    }

    private function checkValidate($request)
    {
        request()->validate([
            'name' => 'required',


            'status'=>'required',

        ]);
    }
}
