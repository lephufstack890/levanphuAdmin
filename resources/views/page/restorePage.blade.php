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
                <h5 class="m-0 ">Khôi phục trang</h5>
            </div>
            <div class="card-body">
                <div class="analytic">
                    <a href="{{ url('page/showPage') }}" class="text-primary">Kích hoạt<span
                            class="text-muted">(<?php echo count($list_page); ?>)</span></a>
                    <a href="" class="text-primary">Đã xóa gần đây<span
                            class="text-muted">(<?php echo count($page_delete); ?>)</span></a>
                </div>
                <div class="form-action form-inline py-3">
                    <select class="form-control mr-1" id="">
                        <option>Chọn</option>
                        <option>Cập nhật trang</option>
                        <option>Xóa trang</option>
                    </select>
                    <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                </div>
                @if ($count_pages > 0)
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
                                    <td><a href="{{ $item->url = Route('page.restorePageId', $item->id) }}"
                                            class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip"
                                            data-placement="top" title="Record"><i class="fas fa-history"></i></a>
                                        <a data-id="{{ $item->id }}"
                                            onclick="permanentlyDeletepage(this.getAttribute('data-id'))" href="#"
                                            class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip"
                                            data-placement="top" title="PermanentlyDelete"><i
                                                class="fa fa-trash"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h5 class="text-danger">Hiện tại không có trang nào được xóa!</h5>
                @endif
            </div>
        </div>
    </div>
@endsection
