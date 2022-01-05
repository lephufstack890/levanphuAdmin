@extends('layouts.container')

@section('wp-content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Khôi phục sản phẩm đã xóa</h5>
                <div class="form-search form-inline">
                    <form action="{{ route('product.searchProduct') }}" method="GET" role="searchProduct">
                        <input type="text" value="" class="form-control form-search" name="key" placeholder="Tìm kiếm">
                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="analytic">
                    <a href="{{ url('product/showProduct') }}" class="text-primary">Kích hoạt<span
                            class="text-muted">(<?php echo count($products); ?>)</span></a>
                    <a href="" class="text-primary">Đã xóa gần đây<span
                            class="text-muted">(<?php echo count($product_delete); ?>)</span></a>
                    <a href="" class="text-primary">Còn hàng<span class="text-muted">(<?php echo count($stock); ?>)</span></a>
                    <a href="" class="text-primary">Hết hàng<span class="text-muted">(<?php echo count($outstock); ?>)</span></a>
                    <a href="" class="text-primary">Chờ hàng<span class="text-muted">(<?php echo count($waitgood); ?>)</span></a>
                </div>
                <div class="form-action form-inline py-3">
                    <select class="form-control mr-1" id="">
                        <option>Chọn</option>
                        <option>Cập nhật sản phẩm</option>
                        <option>Xóa sản phẩm</option>
                    </select>
                    <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                </div>
                @if ($count_products > 0)
                    <table class="table table-striped table-checkall">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <input name="checkall" type="checkbox">
                                </th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá cũ</th>
                                <th scope="col">Giá mới</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Tác vụ</th>
                                <th scope="col">Xem thêm</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product_delete as $product)
                                <tr class="">
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td class="pr_img"><img src="{{ url($product->product_avatar) }}" alt=""></td>
                                    <td><a href="#">{{ $product->product_lastname }}</a></td>
                                    <td>{{ number_format($product->product_oldprice, 0, '', ',') }}đ</td>
                                    <td>{{ number_format($product->product_newprice, 0, '', ',') }}đ</td>
                                    <td>{{ $product->product_cat }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td><span class="badge badge-success">{{ $product->product_status }}</span></td>
                                    <td>
                                        <a href="{{ $product->url = Route('product.restoreProductId', $product->id) }}"
                                            class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                            data-toggle="tooltip" data-placement="top" title="Restore"><i
                                                class="fas fa-history"></i></a>
                                        <a data-id="{{ $product->id }}"
                                            onclick="permanentlyDeleteproduct(this.getAttribute('data-id'))" href="#"
                                            class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                            data-toggle="tooltip" data-placement="top" title="PermanentlyDelete"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                    <td><a href="{{ $product->url = Route('product.seemoreProduct', $product->id) }}">Xem
                                            thêm <i class="fas fa-arrow-right"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h5 class="text-danger">Hiện tại không có sản phẩm nào được xóa!</h5>
                @endif
            </div>
        </div>
    </div>
@endsection
