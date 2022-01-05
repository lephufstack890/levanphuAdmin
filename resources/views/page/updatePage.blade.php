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
                Cập nhật trang
            </div>
            <div class="card-body">
                {!! Form::open(['route' => ['page.storePageupdate', $page->id], 'method' => 'POST', 'files' => true]) !!}
                <div class="form-group">
                    <label for="page_title">Tiêu đề trang</label>
                    <input class="form-control" type="text" name="page_title" id="page_title" value="{{$page->page_title}}">
                    @error('page_title')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="page_cat">Tên danh mục</label>
                    <input class="form-control" type="text" name="page_cat" id="page_cat" value="{{$page->page_cat}}">
                    @error('page_cat')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="page_slug">Đường dẫn</label>
                    <input class="form-control" type="text" name="page_slug" id="page_slug" value="{{$page->page_slug}}">
                    @error('page_slug')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="page_content">Nội dung trang</label>
                    <textarea name="page_content" class="form-control" id="page_content" cols="30" rows="5">{{$page->page_content}}</textarea>
                    @error('page_content')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Chọn hình ảnh</label>
                    <input type="file" name="new_img" class="form-control-file">
                    <img class="update_img" src="{{asset($page->page_thumb)}}" alt="">
                    <input type="hidden" name="old_img" value="{{$page->page_thumb}}">
                </div>
                <div class="form-group">
                    <label for="page_cat_id">Danh mục</label>
                    <select class="form-control" id="page_cat_id" name="page_cat_id">
                        @foreach ($list_cat as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->page_cat }}</option>
                        @endforeach
                    </select>
                </div>
                {!! Form::submit('Cập nhật', ['name' => 'btn_add', 'class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
