<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Session;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::paginate(15);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $statuses = ['1' => 'Active', '0' => 'Inactive'];
        return view('users.create', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\AddUsersRequest $request)
    {
        $picuploadDir = public_path().'/user_photo';
        $fileName = '';
        if($request->hasFile('image')){
            if($request->file('image')->isValid()){
                $fileName = uniqid().'_'.Auth::user()->id.'.'.$request->file('image')->getClientOriginalExtension();
                $request->file('image')->move($picuploadDir, $fileName);
            }
        }
        $user = new User();
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->status = $request->input('status');
        $user->role_id = 2;
        if(!empty($fileName)){
            $user->image = $fileName;
        }

        if($user->save()){
            Session::flash('success_msg', 'User Create Successful');
        }else{
            Session::flash('error_msg', 'User Create Failed. Please Try Again Later');
        }

        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $statuses = ['1' => 'Active', '0' => 'Inactive'];
        return view('users.edit', compact('user', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Requests\UserUPdateRequest $request)
    {
        $user = User::findOrFail($id);
        $prv_file_name = $user->image;

        $picuploadDir = public_path().'/user_photo';
        $fileName = '';
        if($request->hasFile('image')){
            if($request->file('image')->isValid()){
                $fileName = uniqid().'_'.Auth::user()->id.'.'.$request->file('image')->getClientOriginalExtension();
                $request->file('image')->move($picuploadDir, $fileName);
                //now delete the previous image
                if(!empty($prv_file_name)){
                    File::delete($picuploadDir.'/'.$prv_file_name);
                }
            }
        }
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if(!empty($request->input('password'))){
            $user->password = Hash::make($request->input('password'));
        }
        $user->status = $request->input('status');
        $user->username = $request->input('username');
        if(!empty($fileName)){
            $user->image = $fileName;
        }

        if($user->save()){
            Session::flash('success_msg', 'User Update Successful');
        }else{
            Session::flash('error_msg', 'User Update Failed. Please Try Again Later');
        }

        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        try{
            $user = User::findOrFail($id);
        }catch(ModelNotFoundException $e){
            Session::flash('error_msg', 'Invalid Request!');
            return redirect('users');
        }

        if($user->role_id == '1'){
            Session::flash('error_msg', 'Can not delete admin user!');
            return redirect('users');
        }
        $fileName = $user->image;
        $res = $user->delete();
        if($res){
            File::delete(public_path().'/user_photo/'.$fileName);
            Session::flash('success_msg', 'User Deleted!');
        }else{
            Session::flash('error_msg', 'User Couldn\'t Deleted!');
        }

        return redirect('users');
    }

}
