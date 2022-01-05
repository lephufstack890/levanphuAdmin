<?php

use App\Role;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/loading',function(){
    return view('loading.index');
});

Auth::routes();
Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

// Trang chủ
Route::get('/dashboard','HomeController@home')->middleware('auth');

// Đơn hàng

Route::get('order/detailOrder/{id}','OrderController@detailOrder')->name('order.detailOrder')->middleware('auth','can:update-order');
Route::post('order/updateOrder/{id}','OrderController@updateOrder')->name('order.updateOrder')->middleware('auth');
// PAGE
// Thêm trang
Route::get('page/addPage', 'PageController@addPage')->middleware('auth','can:add-page');
Route::post('page/storePageadd', 'PageController@storePageadd')->middleware('auth');
// Cập nhật trang
Route::get('page/updatePage/{id}', 'PageController@updatePage')->name('page.updatePage')->middleware('auth', 'can:update-page');
Route::post('page/storePageupdate/{id}', 'PageController@storePageupdate')->name('page.storePageupdate')->middleware('auth');
Route::get('page/showPage', 'PageController@showPage')->middleware('auth','can:list-page');
Route::get('page/catPage', 'PageController@catPage')->middleware('auth');
Route::post('page/storeAddcatpage', 'PageController@storeAddcatpage')->middleware('auth');
// Cập nhật danh mục trang
Route::get('page/updatecatPage/{id}', 'PageController@updatecatPage')->name('page.updatecatPage')->middleware('auth','can:update-cat-page');
Route::post('page/storeUpdatecatpage/{id}', 'PageController@storeUpdatecatpage')->name('page.storeUpdatecatpage')->middleware('auth');
// Xóa danh mục trang
Route::get('page/deleteCatpage/{id}', 'PageController@deleteCatpage')->middleware('auth','can:delete-cat-page');
// Xóa tạm thời trang
Route::get('page/deletePage/{id}', 'PageController@deletePage')->middleware('auth', 'can:delete-page');
// Khôi phục trang
Route::get('page/restorePage', 'PageController@restorePage')->middleware('auth','can:restore-page');
Route::get('page/restorePageId/{id}', 'PageController@restorePageId')->name('page.restorePageId')->middleware('auth');
// Xóa vĩnh viễn trang
Route::get('page/permanentlydeletepage/{id}', 'PageController@permanentlydeletepage')->name('page.permanentlydeletepage')->middleware('auth');
// POST
// Thêm bài viết
Route::get('post/addPost', 'PostController@addPost')->middleware('auth','can:add-post');
// Hiển thị bài viết
Route::get('post/showPost', 'PostController@showPost')->middleware('auth','can:list-post');
// Thêm danh mục bài viết
Route::get('post/catPost', 'PostController@catPost')->middleware('auth','can:add-cat-post');
// Xử lí thêm danh mục bài viết
Route::post('post/storeCat', 'PostController@storeCat')->middleware('auth');
// Cập nhật danh mục bài viết
Route::get('post/updateCatpost/{id}', 'PostController@updateCatpost')->name('post.updateCatpost')->middleware('auth');
// Xử lí cập nhật danh mục bài viết
Route::post('post/storeCatupdate/{id}', 'PostController@storeCatupdate')->name('post.storeCatupdate')->middleware('auth');
// Xóa danh mục bài viết
Route::get('post/deleteCatpost/{id}', 'Postcontroller@deleteCatpost')->name('post.deleteCatpost')->middleware('auth');
// Xử lí thêm bài viết
Route::post('post/storePostadd', 'PostController@storePostadd')->middleware('auth');
// Cập nhật bài viết
Route::get('post/updatePost/{id}', 'PostController@updatePost')->name('post.updatePost')->middleware('auth','can:update-post');
// Xử lí cập nhật bài viết
Route::post('post/storePostupdate/{id}', 'PostController@storePostupdate')->name('post.storePostupdate')->middleware('auth');
// Xóa bài viết
Route::get('post/deletePost/{id}', 'Postcontroller@deletePost')->name('post.deletePost')->middleware('auth','can:delete-post');
// Khôi phục bài viết
Route::get('post/restorePost', 'PostController@restorePost')->middleware('auth','can:restore-post');
Route::get('post/restorePostId/{id}', 'PostController@restorePostId')->name('post.restorePostId')->middleware('auth');
// Xóa vĩnh viễn bài viết
Route::get('post/permanentlydeletePost/{id}', 'PostController@permanentlydeletePost')->name('post.permanentlydeletePost')->middleware('auth');


