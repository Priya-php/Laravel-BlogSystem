<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;
use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Http\Requests\UsersEditRequest;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(UsersRequest $request)
    {
        $input = $request->all();
        if($file = $request->file('photo')){
            $name = time().$file->getClientOriginalName();
            $photo = Photo::create(['file' => $name]);
            $file->move('images', $name);
            $input['photo_id'] = $photo->id;
        }
        $input['password'] = bcrypt($request->password);
        User::create($input);
        return redirect('/admin/users');
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $user = User::findOrfail($id);
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(UsersEditRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $input = $request->all();
        if($file = $request->file('photo')){
            $name =time().$file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        $user->update($input);
        return redirect('/admin/users');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if(file_exists(public_path().$user->photo->file)){
            unlink(public_path().$user->photo->file);
        }
        $user->delete();
        Session::flash('deleted_user', "The user is deleted successfully.");
        return redirect('/admin/users');
    }
}
