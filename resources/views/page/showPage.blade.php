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
                <h5 class="m-0 ">Danh sách bài viết</h5>
            </div>
            <div class="card-body">
                <div class="analytic">
                    <a href="" class="text-primary">Kích hoạt<span class="text-muted">(<?php echo count($list_page); ?>)</span></a>
                    <a href="" class="text-primary">Đã xóa gần đây<span
                            class="text-muted">(<?php echo count($page_delete); ?>)</span></a>
                    @can('restore-page')
                        <a href="{{ url('page/restorePage') }}" class="text-primary">Khôi phục bài viết đã xóa<span
                                class="text-muted">(<?php echo count($page_delete); ?>)</span></a>
                    @endcan
                </div>
                <div class="form-action form-inline py-3">
                    <select class="form-control mr-1" id="">
                        <option>Chọn</option>
                        <option>Cập nhật trang</option>
                        <option>Xóa trang</option>
                    </select>
                    <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                </div>
                <table class="table table-striped table-checkall">
                    <thead>
                        <tr>
                            <th scope="col">
                                <input name="checkall" type="checkbox">
                            </th>
                            <th scope="col">STT</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $t = 0; ?>
                        @foreach ($list_page as $item)
                            <?php $t++; ?>
                            <tr>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td scope="row"><?php echo $t; ?></td>
                                <td class="page_thumb"><img src="{{ url($item->page_thumb) }}" alt=""></td>
                                <td><a href="">{{ $item->page_title }}</a>
                                </td>
                                <td>{{ $item->page_cat }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    @can('update-page')
                                        <a href="{{ $item->url_update = Route('page.updatePage', $item->id) }}"
                                            class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip"
                                            data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                    @endcan
                                    @can('delete-page')
                                        <a data-id="{{ $item->id }}" onclick="myDeletepage(this.getAttribute('data-id'))"
                                            href="#" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip"
                                            data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                    @endcan
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