// PRODUCT
// Thêm sản phẩm
Route::get('product/addProduct', 'ProductController@addProduct')->middleware('auth');
Route::post('product/storeaddProduct', 'ProductController@storeaddProduct')->name('product.storeaddProduct')->middleware('auth');
Route::post('product/process_upload', 'ProductController@process_upload')->name('product.process_upload')->middleware('auth');
Route::get('product/seemoreProduct/{id}', 'ProductController@seemoreProduct')->name('product.seemoreProduct')->middleware('auth');
// Hiển thị sản phẩm
Route::get('product/showProduct', 'ProductController@showProduct')->middleware('auth','can:list-product');
// Tìm kiếm sản phẩm
Route::get('product/searchProduct', 'ProductController@searchProduct')->name('product.searchProduct')->middleware('auth');
// Thêm danh mục
Route::get('product/catProduct', 'ProductController@catProduct')->middleware('auth','can:add-cat-product');
// Xử lí thêm danh mục
Route::post('product/storeAddcatproduct', 'ProductController@storeAddcatproduct')->middleware('auth');
// Cập nhật danh mục sản phẩm
Route::get('product/updateCatproduct/{id}', 'ProductController@updateCatproduct')->name('product.updateCatproduct')->middleware('auth','can:update-cat-product');
// Xử lí cập nhật danh mục sản phẩm
Route::post('product/storeupdateCatproduct/{id}', 'ProductController@storeupdateCatproduct')->name('product.storeupdateCatproduct')->middleware('auth');
// Xử lí xóa danh mục sản phẩm
Route::get('product/deleteCatproduct/{id}', 'ProductController@deleteCatproduct')->middleware('auth','can:delete-cat-product');
// Cập nhật sản phẩm
Route::get('product/updateProduct/{id}', 'ProductController@updateProduct')->name('product.updateProduct')->middleware('auth','can:update-product');
Route::post('product/storeupdateProduct/{id}', 'ProductController@storeupdateProduct')->name('product.storeupdateProduct')->middleware('auth');
Route::post('product/updateProduct/process_update', 'ProductController@process_update')->name('product.process_update')->middleware('auth');
// Xóa tạm thời sản phẩm
Route::get('product/deleteProduct/{id}', 'ProductController@deleteProduct')->middleware('auth','can:delete-product');
// Khôi phục sản phẩm
Route::get('product/restoreProduct', 'ProductController@restoreProduct')->middleware('auth','can:restore-product');
Route::get('product/restoreProductId/{id}', 'ProductController@restoreProductId')->name('product.restoreProductId')->middleware('auth');
// Xóa vinh viễn sản phẩm
Route::get('product/permanentlydeleteproduct/{id}', 'ProductController@permanentlydeleteproduct')->name('product.permanentlydeleteproduct')->middleware('auth');
// Chất liệu
Route::get('product/materialProduct', 'ProductController@materialProduct')->middleware('auth','can:add-material');
Route::post('product/storeMaterial', 'ProductController@storeMaterial')->middleware('auth');
Route::get('product/updatematerialProduct/{id}', 'ProductController@updatematerialProduct')->name('product.updatematerialProduct')->middleware('auth','can:update-material');
Route::post('product/storeupdateMaterial/{id}', 'ProductController@storeupdateMaterial')->name('product.storeupdateMaterial')->middleware('auth');
Route::get('product/deleteMaterial/{id}', 'ProductController@deleteMaterial')->name('product.deleteMaterial')->middleware('auth','can:delete-material');
// Màu sắc
Route::get('product/colorProduct', 'ProductController@colorProduct')->middleware('auth','can:add-color');
Route::post('product/storeColor', 'ProductController@storeColor')->middleware('auth');
Route::get('product/updatecolorProduct/{id}', 'ProductController@updatecolorProduct')->name('product.updatecolorProduct')->middleware('auth','can:update-color');
Route::post('product/storeupdateColor/{id}', 'ProductController@storeupdateColor')->name('product.storeupdateColor')->middleware('auth');
Route::get('product/deleteColor/{id}', 'ProductController@deleteColor')->name('product.deleteColor')->middleware('auth','delete-color');
// ORDER
Route::get('order/showOrder', 'OrderController@showOrder')->middleware('auth','can:list-order');
// Thêm slider
Route::get('slider/addSlider', 'SliderController@addSlider')->middleware('auth','can:add-slider');
Route::post('slider/storeaddSlider', 'SliderController@storeaddSlider')->middleware('auth');
// Cập nhật slider
Route::get('slider/updateSlider/{id}', 'SliderController@updateSlider')->name('slider.updateSlider')->middleware('auth','can:update-slider');
Route::post('slider/storeupdateSlider/{id}', 'SliderController@storeupdateSlider')->name('slider.storeupdateSlider')->middleware('auth');
// Xóa slider
Route::get('slider/deleteSlider/{id}', 'SliderController@deleteSlider')->name('slider.deleteSlider')->middleware('auth','can:delete-slider');
// Danh sách slider
Route::get('slider/showSlider', 'SliderController@showSlider')->middleware('auth','can:list-slider');
// USER
Route::get('user/addUser', 'UserController@addUser')->middleware('auth','can:add-user');
Route::get('user/showUser', 'UserController@showUser')->middleware('auth','can:list-user');
Route::post('user/storeaddUser','UserController@storeaddUser')->middleware('auth');
Route::get('user/updateUser/{id}','UserController@updateUser')->name('user.updateUser')->middleware('auth','can:update-user');
Route::post('user/storeupdateUser/{id}','UserController@storeupdateUser')->name('user.storeupdateUser')->middleware('auth');
Route::get('user/deleteUser/{id}','UserController@deleteUser')->middleware('auth','can:delete-user');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('dashboard', 'indexController@index')->middleware('auth');
// Xóa đơn hàng
Route::get('order/deleteOrder/{id}', 'OrderController@deleteOrder')->name('Order.deleteOrder')->middleware('auth','can:delete-order');
// Vai trò
Route::get('role/showRole','RoleController@showRole')->middleware('auth','can:list-role');
Route::get('role/addRole','RoleController@addRole')->middleware('auth','can:add-role');
Route::post('role/storeaddRole','RoleController@storeaddRole')->middleware('auth');
Route::get('role/updateRole/{id}','RoleController@updateRole')->name('role.updateRole')->middleware('auth','can:update-role');
Route::post('role/storeupdateRole/{id}','RoleController@storeupdateRole')->name('role.storeupdateRole')->middleware('auth');

// Quyền
Route::get('permission/addPermission','PermissionController@addPermission')->middleware('auth');
Route::post('permission/storeAddpermission','PermissionController@storeAddpermission')->middleware('auth');