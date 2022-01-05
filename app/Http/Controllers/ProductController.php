<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cat_products;
use App\color_products;
use App\list_posts;
use App\list_products;
use App\material_products;
use App\product_slides;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    function catProduct()
    {
        $cat_product = cat_products::all();
        $list_cat_product = milti_level_product($cat_product);
        return view('product.catProduct', compact('list_cat_product'));
    }

    function storeAddcatproduct(Request $request)
    {
        $request->validate(
            [
                'product_cat_title' => 'required',
                'product_url_cat_title' => 'required',
                'product_cat_id' => 'required',
            ],
            [
                'required' => ':attribute không được để trống!',
                'min' => ':attribute có độ dài ít nhất 5 kí tự!'
            ],
            [
                'product_cat_title' => 'Tên danh mục',
                'product_url_cat_title' => 'Đường dẫn',
                'product_cat_id' => 'Danh mục',
            ]
        );
        $input_add_cat = $request->all();
        if ($request->hasFile('file')) {
            $file = $request->file;
            // Lấy tên file
            $fileName = $file->getClientOriginalName();
            // Lấy đuôi file
            echo $file->getClientOriginalExtension();
            // Lấy kích thước file
            echo $file->getSize();
            $path = $file->move('public/uploadcatPost', $file->getClientOriginalName());
            $product_cat_thumb = 'public/uploadcatPost/' . $fileName;
            $input_add_cat['product_cat_thumb'] = $product_cat_thumb;
        }
        cat_products::create($input_add_cat);
        return redirect('product/catProduct')->with('status', 'Thêm mới danh mục thành công!');
    }

    function updateCatproduct(Request $request, $id)
    {
        $cat_product = cat_products::all();
        $list_cat_product = milti_level_product($cat_product);
        $product = cat_products::find($id);
        return view('product.updateCatproduct', compact('list_cat_product', 'product'));
    }

    function storeupdateCatproduct(Request $request, $id)
    {
        $request->validate(
            [
                'product_cat_title' => 'required',
                'product_url_cat_title' => 'required',
            ],
            [
                'required' => ':attribute không được để trống!',
                'min' => ':attribute có độ dài ít nhất 5 kí tự!'
            ],
            [
                'product_cat_title' => 'Tên danh mục',
                'product_url_cat_title' => 'Đường dẫn',
            ]
        );
        $product = cat_products::find($id);
        if ($request->hasFile('new_img')) {
            $new_img = $request->file('new_img');
            $old_img  = $product->product_cat_thumb;
            unlink($old_img);
            $get_name_img = $new_img->getClientOriginalName();
            $name_image = current(explode('.', $get_name_img));
            $new_image = $name_image . '.' . $new_img->getClientOriginalExtension();
            $new_img->move('public/uploadcatPost', $new_image);
            $path = "public/uploadcatPost/". $new_image;
            $product->product_cat_thumb = $path;
        }
        $product->product_cat_title = $request->product_cat_title;
        $product->product_url_cat_title = $request->product_url_cat_title;
        $product->save();
        // dd($product);
        return redirect()->route('product.updateCatproduct', $product->id)->with('status', 'Cập nhật danh mục thành công!');
    }

    function deleteCatproduct($id)
    {
        $product = DB::table('cat_products')
            ->where('product_cat_id', $id)
            ->count();
        if ($product > 0) {
            return redirect('product/catProduct')->with('error', 'Vui lòng xóa danh mục con trước khi xóa danh mục cha!');
        } else {
            $product = cat_products::find($id);
            $product->delete();
            return redirect('product/catProduct')->with('status', 'Xóa danh mục thành công!');
        }
    }

    function materialProduct()
    {
        $list_material = material_products::all();
        return view('product.materialProduct', compact('list_material'));
    }

    function colorProduct()
    {
        $list_color = color_products::all();
        return view('product.colorProduct', compact('list_color'));
    }

    function storeColor(Request $request)
    {
        $request->validate(
            [
                'color_name' => 'required',
                'color_slug' => 'required',
            ],
            [
                'required' => ':attribute không được để trống!',
                'min' => ':attribute có độ dài ít nhất 5 kí tự!'
            ],
            [
                'color_name' => 'Tên màu sắc',
                'color_slug' => 'Đường dẫn',
            ]
        );
        $color_product = $request->all();
        color_products::create($color_product);
        return redirect('product/colorProduct')->with('status', 'Thêm mới thành công!');
    }

    function storeMaterial(Request $request)
    {
        $request->validate(
            [
                'material_name' => 'required',
                'material_slug' => 'required',
            ],
            [
                'required' => ':attribute không được để trống!',
                'min' => ':attribute có độ dài ít nhất 5 kí tự!'
            ],
            [
                'material_name' => 'Tên chất liệu',
                'material_slug' => 'Đường dẫn',
            ]
        );
        $material_product = $request->all();
        material_products::create($material_product);
        return redirect('product/materialProduct')->with('status', 'Thêm mới thành công!');
    }

    function updatematerialProduct(Request $request, $id)
    {
        $item = material_products::find($id);
        $list_material = material_products::all();
        return view('product.updatematerialProduct', compact('item', 'list_material'));
    }

    function storeupdateMaterial(Request $request, $id)
    {
        $request->validate(
            [
                'material_name' => 'required',
                'material_slug' => 'required',
            ],
            [
                'required' => ':attribute không được để trống!',
                'min' => ':attribute có độ dài ít nhất 5 kí tự!'
            ],
            [
                'material_name' => 'Tên chất liệu',
                'material_slug' => 'Đường dẫn',
            ]
        );
        $item = material_products::find($id);
        $item->material_name = $request->material_name;
        $item->material_slug = $request->material_slug;
        $item->save();
        return redirect()->route('product.updatematerialProduct', $item->id)->with('status', 'Cập nhật thành công!');
    }

    function deleteMaterial(Request $request, $id)
    {
        material_products::find($id)
            ->delete();
        return redirect('product/materialProduct')->with('status', 'Xóa thành công!');
    }

    function updatecolorProduct(Request $request, $id)
    {
        $item = color_products::find($id);
        $list_color = color_products::all();
        return view('product.updatecolorProduct', compact('item', 'list_color'));
    }

    function storeupdateColor(Request $request, $id)
    {
        $request->validate(
            [
                'color_name' => 'required',
                'color_slug' => 'required',
            ],
            [
                'required' => ':attribute không được để trống!',
                'min' => ':attribute có độ dài ít nhất 5 kí tự!'
            ],
            [
                'color_name' => 'Tên màu sắc',
                'color_slug' => 'Đường dẫn',
            ]
        );
        $item = color_products::find($id);
        $item->color_name = $request->color_name;
        $item->color_slug = $request->color_slug;
        $item->save();
        return redirect()->route('product.updatecolorProduct', $item->id)->with('status', 'Cập nhật thành công!');
    }

    function deleteColor(Request $request, $id)
    {
        color_products::find($id)
            ->delete();
        return redirect('product/colorProduct')->with('status', 'Xóa thành công!');
    }

    // Thêm sản phẩm
    function addProduct()
    {
        $list_material = material_products::all();
        $list_color = color_products::all();
        $cat_product = cat_products::all();
        $list_cat_product = milti_level_product($cat_product);
        return view('product.addProduct', compact('list_material', 'list_color', 'list_cat_product'));
    }

    function process_upload(Request $request)
    {
        $result = "";
        $baseUrl = "http://localhost:1339/Admin"; // upload lên host đổi cái này 
        // Số lượng ảnh upload 
        $num_images = count($_FILES['file']['name']);
        $target_dir = "public/uploadSlideProduct/";
        // Duyệt từng ảnh để upload lên server 
        for ($i = 0; $i < $num_images; $i++) {
            $target_file = $target_dir . basename($_FILES['file']['name'][$i]);


            if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], $target_file)) {
                // Tạo html hiển thị hình ảnh đã upload 
                $result .= "<input type=\"hidden\" name=\"list_img[]\" value=\"$target_file\"><img src=\"$baseUrl/$target_file\" >";
                //    echo "Upload {$i} ok";
            }
        }
        echo $result;
    }

    function storeaddProduct(Request $request)
    {
        $request->validate(
            [
                'product_lastname' => 'required',
                'product_cat' => 'required',
                'product_code' => 'required',
                'product_slug' => 'required',
                'product_newprice' => 'required',
                'product_oldprice' => 'required',
                'product_desc' => 'required',
                'product_id' => 'required',
                'file' => 'required',
                'images' => 'required',
                'material_id' => 'required',
                'color_id' => 'required',
                'product_status' => 'required'
            ],
            [
                'required' => ':attribute không được để trống!',
                'min' => ':attribute có độ dài ít nhất 5 kí tự!'
            ],
            [
                'product_lastname' => 'Tên sản phẩm',
                'product_cat' => 'Tên danh mục',
                'product_code' => 'Mã sản phẩm',
                'product_slug' => 'Đường dẫn',
                'product_newprice' => 'Giá mới sản phẩm',
                'product_oldprice' => 'Giá cũ sản phẩm',
                'product_desc' => 'Mô tả sản phẩm',
                'product_id' => 'Danh mục sản phẩm',
                'file' => 'Ảnh đại diện',
                'images' => 'Ảnh slide',
                'material_id' => 'Chất liệu sản phẩm',
                'color_id' => 'Màu sắc sản phẩm',
                'product_status' => 'Trạng thái sản phẩm'
            ]
        );
        $input = $request->all();
        if ($request->hasFile('file')) {
            $file = $request->file;
            // Lấy tên file
            $fileName = $file->getClientOriginalName();
            // Lấy đuôi file
            echo $file->getClientOriginalExtension();
            // Lấy kích thước file
            // echo $file->getSize();Anh muownos laays cais hinhf anhr trong ajjax ddungs k anh ko
            $file->move('public/uploadProduct', $file->getClientOriginalName());
            $product_avatar = 'public/uploadProduct/' . $fileName;
            $input['product_avatar'] = $product_avatar;
        }
        $product_id =   list_products::create($input)->id;

        foreach ($request->list_img as $img) {
            product_slides::create([
                'product_slide_img' => $img,
                'product_slide_id' => $product_id
            ]);
        }
        return redirect('product/addProduct')->with('status', 'Thêm sản phẩm thành công!');
    }
    // Đổ dữ liệu sản phẩm
    function showProduct()
    {
        $products = list_products::paginate(4);
        $stock = list_products::where('product_status', 'like', '%Còn hàng%')->get();
        $outstock = list_products::where('product_status', 'like', '%Hết hàng%')->get();
        $waitgood = list_products::where('product_status', 'like', '%Chờ hàng%')->get();
        $product_delete = list_products::onlyTrashed()->get();
        return view('product.showProduct', compact('products', 'stock', 'outstock', 'waitgood','product_delete'));
    }

    function seemoreProduct($id)
    {
        $slides = product_slides::where('product_slide_id', $id)->get();
        return view('product.seemoreProduct', compact('slides'));
    }
    // Tìm kiếm
    function searchProduct(Request $request)
    {
        $products = list_products::where('product_lastname', 'like', '%' . $request->key . '%')
            ->orWhere('product_newprice', 'like', '%' . $request->key . '%')
            ->orWhere('product_oldprice', 'like', '%' . $request->key . '%')
            ->orWhere('product_cat', 'like', '%' . $request->key . '%')
            ->get();
            $stock = list_products::where('product_status', 'like', '%Còn hàng%')->get();
            $outstock = list_products::where('product_status', 'like', '%Hết hàng%')->get();
            $waitgood = list_products::where('product_status', 'like', '%Chờ hàng%')->get();
            $product_delete = list_products::onlyTrashed()->get();
        return view('product.searchProduct', compact('products', 'stock', 'outstock', 'waitgood','product_delete'));
    }
    // Cập nhật sản phẩm
    function updateProduct(Request $request, $id)
    {
        $list_material = material_products::all();
        $list_color = color_products::all();
        $cat_product = cat_products::all();
        $list_cat_product = milti_level_product($cat_product);
        $product = list_products::find($id);
        $slides = product_slides::where('product_slide_id', $id)->get();
        return view('product.updateProduct', compact('list_material', 'list_color', 'list_cat_product', 'product', 'slides'));
    }

    function process_update(Request $request)
    {
        $result = "";
        $baseUrl = "http://localhost:1339/Admin"; // upload lên host đổi cái này 
        // Số lượng ảnh upload 
        $num_images = count($_FILES['file']['name']);
        $target_dir = "public/uploadSlideProduct/";
        // Duyệt từng ảnh để upload lên server 
        for ($i = 0; $i < $num_images; $i++) {
            $target_file = $target_dir . basename($_FILES['file']['name'][$i]);


            if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], $target_file)) {
                // Tạo html hiển thị hình ảnh đã upload 
                $result .= "<input type=\"hidden\" name=\"list_img[]\" value=\"$target_file\"><img src=\"$baseUrl/$target_file\" >";
                //    echo "Upload {$i} ok";
            }
        }
        echo $result;
    }

    function storeupdateProduct(Request $request, $id)
    {
        $request->validate(
            [
                'product_lastname' => 'required',
                'product_cat' => 'required',
                'product_code' => 'required',
                'product_slug' => 'required',
                'product_newprice' => 'required',
                'product_oldprice' => 'required',
                'product_desc' => 'required',
                'product_id' => 'required',
                // 'new_img' => 'required',
                // 'images' => 'required',
                'material_id' => 'required',
                'color_id' => 'required',
                'product_status' => 'required'
            ],
            [
                'required' => ':attribute không được để trống!',
                'min' => ':attribute có độ dài ít nhất 5 kí tự!'
            ],
            [
                'product_lastname' => 'Tên sản phẩm',
                'product_cat' => 'Tên danh mục',
                'product_code' => 'Mã sản phẩm',
                'product_slug' => 'Đường dẫn',
                'product_newprice' => 'Giá mới sản phẩm',
                'product_oldprice' => 'Giá cũ sản phẩm',
                'product_desc' => 'Mô tả sản phẩm',
                'product_id' => 'Danh mục sản phẩm',
                // 'new_img' => 'Ảnh đại diện',
                // 'images' => 'Ảnh slide',
                'material_id' => 'Chất liệu sản phẩm',
                'color_id' => 'Màu sắc sản phẩm',
                'product_status' => 'Trạng thái sản phẩm'
            ]
        );
        $input = $request->all();
        $product = list_products::find($id);
        // $product_img = product_slides::where('product_slide_id',$id)->get();
        if ($request->hasFile('new_img')) {
            $new_img = $request->file('new_img');
            $old_img  = $product->product_avatar;
            unlink($old_img);
            $get_name_img = $new_img->getClientOriginalName();
            $name_image = current(explode('.', $get_name_img));
            $new_image = $name_image . rand(0, 99) . '.' . $new_img->getClientOriginalExtension();
            $new_img->move('public/uploadProduct', $new_image);
            $path = "public/uploadProduct/" . $new_image;
            $product->product_avatar = $path;
        }
        $product->product_lastname = $request->product_lastname;
        $product->product_cat = $request->product_cat;
        $product->product_code = $request->product_code;
        $product->product_slug = $request->product_slug;
        $product->product_newprice = $request->product_newprice;
        $product->product_oldprice = $request->product_oldprice;
        $product->product_desc = $request->product_desc;
        $product->product_id = $request->product_id;
        $product->material_id = $request->material_id;
        $product->color_id = $request->color_id;
        $product->product_status = $request->product_status;
        $product->id = $request->id;
        $product_id =   $product->id;
        if($request->list_img){
            product_slides::where('product_slide_id',$id)->delete();
            foreach ($request->list_img as $img) {
                product_slides::create([
                    'product_slide_img' => $img,
                    'product_slide_id' => $product_id
                ]);
            }
        }
        $product->save();
        return redirect()->route('product.updateProduct', $product->id)->with('status', 'Cập nhật sản phẩm thành công!');
    }
    // Xóa sản phẩm tạm thời
    function deleteProduct(Request $request, $id){
        list_products::find($id)
        ->delete();
        return redirect('product/showProduct')->with('status','Xóa sản phẩm thành công!');
    }
    // Khôi phục sản phẩm
    function restoreProduct(){
        $products = list_products::paginate(4);
        $stock = list_products::where('product_status', 'like', '%Còn hàng%')->get();
        $outstock = list_products::where('product_status', 'like', '%Hết hàng%')->get();
        $waitgood = list_products::where('product_status', 'like', '%Chờ hàng%')->get();
        $product_delete = list_products::onlyTrashed()->get();
        $count_products = list_products::onlyTrashed()->count();
        return view('product.restoreProduct', compact('products', 'stock', 'outstock', 'waitgood','product_delete','count_products'));
    }

    function restoreProductId(Request $request, $id){
        list_products::onlyTrashed()
            ->where('id', $id)
            ->restore();
        return redirect('product/showProduct')->with('status', 'Khôi phục sản phẩm thành công!');
    }
    // Xóa vĩnh viễn sản phẩm
    function permanentlydeleteproduct($id){
        list_products::onlyTrashed()
            ->where('id', $id)
            ->forceDelete();
        return redirect('product/restoreProduct')->with('status', 'Xóa vĩnh viễn sản phẩm thành công!');
    }
}
