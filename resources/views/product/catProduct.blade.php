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
            <div class="col-12">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        Danh mục sản phẩm
                    </div>
                    <div class="card-body">
                        {!! Form::open(['url' => 'product/storeAddcatproduct', 'method' => 'POST', 'files' => true]) !!}
                        <div class="form-group">
                            <label for="product_cat_title">Tên danh mục</label>
                            <input class="form-control" type="text" name="product_cat_title" id="product_cat_title">
                            @error('product_cat_title')
                                <h6 class="form-text text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="product_url_cat_title">Đường dẫn</label>
                            <input type="text" class="form-control" name="product_url_cat_title"
                                id="product_url_cat_title">
                            @error('product_url_cat_title')
                                <h6 class="form-text text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Danh mục cha</label>
                            <select class="form-control" id="" name="product_cat_id">
                                <option>Chọn danh mục</option>
                                @foreach ($list_cat_product as $cat)
                                    <option value="{{ $cat->product_cat_id }}"><?php echo str_repeat('|--', $cat->level) . $cat->product_cat_title; ?></option>
                                @endforeach
                            </select>
                            @error('product_cat_id')
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
                        <input type="submit" name="btn_add" id="" class="btn btn-primary" value="Thêm mới">
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-12 pt-4">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        Danh sách
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col" class="text-left">Tên danh mục</th>
                                    <th scope="col">Đường dẫn</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Ngày tạo</th>
                                    <th scope="col">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $t = 0; ?>
                                @foreach ($list_cat_product as $cat)
                                    <?php $t++; ?>
                                    <tr>
                                        <th scope="row"><?php echo $t; ?></th>
                                        <td class="text-left" style="width: 13%"><?php echo str_repeat('|----', $cat->level) . $cat->product_cat_title; ?></td>
                                        <td>{{ $cat->product_url_cat_title }}</td>
                                        <td style="width: 12%"><img src="{{ asset($cat->product_cat_thumb) }}" alt="">
                                        </td>
                                        <td>{{ $cat->created_at }}</td>
                                        <td>
                                            @can('update-cat-product')
                                                <a href="{{ $cat->url_update = Route('product.updateCatproduct', $cat->id) }}"
                                                    class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                        class="fa fa-edit"></i></a>
                                            @endcan
                                            @can('delete-cat-product')
                                                <a data-id="{{ $cat->id }}"
                                                    onclick="mydeleteCatproduct(this.getAttribute('data-id'))" href="#"
                                                    class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></a>
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
// print_r($list_cat_product);
?>
