<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private $role;
    private $permission;
    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }
    public function showRole(){
        $roles = $this->role->paginate(10);
        return view('role.showRole',compact('roles'));
    }

    public function addRole(){
        $permissionParents = $this->permission->where('parent_id',0)->get();
        // dd($permission);
        return view('role.addRole', compact('permissionParents'));
    }

    public function storeaddRole(Request $request){
        $request->validate(
            [
                'name' => 'required',
                'display_name' => 'required',
            ],
            [
                'required' => ':attribute không được để trống!',
                'min' => ':attribute có độ dài ít nhất 5 kí tự!'
            ],
            [
                'name' => 'Tên vai trò',
                'display_name' => 'Mô tả vai trò',
            ]
        );
        $role = $this->role->create([
            'name' => $request->name,
            'display_name' => $request->display_name
        ]);

        $role->permissions()->attach($request->permission_id);
        return redirect('role/addRole')->with('status', 'Thêm mới thành công!');
    }

    public function updateRole($id){
        $permissionParents = $this->permission->where('parent_id',0)->get();
        $role = $this->role->find($id);
        $permissionChecked = $role->permissions;
        // dd($permissionChecked);
        return view('role.updateRole', compact('permissionParents', 'permissionChecked', 'role'));
    }

    public function storeupdateRole(Request $request, $id){
        $this->role->find($id)->update([
            'name' => $request->name,
            'display_name' => $request->display_name
        ]);
        $role = $this->role->find($id);
        $role->permissions()->sync($request->permission_id);
        return redirect()->route('role.updateRole', $role->id)->with('status', 'Cập nhật thành công!');
    }
}
