@extends('layouts.container')

@section('wp-content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div id="content" class="container-fluid">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        Cập nhật danh mục
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => ['post.storeCatupdate', $post->id], 'method' => 'POST', 'files' => true]) !!}
                        <div class="form-group">
                            <label for="post_cat_title">Tên danh mục</label>
                            <input type="text" value="{{ $post->post_cat_title }}" name="post_cat_title"
                                class="form-control" id="post_cat_title">
                            @error('post_cat_title')
                                <h6 class="form-text text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="post_url_title_cat">Slug</label>
                            <input type="text" name="post_url_title_cat" class="form-control" id="post_url_title_cat"
                                value="{{ $post->post_url_title_cat }}">
                            @error('post_url_title_cat')
                                <h6 class="form-text text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                        {!! Form::submit('Cập nhật', ['name' => 'btn_update', 'class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        Danh mục
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tiêu đề</th>
                                    <th scope="col">Đường dẫn</th>
                                    <th scope="col">Người tạo</th>
                                    <th scope="col">Ngày tạo</th>
                                    <th scope="col">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $t = 0; ?>
                                @foreach ($list_post as $item)
                                    <?php
                                    $t++;
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $t; ?></th>
                                        <td><?php echo str_repeat('|--', $item->level) . $item->post_cat_title; ?></td>
                                        <td>{{ $item->post_url_title_cat }}</td>
                                        <td>{{ $creator->name }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td><a href="{{ $item->url_update = Route('post.updateCatpost', $item->id) }}"
                                                class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip"
                                                data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
