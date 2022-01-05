@extends('layouts.container')

@section('wp-content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <marquee><img src="{{ url('public/images/icon-lvp.png') }}" alt="">[LVP VIETNAM] XIN CHÀO BẠN<img
                        class="speaker" src="{{ url('public/images/speaker.png') }}" alt=""></marquee>
            </div>
        </div>
    </div>
    <div class="container-fluid py-2">
        <div class="row">
            <div class="col">
                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-header">ĐƠN HÀNG THÀNH CÔNG</div>
                    <?php $successOrders = DB::table('list_orders')->where('status','Thành công')->get() ?>
                    <div class="card-body mb-2">
                        <h5 class="card-title"><?php echo count($successOrders); ?></h5>
                        <h6 class="card-text">Đơn hàng giao dịch thành công</h6>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">ĐANG XỬ LÝ</div>
                    <?php $handleOrders = DB::table('list_orders')->where('status','Đang xử lí')->get() ?>
                    <div class="card-body mb-2">
                        <h5 class="card-title"><?php echo count($handleOrders) ?></h5>
                        <h6 class="card-text">Số lượng đơn hàng đang xử lý</h6>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-header">DOANH SỐ</div>
                    <div class="card-body mb-2">
                        <h5 class="card-title">2.5 tỷ</h5>
                        <h6 class="card-text">Doanh số hệ thống</h6>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                    <div class="card-header">ĐƠN HÀNG HỦY</div>
                    <?php $cancelOrders = DB::table('list_orders')->where('status','Hủy đơn hàng')->get() ?>
                    <div class="card-body mb-2">
                        <h5 class="card-title"><?php echo count($cancelOrders) ?></h5>
                        <h6 class="card-text">Số đơn bị hủy trong hệ thống</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                    <div class="card-header">ĐANG VẬN CHYỂN</div>
                    <?php $transportOrders = DB::table('list_orders')->where('status','Đang vận chuyển')->get() ?>
                    <div class="card-body mb-2">
                        <h5 class="card-title"><?php echo count($transportOrders) ?></h5>
                        <h6 class="card-text">Đơn hàng vận chuyển</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">THÀNH VIÊN</div>
                    <?php $users = DB::table('users')->get();?>
                    <div class="card-body mb-2">
                        <h5 class="card-title"><?php echo count($users) ?></h5>
                        <h6 class="card-text">Số lượng thành viên</h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- end analytic  -->
        <canvas id="myChart"></canvas>
    </div>
@endsection
