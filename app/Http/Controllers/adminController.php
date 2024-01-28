<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    //
    public function dashboard()
    {
        return view('Dashboard.admin');
    }
    //AdminList
    public function adminList()
    {
        $data = User::paginate(5);
        $data->appends(request()->all());
        return view('adminDashboard.adminList', compact('data'));
    }
    public function searchAdmin(Request $request){
        $query = $request->input('searchKey');

        $data = User::where('name', 'like', '%' . $query . '%')
                            ->orWhere('email', 'like', '%' . $query . '%')
                            ->orWhere('created_at', 'like', '%' . $query . '%')
                            ->paginate(5);
         $data->appends($request->all());
        return view('adminDashboard.adminList', compact('data'));
    }


    public function adminAdd()
    {
        $type = User::getType();
        return view('adminDashboard.adminAdd' , compact('type'));
    }
    public function adminAddPost(Request $request)
    {
        $this->checkValidate($request);

        $data = $this->requestData($request);
        User::create($data);
        return redirect('admin/list')->with('success', 'Admin Add Successfully.');
    }
    public function adminEdit($id)
    {
        $page = User::where('id', $id)->first();
        $type = User::getType();
        return view('adminDashboard.adminEdit', compact('page', 'type'));
    }
    public function adminEditPost(Request $request, $id)
    {
        $data = $this->requestData($request);

        User::where('id', $id)->update($data);

        return redirect('admin/list')->with('success', 'Update Successfully.');
    }
    public function adminDelete($id)
    {
        User::where('id', $id)->delete();
        return redirect()
            ->back()
            ->with('success', 'Data deleted');
    }
    private function requestData($request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'user_type'=> $request->type,
            'password' => Hash::make($request->password),
        ];
    }
    private function checkValidate($request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'type'=>'required',
            'password' => 'required',
        ]);
    }
}
