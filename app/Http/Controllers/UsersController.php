<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Session;
use Auth;
use File;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =User::all();
        
        return view('admin.users.index')->with('users', $users);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'is_active' => 'required|integer',
            'is_admin' => 'required|integer',
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:3|max:255'
        ]);
        
        $user =new User;
        $user->name =$request->name;
        $user->email =$request->email;
        if($file =$request->file('avatar')){
            
            $image_name =time().$file->getClientOriginalName();
            $file->move('uploads/avatars', $image_name);
            
            $user->avatar =$request->avatar;
            
        }
        
        $user->password =bcrypt($request->password);
        $user->save();
        
        Session:flash('user_created', 'User Created Successfully');
        
        return redirect()->route('users.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $user =User::find($id);
        
        return view('admin.users.edit')->with('user', $user);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'is_active' => 'required|integer',
            'is_admin' => 'required|integer',
            'name' => 'required|max:255',
            'email' => 'required|email'
        ]);
        
        $user =User::find($id);
        $user->name =$request->name;
        $user->email =$request->email;
        if($file =$request->file('avatar')){
            
            File::delete($user->avatar);
            
            $image_name =time().$file->getClientOriginalName();
            $file->move('uploads/avatars', $image_name);
            
            $user->avatar =$request->avatar;
            
        }
        if($request->has('password')){
            $user->password =bcrypt($request->password);
        }
        $user->save();
        
        Session:flash('user_updated', 'User Updated Successfully');
        
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user =User::find($id);
        File::delete($user->avatar);
        $user->delete();
        
        Session:flash('user_deleted', 'User Deleted Successfully');
        
        return redirect()->route('users.index');
        
    }
    
}
