@extends('layouts.container')

@section('wp-content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách sản phẩm</h5>
            </div>
            <div class="card-body">
                <div class="analytic">
                    <a href="" class="text-primary">Trạng thái 1<span class="text-muted">(10)</span></a>
                    <a href="" class="text-primary">Trạng thái 2<span class="text-muted">(5)</span></a>
                    <a href="" class="text-primary">Trạng thái 3<span class="text-muted">(20)</span></a>
                </div>
                <div class="form-action form-inline py-3">
                    <select class="form-control mr-1" id="">
                        <option>Chọn</option>
                        <option>Tác vụ 1</option>
                        <option>Tác vụ 2</option>
                    </select>
                    <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                </div>
                <table class="table table-striped table-checkall">
                    <thead>
                        <tr>
                            <th scope="col">
                                <input name="checkall" type="checkbox">
                            </th>
                            <th scope="col" class="slide_img">Ảnh slide</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($slides as $slide)
                            <tr class="">
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td class="product_slide"><img src="{{url($slide->product_slide_img)}}" alt=""></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
<?php 
// print_r($slides);
?>
