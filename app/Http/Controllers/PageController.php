<?php

namespace App\Http\Controllers;

use App\cat_pages;
use App\list_pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    // Thêm trang
    function addPage(){
        $list_cat = cat_pages::all();
        return view('page.addPage',compact('list_cat'));
    }

    function storePageadd(Request $request){
        $request->validate(
            [
                'page_title'=>'required',
                'page_cat'=>'required',
                'page_slug'=>'required',
                'page_content'=>'required',
                'file'=>'required',
                'page_cat_id'=>'required',
            ],
            [
                'required' => ':attribute không được để trống!',
                'min' => ':attribute có độ dài ít nhất 5 kí tự!'
            ],
            [
                'page_title'=>'Tiêu đề',
                'page_cat'=>'Tên danh mục',
                'page_slug'=>'Đường dẫn',
                'page_content'=>'Nội dung',
                'file'=>'Hình ảnh',
                'page_cat_id'=>'Hình ảnh',
            ]
        );
        $input_add_page = $request->all();
        if ($request->hasFile('file')) {
            $file = $request->file;
            // Lấy tên file
            $fileName = $file->getClientOriginalName();
            // Lấy đuôi file
            echo $file->getClientOriginalExtension();
            // Lấy kích thước file
            echo $file->getSize();
            $path = $file->move('public/uploadPage', $file->getClientOriginalName());
            $page_thumb = 'public/uploadPage/' . $fileName;
            $input_add_page['page_thumb'] = $page_thumb;
        }
        list_pages::create($input_add_page);
        // dd($input_add_page);
        return redirect('page/addPage')->with('status', 'Thêm bài viết thành công!');
    }
    // Cập nhật trang
    function updatePage(Request $request, $id){
        $list_cat = cat_pages::all();
        $page = list_pages::find($id);
        return view('page.updatePage',compact('list_cat','page'));
    }

    function storePageupdate(Request $request, $id){
        $request->validate(
            [
                'page_title'=>'required',
                'page_cat'=>'required',
                'page_slug'=>'required',
                'page_content'=>'required',
                'page_cat_id'=>'required',
            ],
            [
                'required' => ':attribute không được để trống!',
                'min' => ':attribute có độ dài ít nhất 5 kí tự!'
            ],
            [
                'page_title'=>'Tiêu đề',
                'page_cat'=>'Tên danh mục',
                'page_slug'=>'Đường dẫn',
                'page_content'=>'Nội dung',
                'page_cat_id'=>'Hình ảnh',
            ]
        );
        $page = list_pages::find($id);
        if ($request->hasFile('new_img')) {
            $new_img = $request->file('new_img');
            $old_img  = $page->page_thumb;
            unlink($old_img);
            $get_name_img = $new_img->getClientOriginalName();
            $name_image = current(explode('.', $get_name_img));
            $new_image = $name_image . rand(0, 99) . '.' . $new_img->getClientOriginalExtension();
            $new_img->move('public/uploadPage', $new_image);
            $path = "public/uploadPage/". $new_image;
            $page->page_thumb = $path;
        }
        $page->page_title = $request->page_title;
        $page->page_cat = $request->page_cat;
        $page->page_slug = $request->page_slug;
        $page->page_content = $request->page_content;
        $page->page_cat_id = $request->page_cat_id;
        if($page->save()){
            return redirect()->route('page.updatePage', $page->id)->with('status', 'Cập nhật thành công!');        
        }  
    }
    // Xóa tạm thời trang
    function deletePage(Request $request, $id){
        list_pages::find($id)->delete();
        return redirect('page/showPage')->with('status', 'Xóa trang thành công!');
    }
    // Khôi phục trang
    function restorePage(){
        $list_page = list_pages::onlyTrashed()->get();
        $count_pages = list_pages::onlyTrashed()->count();
        $page_delete = list_pages::onlyTrashed()
            ->get();
        return view('page.restorePage',compact('list_page','page_delete','count_pages'));
    }
    function restorePageId(Request $request, $id){
        list_pages::onlyTrashed()
            ->where('id', $id)
            ->restore();
            return redirect('page/showPage')->with('status', 'Khôi phục trang thành công!');
    }
    // Xóa vĩnh viễn trang
    function permanentlydeletepage($id){
        list_pages::onlyTrashed()
        ->where('id', $id)
        ->forceDelete();
        return redirect('page/restorePage')->with('status', 'Xóa vĩnh viễn trang thành công!');
    }
    // Đổ dữ liệu
    function showPage(){
        $list_page = list_pages::all();
        $page_delete = list_pages::onlyTrashed()
            ->get();
        return view('page.showPage',compact('list_page','page_delete'));
    }

    function catPage(){
        $cat_page = cat_pages::all();
        return view('page.catPage',compact('cat_page'));
    }

    function storeAddcatpage(Request $request){
        $request->validate(
            [
                'page_cat'=>'required',
                'page_slug'=>'required'
            ],
            [
                'required' => ':attribute không được để trống!',
                'min' => ':attribute có độ dài ít nhất 5 kí tự!'
            ],
            [
                'page_cat'=>'Danh mục',
                'page_slug'=>'Đường dẫn'
            ]
        );
        $input_cat_page = $request -> all();
        cat_pages::create($input_cat_page);
        return redirect('page/catPage')->with('status','Thêm danh mục bài viết thành công!');
    }
    // Cập nhật danh mục
    function updatecatPage(Request $request, $id){
        $cat_page = cat_pages::all();
        $page = cat_pages::find($id);
        return view('page.updatecatPage',compact('cat_page','page'));
    }

    function storeUpdatecatpage(Request $request, $id){
        $request->validate(
            [
                'page_cat'=>'required',
                'page_slug'=>'required'
            ],
            [
                'required' => ':attribute không được để trống!',
                'min' => ':attribute có độ dài ít nhất 5 kí tự!'
            ],
            [
                'page_cat'=>'Danh mục',
                'page_slug'=>'Đường dẫn'
            ]
        );
        $page = cat_pages::find($id);
        $page->page_cat = $request -> page_cat;
        $page->page_slug = $request -> page_slug;
        $page->save();
        return redirect()->route('page.updatecatPage',$page->id)->with('status','Cập nhật danh mục thành công!');
    }
    // Xóa danh mục
    function deleteCatpage(Request $request, $id){
        cat_pages::find($id)->delete();
        return redirect('page/catPage')->with('status', 'Xóa danh mục thành công!');
    }

}
