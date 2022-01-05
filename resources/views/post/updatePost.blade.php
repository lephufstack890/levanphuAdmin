@extends('layouts.container')

@section('wp-content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Cập nhật bài viết
            </div>
            <div class="card-body">
                {!! Form::open(['route' => ['post.storePostupdate', $item->id], 'method' => 'POST', 'files' => true]) !!}
                @csrf
                <div class="form-group">
                    <label for="post_title">Tiêu đề bài viết</label>
                    <input type="text" name="post_title" class="form-control" id="post_title" value="{{$item->post_title}}">
                    @error('post_title')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="post_url_title">Đường dẫn</label>
                    <input type="text" name="post_url_title" class="form-control" id="post_url_title" value="{{$item->post_url_title}}">
                    @error('post_url_title')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="day_create">Ngày tạo</label>
                    <input type="text" name="day_create" class="form-control" id="day_create" value="{{$item->day_create}}">
                    (VD: 20/11/2020)
                    @error('day_create')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="post_cat">Danh mục</label>
                    <input type="text" name="post_cat" class="form-control" id="post_cat" value="{{$item->post_cat}}">
                    @error('post_cat')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="textarea">Nội dung bài viết</label>
                    <textarea name="post_content" id="textarea" class="form-control" cols="30" rows="10">{{$item->post_content}}</textarea>
                    @error('post_content')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Danh mục</label>
                    <select class="form-control" name="post_id" id="">
                        @foreach ($list_post as $post)
                            <option {{$item->post_id == $post->id ? 'selected' : ' '}} value="{{$post->id}}"><?php echo str_repeat('|--', $post->level) . $post->post_cat_title; ?></option>
                        @endforeach
                    </select>
                    @error('post_id')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Chọn hình ảnh</label>
                    <input type="file" name="new_img" class="form-control-file">
                    <img class="update_img" src="{{asset($item->post_thumb)}}" alt="">
                    <input type="hidden" name="old_img" value="{{$item->post_thumb}}">
                    {{-- @error('file')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror --}}
                </div>
                {!! Form::submit('Cập nhật', ['name' => 'btn_add', 'class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
<?php
// print_r($item);
?>


