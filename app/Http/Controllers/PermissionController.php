<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    public function addPermission()
    {
        $permissions = Permission::where('parent_id', 0)->get();
        $list_all = Permission::all();
        $list_permission = milti_level_permisson($list_all);
        return view('permission.addPermission', compact('permissions', 'list_permission'));
    }

    public function storeAddpermission(Request $request)
    {
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
                'name' => 'Tên quyền',
                'display_name' => 'Mô tả',
            ]
        );

        $permission = Permission::create([
            'name' => $request->module_parent,
            'display_name' => $request->module_parent,
            'parent_id' => 0
        ]);

        Permission::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'parent_id' => $request->module_parent,
            'key_code' => $request->name
        ]);

        DB::table('permissions')->where('name',$request->module_parent)->delete();
        return redirect('permission/addPermission')->with('status', 'Thêm quyền thành công!');
        // dd($request->all());
    }
}
