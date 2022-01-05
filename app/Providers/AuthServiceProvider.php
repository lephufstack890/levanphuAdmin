<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // Phân quyền trang
        Gate::define('add-page', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.add_page'));
        });
        Gate::define('list-page', function ($user) {
            return $user->checkPermissionAccess('list_page');
        });
        Gate::define('update-page', function ($user) {
            return $user->checkPermissionAccess('update_page');
        });
        Gate::define('delete-page', function ($user) {
            return $user->checkPermissionAccess('delete_page');
        });
        Gate::define('restore-page', function ($user) {
            return $user->checkPermissionAccess('restore_page');
        });
        Gate::define('update-cat-page', function ($user) {
            return $user->checkPermissionAccess('update_cat_page');
        });
        Gate::define('delete-cat-page', function ($user) {
            return $user->checkPermissionAccess('delete_cat_page');
        });
        // Phân quyền slider
        Gate::define('add-slider', function ($user) {
            return $user->checkPermissionAccess('add_slider');
        });
        Gate::define('update-slider', function ($user) {
            return $user->checkPermissionAccess('update_slider');
        });
        Gate::define('delete-slider', function ($user) {
            return $user->checkPermissionAccess('delete_slider');
        });
        Gate::define('list-slider', function ($user) {
            return $user->checkPermissionAccess('list_slider');
        });
        // Phân quyền bài viết
        Gate::define('add-post', function ($user) {
            return $user->checkPermissionAccess('add_post');
        });
        Gate::define('update-post', function ($user) {
            return $user->checkPermissionAccess('update_post');
        });
        Gate::define('delete-post', function ($user) {
            return $user->checkPermissionAccess('delete_post');
        });
        Gate::define('restore-post', function ($user) {
            return $user->checkPermissionAccess('restore_post');
        });
        Gate::define('list-post', function ($user) {
            return $user->checkPermissionAccess('list_post');
        });
        Gate::define('add-cat-post', function ($user) {
            return $user->checkPermissionAccess('add_cat_post');
        });
        Gate::define('update-cat-post', function ($user) {
            return $user->checkPermissionAccess('update_cat_post');
        });
        Gate::define('delete-cat-post', function ($user) {
            return $user->checkPermissionAccess('delete_cat_post');
        });
        // Phân quyền sản phẩm
        // Chất liệu
        Gate::define('add-material', function ($user) {
            return $user->checkPermissionAccess('add_material');
        });
        Gate::define('update-material', function ($user) {
            return $user->checkPermissionAccess('update_material');
        });
        Gate::define('delete-material', function ($user) {
            return $user->checkPermissionAccess('delete_material');
        });
        // Màu sắc
        Gate::define('add-color', function ($user) {
            return $user->checkPermissionAccess('add_color');
        });
        Gate::define('update-color', function ($user) {
            return $user->checkPermissionAccess('update_color');
        });
        Gate::define('delete-color', function ($user) {
            return $user->checkPermissionAccess('delete_color');
        });
        // Sản phẩm
        Gate::define('list-product', function ($user) {
            return $user->checkPermissionAccess('list_product');
        });
        Gate::define('add-product', function ($user) {
            return $user->checkPermissionAccess('add_product');
        });
        Gate::define('update-product', function ($user) {
            return $user->checkPermissionAccess('update_product');
        });
        Gate::define('delete-product', function ($user) {
            return $user->checkPermissionAccess('delete_product');
        });
        Gate::define('restore-product', function ($user) {
            return $user->checkPermissionAccess('restore_product');
        });
        // Danh mục sản phẩm
        Gate::define('add-cat-product', function ($user) {
            return $user->checkPermissionAccess('add_cat_product');
        });
        Gate::define('update-cat-product', function ($user) {
            return $user->checkPermissionAccess('update_cat_product');
        });
        Gate::define('delete-cat-product', function ($user) {
            return $user->checkPermissionAccess('delete_cat_product');
        });
        // Phân quyền bán hàng
        Gate::define('list-order', function ($user) {
            return $user->checkPermissionAccess('list_order');
        });
        Gate::define('update-order', function ($user) {
            return $user->checkPermissionAccess('update_order');
        });
        Gate::define('delete-order', function ($user) {
            return $user->checkPermissionAccess('delete_order');
        });
        // Phân quyền thành viên
        Gate::define('list-user', function ($user) {
            return $user->checkPermissionAccess('list_user');
        });
        Gate::define('add-user', function ($user) {
            return $user->checkPermissionAccess('add_user');
        });
        Gate::define('update-user', function ($user) {
            return $user->checkPermissionAccess('update_user');
        });
        Gate::define('delete-user', function ($user) {
            return $user->checkPermissionAccess('delete_user');
        });
        // Phân quyền vai trò
        Gate::define('list-role', function ($user) {
            return $user->checkPermissionAccess('list_role');
        });
        Gate::define('add-role', function ($user) {
            return $user->checkPermissionAccess('add_role');
        });
        Gate::define('update-role', function ($user) {
            return $user->checkPermissionAccess('update_role');
        });
        Gate::define('delete-role', function ($user) {
            return $user->checkPermissionAccess('delete_role');
        });
    }
}
