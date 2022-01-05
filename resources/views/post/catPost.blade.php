@extends('layouts.container')

@section('wp-content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
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
                        Thêm danh mục
                    </div>
                    <div class="card-body">
                        {!! Form::open(['url' => 'post/storeCat', 'method' => 'POST', 'files' => true]) !!}
                        <div class="form-group">
                            {!! Form::label('post_cat_title', 'Tên danh mục') !!}
                            {!! Form::text('post_cat_title', '', ['class' => 'form-control', 'id' => 'post_cat_title']) !!}
                            @error('post_cat_title')
                                <h6 class="form-text text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                        <div class="form-group">
                            {!! Form::label('post_url_title_cat', 'Slug') !!}
                            {!! Form::text('post_url_title_cat', '', ['class' => 'form-control', 'id' => 'post_url_title_cat']) !!}
                            @error('post_url_title_cat')
                                <h6 class="form-text text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Danh mục</label>
                            <select class="form-control" name="post_cat_id" id="">
                                <option value="0">Chọn danh mục</option>
                                @foreach ($list_post as $item)
                                    <option value="{{ $item->post_cat_id }}"><?php echo str_repeat('|--', $item->level) . $item->post_cat_title; ?></option>
                                @endforeach
                            </select>
                            @error('post_cat_id')
                                <h6 class="form-text text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                        {!! Form::submit('Thêm mới', ['name' => 'btn_add', 'class' => 'btn btn-primary']) !!}
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
                                    <th scope="col" class="text-left">Danh mục</th>
                                    <th scope="col">Đường dẫn</th>
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
                                        <td class="text-left"><?php echo str_repeat('|--', $item->level) . $item->post_cat_title; ?></td>
                                        <td>{{ $item->post_url_title_cat }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            @can('update-cat-post')
                                                <a href="{{ $item->url_update = Route('post.updateCatpost', $item->id) }}"
                                                    class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip"
                                                    data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                            @endcan
                                            @can('delete-cat-post')
                                                <a data-id="{{ $item->id }}"
                                                    onclick="myFunction(this.getAttribute('data-id'))" href="#"
                                                    class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip"
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
        </div>

    </div>
@endsection
<?php

?>
