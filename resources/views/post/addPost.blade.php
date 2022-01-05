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
                Thêm bài viết
            </div>
            <div class="card-body">
                {!! Form::open(['url' => 'post/storePostadd', 'method' => 'POST', 'files' => true]) !!}
                
                <div class="form-group">
                    {!! Form::label('post_title', 'Tiêu đề bài viết') !!}
                    {!! Form::text('post_title', '', ['class' => 'form-control', 'id' => 'post_title']) !!}
                    @error('post_title')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('post_url_title', 'Đường dẫn') !!}
                    {!! Form::text('post_url_title', '', ['class' => 'form-control', 'id' => 'post_url_title']) !!}
                    @error('post_url_title')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('day_create', 'Ngày tạo') !!}
                    {!! Form::text('day_create', '', ['class' => 'form-control', 'id' => 'day_create']) !!}
                    (VD: 20/11/2020)
                    @error('day_create')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                {{--  thêm 1 bài viết thử a xem --}}
                <div class="form-group">
                    {!! Form::label('post_cat', 'Danh mục') !!}
                    {!! Form::text('post_cat', '', ['class' => 'form-control', 'id' => 'post_cat']) !!}
                    @error('post_cat')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('textarea', 'Nội dung bài viết') !!}
                    {!! Form::textarea('post_content', '', ['class' => 'form-control', 'id' => 'textarea']) !!}
                    @error('post_content')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Danh mục</label>
                    <select class="form-control" name="post_id" id="">
                        @foreach ($list_post as $item)
                            <option  value="{{$item->id}}"><?php echo str_repeat('|--', $item->level) . $item->post_cat_title; ?></option>
                        @endforeach
                    </select>
                    @error('post_id')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('', 'Chọn hình ảnh') !!}
                    {!! Form::file('file', ['class' => 'form-control-file']) !!}
                    @error('file')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                {!! Form::submit('Thêm mới', ['name' => 'btn_add', 'class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
