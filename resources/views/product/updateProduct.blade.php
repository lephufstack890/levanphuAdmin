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
                Cập nhật sản phẩm
            </div>
            <div class="card-body">
                {!! Form::open(['route' => ['product.storeupdateProduct', $product->id], 'method' => 'POST', 'files' => true]) !!}
                <div class="form-group">
                    <label for="product_lastname">Tên sản phẩm</label>
                    <input class="form-control" type="text" name="product_lastname" id="product_lastname"
                        value="{{ $product->product_lastname }}">
                    @error('product_lastname')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="product_cat">Tên danh mục</label>
                    <input class="form-control" type="text" name="product_cat" id="product_cat"
                        value="{{ $product->product_cat }}">
                    @error('product_cat')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="product_slug">Đường dẫn</label>
                    <input class="form-control" type="text" name="product_slug" id="product_slug"
                        value="{{ $product->product_slug }}">
                    @error('product_slug')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="product_code">Mã sản phẩm</label>
                    <input class="form-control" type="text" name="product_code" id="product_code"
                        value="{{ $product->product_code }}">
                    @error('product_code')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="product_oldprice">Giá cũ</label>
                    <input class="form-control" type="text" name="product_oldprice" id="product_oldprice"
                        value="{{ $product->product_oldprice }}">
                    @error('product_oldprice')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="product_newprice">Giá mới</label>
                    <input class="form-control" type="text" name="product_newprice" id="product_newprice"
                        value="{{ $product->product_newprice }}">
                    @error('product_newprice')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="textarea">Mô tả sản phẩm</label>
                    <textarea name="product_desc" class="form-control" id="textarea" cols="30"
                        rows="5">{{ $product->product_desc }}</textarea>
                    @error('product_desc')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="product_id">Chọn danh mục</label>
                    <select class="form-control" id="product_id" name="product_id">
                        @foreach ($list_cat_product as $cat)
                            <option 
                                value="{{ $cat->id }}">
                                <?php echo str_repeat('|--', $cat->level) . $cat->product_cat_title; ?></option>
                        @endforeach
                    </select>
                    @error('product_id')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('', 'Chọn hình ảnh') !!}
                    {!! Form::file('new_img', ['class' => 'form-control-file']) !!}
                    <img class="update_img" src="{{ asset($product->product_avatar) }}" alt="">
                    <input type="hidden" name="old_img" value="{{ $product->product_avatar }}">
                </div>
                <div class="form-group">
                    <label for="">Chọn slide</label><br>
                    <input type="file" name="images[]" id="file" multiple="">
                    <input type="submit" name="bt_upload" value="Upload file" id="multi_update">
                    <div id="result">
                        @foreach ($slides as $slide)
                            <img src="{{url($slide->product_slide_img)}}" alt="">
                        @endforeach
                    </div>
                    {{-- @error('images')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror --}}
                </div>
                <div class="form-group">
                    <label for="material_id">Chọn chất liệu</label>
                    <select class="form-control" id="material_id" name="material_id">
                        @foreach ($list_material as $material)
                            <option value="{{ $material->material_name }}">{{ $material->material_name }}</option>
                        @endforeach
                    </select>
                    @error('material_id')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="color_id">Chọn màu sắc</label>
                    <select class="form-control" id="color_id" name="color_id">
                        @foreach ($list_color as $color)
                            <option value="{{ $color->color_name }}">{{ $color->color_name }}</option>
                        @endforeach
                    </select>
                    @error('color_id')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="product_status">Trạng thái</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="product_status" id="product_stocking"
                            value="Còn hàng" checked>
                        <label class="form-check-label" for="product_stocking">
                            Còn hàng
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="product_status" id="product_outstocking"
                            value="Hết hàng">
                        <label class="form-check-label" for="product_outstocking">
                            Hết hàng
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="product_status" id="product_waitingstock"
                            value="Chờ hàng">
                        <label class="form-check-label" for="product_waitingstock">
                            Chờ hàng
                        </label>
                    </div>
                    @error('product_status')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                {!! Form::submit('Cập nhật', ['name' => 'btn_update', 'class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
