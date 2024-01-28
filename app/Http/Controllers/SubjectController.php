<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    //
    public function subjectList(){
        $data=Subject::paginate('10');
        return view('adminDashboard.subject.subject',compact('data'));
    }
    public function searchData(Request $request){
        $query = $request->input('searchKey');

        $data = Subject::where('subject_name', 'like', '%' . $query . '%')
                            ->orWhere('status', 'like', '%' . $query . '%')
                            ->orWhere('subject_type', 'like', '%' . $query . '%')
                            ->orWhere('created_at', 'like', '%' . $query . '%')
                            ->paginate(10);
        return view('adminDashboard.subject.subject', compact('data'));
    }

    public function subjectAdd(){

        $status=User::getStatus();
        $type = User::getSubjectType();

        return view('adminDashboard.subject.subjectAdd',compact('status' , 'type'));
    }
    public function subjectAddPost(Request $request){
        $this->checkValidate($request);
        $data=$this->requestData($request);


        Subject::create($data);
        return redirect('admin/subjectList')->with(['success'=>'Successfully class created']);

    }
    public function subjectEdit($id){
        $status=User::getStatus();
        $type=User::getSubjectType();

       $subject= Subject::where('id',$id)->first();
       return view('adminDashboard.subject.subjectEdit',compact('subject' , 'status' , 'type'));

    }
    public function subjectEditPost($id , Request $request){

        $data = $this->requestData($request);

        Subject::where('id', $id)->update($data);

        return redirect('admin/subjectList')->with('success', 'Update Successfully.');
    }
    public function subjectDelete($id){
        Subject::where('id',$id)->delete();
        return redirect()-> back()->with([ 'error' , 'Successfully deleted class.']);
    }

    private function requestData($request){
        return[
            'subject_name'=> $request->name,
            'subject_type' => $request->subjectType,

            'status'=>$request->status,

        ];
    }

    private function checkValidate($request)
    {
        request()->validate([
            'name' => 'required',
            'subjectType'=> 'required',

            'status'=>'required',

        ]);
    }
}
