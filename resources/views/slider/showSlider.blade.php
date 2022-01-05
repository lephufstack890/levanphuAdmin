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
                <h5 class="m-0 ">Danh sách slider</h5>
            </div>
            <div class="card-body">
                <div class="analytic">
                    <a href="" class="text-primary">Kích hoạt<span class="text-muted">(<?php echo count($sliders); ?>)</span></a>
                </div>
                <div class="form-action form-inline py-3">
                    <select class="form-control mr-1" id="">
                        <option>Chọn</option>
                        <option>Sửa slider</option>
                        <option>Xóa slider</option>
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
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                            <tr>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td class="post_img"><img src="{{ url($slider->slider_img) }}" alt=""></td>
                                <td>{{ $slider->created_at }}</td>
                                <td>
                                    @can('update-slider')
                                        <a href="{{ $slider->url = Route('slider.updateSlider', $slider->id) }}"
                                            class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip"
                                            data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                    @endcan
                                    @can('delete-slider')
                                        <a data-id="{{ $slider->id }}" onclick="myDeleteSlider(this.getAttribute('data-id'))"
                                            href="#" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip"
                                            data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    {{-- {{ $posts->links() }} --}}
                </nav>
            </div>
        </div>
    </div>
@endsection
