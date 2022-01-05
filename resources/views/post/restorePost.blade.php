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
                <h5 class="m-0 ">Danh sách bài viết đã xóa</h5>
                <div class="form-search form-inline">
                    <form action="#">
                        <input type="" class="form-control form-search" placeholder="Tìm kiếm">
                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="analytic">
                    <a href="" class="text-primary">Đã xóa gần đây<span
                            class="text-muted">(<?php echo count($post_delete); ?>)</span></a>
                </div>
                <div class="form-action form-inline py-3">
                    <select class="form-control mr-1" id="">
                        <option>Chọn</option>
                        <option>Khôi phục bài viết</option>
                        <option>Xóa vĩnh viễn bài viết</option>
                    </select>
                    <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                </div>
                @if ($count_posts > 0)
                    <table class="table table-striped table-checkall">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <input name="checkall" type="checkbox">
                                </th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td class="post_img"><img src="{{ url($post->post_thumb) }}" alt=""></td>
                                    <td><a href="">{{ $post->post_title }}</a>
                                    </td>
                                    <td>{{ $post->post_cat }}</td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>
                                        <a href="{{ $post->post_url_update = Route('post.restorePostId', $post->id) }}"
                                            class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip"
                                            data-placement="top" title="Record"><i class="fas fa-history"></i></a>
                                        <a data-id="{{ $post->id }}"
                                            onclick="permanentlyDeletepost(this.getAttribute('data-id'))" href="#"
                                            class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip"
                                            data-placement="top" title="PermanentlyDelete"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h5 class="text-danger">Hiện tại không có bài viết nào được xóa!</h5>
                @endif
            </div>
        </div>
    </div>
@endsection
