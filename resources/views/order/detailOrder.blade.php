@extends('layouts.container')
@section('wp-content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div id="main-content-wp" class="list-product-page">
        <div class="wrap clearfix">
            <div id="content" class="detail-exhibition fl-right">
                <div class="section" id="info">
                    <div class="section-head">
                        <h3 class="section-title">Thông tin đơn hàng</h3>
                    </div>
                    <ul class="list-item">
                        <?php $data_bill = json_decode($list_item['bill_detail'], true); ?>
                        <li>
                            <h3 class="title">Mã đơn hàng</h3>
                            <?php
                                foreach ($data_bill as $bill) {
                                    ?>
                                        <span class="detail"><?php echo $bill['options']['code']; ?></span><br>
                                    <?php
                                }
                            ?>
                        </li>
                        <li>
                            <h3 class="title">Địa chỉ nhận hàng</h3>
                            <span class="detail">{{ $list_item->address }}/ {{ $list_item->city }} / {{ $list_item->phone }}</span>
                        </li>
                        <li>
                            <h3 class="title">Thông tin vận chuyển</h3>
                            <span class="detail">{{ $list_item->pay }}</span>
                        </li>
                        {!! Form::open(['route' => ['order.updateOrder', $list_item->id], 'method' => 'POST', 'files' => true]) !!}
                        <li>
                            <h3 class="title">Tình trạng đơn hàng</h3>
                            <div class="mt-2">
                                <select name="status" id="updateStatus">
                                    <option selected='selected' value='Đang xử lí'>Đang xử lí</option>
                                    <option value='Đang vận chuyển'>Đang vận chuyển</option>
                                    <option value='Thành công'>Thành công</option>
                                    <option value='Hủy đơn hàng'>Hủy đơn hàng</option>
                                </select>
                                {!! Form::submit('Cập nhật đơn hàng', ['name' => 'btn_add', 'class' => 'btn btn-primary', 'id' => 'btn_update']) !!}
                            </div>
                        </li>
                        {!! Form::close() !!}
                    </ul>
                </div>
                <div class="section">
                    <div class="section-head">
                        <h3 class="section-title">Sản phẩm đơn hàng</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table info-exhibition">
                            <thead>
                                <tr>
                                    <td class="thead-text" style="font-weight: 700">STT</td>
                                    <td class="thead-text" style="font-weight: 700">Mã sản phẩm</td>
                                    <td class="thead-text" style="font-weight: 700">Ảnh sản phẩm</td>
                                    <td class="thead-text" style="font-weight: 700">Tên sản phẩm</td>
                                    <td class="thead-text" style="font-weight: 700">Đơn giá</td>
                                    <td class="thead-text" style="font-weight: 700">Số lượng</td>
                                    <td class="thead-text" style="font-weight: 700">Thành tiền</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $t = 0;
                                if(isset($data_bill))
                                   foreach ($data_bill as $bill) {
                                       $t++;
                                       ?>
                                <tr>
                                    <td class="thead-text"><?php echo $t; ?></td>
                                    <td class="thead-text"><?php echo $bill['options']['code']; ?></td>
                                    <td class="thead-text-img">
                                        <div class="thumb">
                                            <img src="<?php echo url($bill['options']['thumbnail']); ?>" alt="">
                                        </div>
                                    </td>
                                    <td class="thead-text"><?php echo $bill['name']; ?></td>
                                    <td class="thead-text">{{ number_format($bill['price'], 0, '', ',') }} VNĐ</td>
                                    <td class="thead-text"><?php echo $bill['qty']; ?></td>
                                    <td class="thead-text">{{ number_format($bill['subtotal'], 0, '', ',') }} VNĐ</td>
                                </tr>
                                <?php
                                   }else{
                                       ?>
                                <h1>Hiện tại không có đơn hàng nào!</h1>
                                <?php
                                   }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="section">
                    <h3 class="section-title">Giá trị đơn hàng</h3>
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            <li>
                                <span class="total-fee">Trạng thái</span>
                                <span class="total-fee">Tổng số lượng</span>
                                <span class="total">Tổng đơn hàng</span>
                            </li>
                            <li>
                                <span class="total-fee" style="font-weight: 700">{{ $list_item->status }}</span>
                                <span class="total-fee">{{ $list_item->bill_count }} sản phẩm</span>
                                <span class="total">{{ $list_item->bill_total }} VNĐ</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
