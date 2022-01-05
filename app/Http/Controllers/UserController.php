<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $user;
    private $role;
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }
    function addUser(){
        $roles = $this->role->all();
        return view('user.addUser',compact('roles'));
    }
    public function showUser(Request $request){
        $users = $this->user->paginate(10);
        return view('user.showUser',compact('users'));
    }

    public function storeaddUser(Request $request){
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'role_id' => 'required',
            ],
            [
                'required' => ':attribute không được để trống!',
                'min' => ':attribute có độ dài ít nhất 5 kí tự!'
            ],
            [
                'name' => 'Họ và tên',
                'email' => 'Email',
                'password' => 'Mật khẩu',
                'role_id' => 'Nhóm quyền',
            ]
        );
        $user = $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $user->roles()->attach($request->role_id);
        return redirect('user/addUser')->with('status', 'Thêm mới thành công!');
    }

    public function updateUser(Request $request, $id){
        $user = $this->user->find($id);
        $roles = $this->role->all();
        $roleOfUser = $user->roles;
        return view('user/updateUser',compact('user','roles','roleOfUser'));
    }

    public function storeupdateUser(Request $request, $id){
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'role_id' => 'required',
            ],
            [
                'required' => ':attribute không được để trống!',
                'min' => ':attribute có độ dài ít nhất 5 kí tự!'
            ],
            [
                'name' => 'Họ và tên',
                'email' => 'Email',
                'password' => 'Mật khẩu',
                'role_id' => 'Nhóm quyền',
            ]
        );
        $this->user->find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $user = $this->user->find($id);
        $user->roles()->sync($request->role_id);
        return redirect()->route('user.updateUser', $user->id)->with('status', 'Cập nhật thành công!');
    }

    public function deleteUser($id){
        $this->user->find($id)->delete();
        return redirect('user/showUser')->with('status', 'Xóa thành viên thành công!');
    }
    
}
