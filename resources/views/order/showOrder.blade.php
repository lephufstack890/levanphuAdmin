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
                <h5 class="m-0 ">Danh sách đơn hàng</h5>
            </div>
            @if (count($list_client) > 0)
                <div class="card-body">
                    <div class="analytic">
                        <a href="" class="text-primary">Tổng đơn hàng<span
                                class="text-muted">(<?php echo count($list_client); ?>)</span></a>
                    </div>
                    <div class="form-action form-inline py-3">
                        <select class="form-control mr-1" id="">
                            <option>Chọn</option>
                            <option>Xóa đơn hàng</option>
                        </select>
                        <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                    </div>
                    <table class="table table-striped table-checkall">
                        <thead>
                            <tr>
                                <td>STT</td>
                                <th scope="col">Khách hàng</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Thời gian</th>
                                <th scope="col">Tác vụ</th>
                                <th scope="col">Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $t = 0;
                            @endphp
                            @foreach ($list_client as $client)
                                @php
                                    $t++;
                                @endphp
                                <tr>
                                    <td>{{ $t }}</td>
                                    <td>
                                        {{ $client->fullname }} <br>
                                    </td>
                                    <td>{{ $client->phone }}</td>
                                    <td><span class="badge badge-success">{{ $client->status }}</span></td>
                                    <td>{{ $client->created_at }}</td>
                                    <td>
                                        @can('delete-order')
                                            <a data-id="{{ $client->id }}"
                                                onclick="myDeleteOrder(this.getAttribute('data-id'))" href="#"
                                                class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                    class="fa fa-trash"></i></a>
                                        @endcan
                                    </td>
                                    <td>@can('update-order')
                                            <a href="{{ $client->url = Route('order.detailOrder', $client->id) }}">Chi tiết <i
                                                    class="fas fa-arrow-right"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        {{ $list_client->links() }}
                    </nav>
                </div>
            @else
                <h3>Hiện tại không có đơn hàng nào!</h3>
            @endif
        </div>
    </div>
@endsection
