<?php

namespace App\Http\Controllers;

use App\add_cat_posts;
use App\list_posts;
// use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // CATPOST
    function storeCat(Request $request)
    {
        $request->validate(
            [
                'post_cat_title' => 'required',
                'post_url_title_cat' => 'required',
                'post_cat_id' => 'required'
            ],
            [
                'required' => ':attribute không được để trống!',
                'min' => ':attribute có độ dài ít nhất 5 kí tự!'
            ],
            [
                'post_cat_title' => 'Tên danh mục',
                'post_url_title_cat' => 'Đường dẫn',
                'post_cat_id' => 'Danh mục'
            ]
        );
        $input_add_cat = $request->all();
        add_cat_posts::create($input_add_cat);
        return redirect('post/catPost')->with('status', 'Thêm mới thành công!');
    }

    function catPost()
    {
        $posts = add_cat_posts::all();
        $list_post = milti_level($posts);
        $creator = Auth::user();
        return view('post.catPost', compact('list_post', 'creator'));
    }

    function updateCatpost(Request $request, $id)
    {
        $posts = add_cat_posts::all();
        $list_post = milti_level($posts);
        $creator = Auth::user();
        $post = add_cat_posts::find($id);
        return view('post.updateCatpost', compact('list_post', 'creator', 'post'));
    }

    function storeCatupdate(Request $request, $id)
    {
        $post = add_cat_posts::find($id);
        $post->post_cat_title = $request->post_cat_title;
        $post->post_url_title_cat = $request->post_url_title_cat;
        $post->save();
        return redirect()->route('post.updateCatpost', $post->id)->with('status', 'Cập nhật thành công!');
    }

    function deleteCatpost($id)
    {
        $post = DB::table('add_cat_posts')
            ->where('post_cat_id', $id)
            ->count();
        if ($post > 0) {
            return redirect('post/catPost')->with('error', 'Vui lòng xóa danh mục con trước khi xóa danh mục cha!');
        } else {
            $post = add_cat_posts::find($id);
            $post->delete();
            return redirect('post/catPost')->with('status', 'Xóa danh mục thành công!');
        }
    }
    // POST
    function addPost()
    {
        $posts = add_cat_posts::all();
        $list_post = milti_level($posts);
        return view('post.addPost', compact('list_post'));
    }

    function showPost()
    {
        $posts = list_posts::paginate(4);
        $post_delete = list_posts::onlyTrashed()
            ->get();
        return view('post.showPost', compact('posts', 'post_delete'));
    }

    function storePostadd(Request $request)
    {
        $request->validate(
            [
                'post_title' => 'required',
                'post_content' => 'required',
                'day_create' => 'required',
                'file' => 'required',
                'post_id' => 'required',
                'post_cat' => 'required',
                'post_url_title' => 'required',
            ],
            [
                'required' => ':attribute không được để trống!',
                'min' => ':attribute có độ dài ít nhất 5 kí tự!'
            ],
            [
                'post_title' => 'Tiêu đề',
                'file' => 'Hình ảnh',
                'post_id' => 'Danh mục',
                'day_create' => 'Ngày tạo',
                'post_cat' => 'Danh mục',
                'post_content' => 'Nội dung',
                'post_url_title' => 'Đường dẫn',
            ]
        );
        $input_add_post = $request->all();
        if ($request->hasFile('file')) {
            $file = $request->file;
            // Lấy tên file
            $fileName = $file->getClientOriginalName();
            // Lấy đuôi file
            echo $file->getClientOriginalExtension();
            // Lấy kích thước file
            echo $file->getSize();
            $path = $file->move('public/uploadPost', $file->getClientOriginalName());
            $post_thumb = 'public/uploadPost/' . $fileName;
            $input_add_post['post_thumb'] = $post_thumb;
        }
        list_posts::create($input_add_post);
        return redirect('post/addPost')->with('status', 'Thêm bài viết thành công!');
    }

    function updatePost($id)
    {
        $posts = add_cat_posts::all();
        $list_post = milti_level($posts);
        $item = list_posts::find($id);
        return view('post/updatePost', compact('list_post', 'item'));
    }

    function storePostupdate(Request $request, $id)
    {
        $request->validate(
            [
                'post_title' => 'required',
                'day_create' => 'required',
                'post_content' => 'required',
                'post_id' => 'required',
                'post_cat' => 'required',
                'post_url_title' => 'required',
            ],
            [
                'required' => ':attribute không được để trống!',
                'min' => ':attribute có độ dài ít nhất 5 kí tự!'
            ],
            [
                'post_title' => 'Tiêu đề',
                'post_id' => 'Danh mục',
                'day_create' => 'Ngày tạo',
                'post_cat' => 'Danh mục',
                'post_content' => 'Nội dung',
                'post_url_title' => 'Đường dẫn',
            ]
        );

        $post = list_posts::find($id);
        if ($request->hasFile('new_img')) {
            $new_img = $request->file('new_img');
            $old_img  = $post->post_thumb;
            unlink($old_img);
            $get_name_img = $new_img->getClientOriginalName();
            $name_image = current(explode('.', $get_name_img));
            $new_image = $name_image . '.' . $new_img->getClientOriginalExtension();
            $new_img->move('public/uploadPost', $new_image);
            $path = "public/uploadPost/". $new_image;
            $post->post_thumb = $path;
        }
        $post->post_title = $request->post_title;
        $post->post_cat = $request->post_cat;
        $post->post_content = $request->post_content;
        $post->post_id = $request->post_id;
        $post->day_create = $request->day_create;
        $post->post_url_title = $request->post_url_title;
        if($post->save()){
            return redirect()->route('post.updatePost', $post->id)->with('status', 'Cập nhật thành công!');
        }       
    }


    function deletePost($id)
    {
        list_posts::find($id)
            ->delete();
        return redirect('post/showPost')->with('status', 'Xóa bài viết thành công!');
    }

    function restorePost()
    {
        $posts = list_posts::onlyTrashed()->get();
        $count_posts = list_posts::onlyTrashed()->count();
        $post_delete = list_posts::onlyTrashed()
            ->get();
        return view('post.restorePost', compact('posts', 'post_delete', 'count_posts'));
    }

    function restorePostId($id)
    {
        list_posts::onlyTrashed()
            ->where('id', $id)
            ->restore();
        return redirect('post/showPost')->with('status', 'Khôi phục bài viết thành công!');
    }
    // Xóa vĩnh viễn bài viết
    function permanentlydeletePost($id)
    {
        list_posts::onlyTrashed()
            ->where('id', $id)
            ->forceDelete();
        return redirect('post/restorePost')->with('status', 'Xóa vĩnh viễn bài viết thành công!');
    }
}
