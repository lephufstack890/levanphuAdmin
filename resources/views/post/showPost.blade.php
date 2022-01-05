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
                    <a href="" class="text-primary">Kích hoạt<span class="text-muted">(<?php echo count($posts); ?>)</span></a>
                    <a href="" class="text-primary">Đã xóa gần đây<span
                            class="text-muted">(<?php echo count($post_delete); ?>)</span></a>
                    @can('restore-post')
                        <a href="{{ url('post/restorePost') }}" class="text-primary">Khôi phục những bài viết đã xóa<span
                                class="text-muted">(<?php echo count($post_delete); ?>)</span></a>
                    @endcan
                </div>
                <div class="form-action form-inline py-3">
                    <select class="form-control mr-1" id="">
                        <option>Chọn</option>
                        <option>Xóa bài viết</option>
                    </select>
                    <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                </div>
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
                                    @can('update-post')
                                        <a href="{{ $post->post_url_update = Route('post.updatePost', $post->id) }}"
                                            class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip"
                                            data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                    @endcan
                                    @can('delete-post')
                                        <a data-id="{{ $post->id }}" onclick="myDeletepost(this.getAttribute('data-id'))"
                                            href="#" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip"
                                            data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    {{ $posts->links() }}
                </nav>
            </div>
        </div>
    </div>
@endsection
