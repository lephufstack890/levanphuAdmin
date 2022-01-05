<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link href="{{ url('public/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/solid.min.css">
    <script src="https://cdn.tiny.cloud/1/j5ukmcfvck7dx7q8ktl047avsuenqkvlzr08g8ska7lknw8j/tinymce/4/tinymce.min.js"
        referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <script>
        var editor_config = {
            path_absolute: "http://localhost:1339/Admin/",
            selector: "#textarea",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | print preview media fullpage | forecolor backcolor emoticons",
            relative_urls: false,
            file_browser_callback: function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                    'body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        };
        tinymce.init(editor_config);
    </script>
    <link rel="stylesheet" href="{{ url('public/css/style.css') }}">
    <link rel="icon" href="{{ url('public/images/icon-lvp.png') }}" sizes="512x512">
    <title>Quản trị hệ thống</title>
</head>

<body>

    <div id="warpper" class="nav-fixed">
        <div class="modal fade" id="demo-modal">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12"><i class="fas fa-exclamation-circle"></i></div>
                                <div class="col-12"><span>Bạn có chắc chắn xóa danh mục này không?</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-danger" data-bs-dismiss='modal'>Hủy
                            bỏ</a>
                        <a id="yesObtion" href="" class="btn btn-primary">Đồng
                            ý</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="demo-modal-permanentlydeletePost">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12"><i class="fas fa-exclamation-circle"></i></div>
                                <div class="col-12"><span>Nếu xóa thì bạn không thể khôi phục danh mục bạn chắc
                                        chắn xóa chứ?</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-danger" data-bs-dismiss='modal'>Hủy
                            bỏ</a>
                        <a id="yespermanentlydelete" href="" class="btn btn-primary">Đồng
                            ý</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="demo-modal-deleteMaterial">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12"><i class="fas fa-exclamation-circle"></i></div>
                                <div class="col-12"><span>Bạn đồng ý xóa chất liệu này không?</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-danger" data-bs-dismiss='modal'>Hủy
                            bỏ</a>
                        <a id="yesdeleteMaterial" href="" class="btn btn-primary">Đồng
                            ý</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="demo-modal-deleteColor">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12"><i class="fas fa-exclamation-circle"></i></div>
                                <div class="col-12"><span>Bạn đồng ý xóa màu sắc này không?</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-danger" data-bs-dismiss='modal'>Hủy
                            bỏ</a>
                        <a id="yesdeleteColor" href="" class="btn btn-primary">Đồng
                            ý</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="demo-modal-deletePost">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12"><i class="fas fa-exclamation-circle"></i></div>
                                <div class="col-12"><span>Bạn có chắc chắn xóa bài viết này không?</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-danger" data-bs-dismiss='modal'>Hủy
                            bỏ</a>
                        <a id="yesdelete" href="" class="btn btn-primary">Đồng
                            ý</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="demo-modal-deleteProduct">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12"><i class="fas fa-exclamation-circle"></i></div>
                                <div class="col-12"><span>Bạn có chắc chắn xóa sản phẩm này không?</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-danger" data-bs-dismiss='modal'>Hủy
                            bỏ</a>
                        <a id="yesdeleteProduct" href="" class="btn btn-primary">Đồng
                            ý</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="demo-modal-permanentlydeleteproduct">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12"><i class="fas fa-exclamation-circle"></i></div>
                                <div class="col-12"><span>Nếu xóa thì bạn không thể khôi phục sản phẩm bạn chắc
                                        chắn xóa chứ?</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-danger" data-bs-dismiss='modal'>Hủy
                            bỏ</a>
                        <a id="yespermanentlydeleteproduct" href="" class="btn btn-primary">Đồng
                            ý</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="demo-modal-deletePage">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12"><i class="fas fa-exclamation-circle"></i></div>
                                <div class="col-12"><span>Bạn có chắc chắn xóa trang này không?</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-danger" data-bs-dismiss='modal'>Hủy
                            bỏ</a>
                        <a id="yesdeletePage" href="" class="btn btn-primary">Đồng
                            ý</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="demo-modal-permanentlydeletepage">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12"><i class="fas fa-exclamation-circle"></i></div>
                                <div class="col-12"><span>Nếu xóa thì bạn không thể khôi phục trang bạn chắc
                                        chắn xóa chứ?</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-danger" data-bs-dismiss='modal'>Hủy
                            bỏ</a>
                        <a id="yespermanentlydeletepage" href="" class="btn btn-primary">Đồng
                            ý</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="demo-modal-deleteUser">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12"><i class="fas fa-exclamation-circle"></i></div>
                                <div class="col-12"><span>Bạn có chắc chắn xóa thành viên này không?</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-danger" data-bs-dismiss='modal'>Hủy
                            bỏ</a>
                        <a id="yesdeleteUser" href="" class="btn btn-primary">Đồng
                            ý</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="demo-modal-deleteRole">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12"><i class="fas fa-exclamation-circle"></i></div>
                                <div class="col-12"><span>Bạn có chắc chắn xóa vai trò này không?</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-danger" data-bs-dismiss='modal'>Hủy
                            bỏ</a>
                        <a id="yesdeleteRole" href="" class="btn btn-primary">Đồng
                            ý</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="demo-modal-deleteSlider">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12"><i class="fas fa-exclamation-circle"></i></div>
                                <div class="col-12"><span>Bạn có chắc chắn xóa thành viên này không?</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-danger" data-bs-dismiss='modal'>Hủy
                            bỏ</a>
                        <a id="yesdeleteSlider" href="" class="btn btn-primary">Đồng
                            ý</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="demo-modal-deleteOrder">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12"><i class="fas fa-exclamation-circle"></i></div>
                                <div class="col-12"><span>Bạn có chắc chắn xóa đơn hàng này không?</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-danger" data-bs-dismiss='modal'>Hủy
                            bỏ</a>
                        <a id="yesdeleteOrder" href="" class="btn btn-primary">Đồng
                            ý</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <nav class="topnav shadow navbar-light bg-white d-flex">
            <div class="navbar-brand"><a href="{{ url('/dashboard') }}">LVP</a></div>
            <div class="nav-right ">
                <div class="btn-group mr-auto">
                    <button type="button" class="btn dropdown" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="plus-icon fas fa-plus-circle"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ url('post/addPost') }}">Thêm bài viết</a>
                        <a class="dropdown-item" href="{{ url('product/addProduct') }}">Thêm sản phẩm</a>
                        <a class="dropdown-item" href="{{ url('order/showOrder') }}">Thêm đơn hàng</a>
                    </div>
                </div>
                <div class="btn-group">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </nav> --}}

        <!-- end nav  -->
        <div id="page-body" class="d-flex">
            {{-- Chắc do cái ss out đây --}}
            <div id="sidebar" class="bg-white">
                <div class="auth_admin">
                    <img src="{{ url('public/images/admin.png') }}" alt="">
                    <div class="auth_name">
                        <h6>Hi!</h6>
                        <h6><a aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a></h6>
                        <h6><a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }} <i class="fas fa-long-arrow-alt-right"></i>
                            </a>
                        </h6>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                <ul id="sidebar-menu">
                    <li class="nav-link">
                        <a href="{{ url('/dashboard') }}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-house-user"></i>
                            </div>
                            Dashboard
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-book"></i>
                            </div>
                            Trang
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            @can('add-page')
                                <li><a href="{{ url('page/addPage') }}">Thêm mới</a></li>
                            @endcan
                            @can('list-page')
                                <li><a href="{{ url('page/showPage') }}">Danh sách</a></li>
                            @endcan
                            <li><a href="{{ url('page/catPage') }}">Danh mục</a></li>
                        </ul>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-sliders-h"></i>
                            </div>
                            Slider
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            @can('add-slider')
                                <li><a href="{{ url('slider/addSlider') }}">Thêm mới</a></li>
                            @endcan
                            @can('list-slider')
                                <li><a href="{{ url('slider/showSlider') }}">Danh sách slider</a></li>
                            @endcan
                        </ul>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-file-word"></i>
                            </div>
                            Bài viết
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            @can('add-post')
                                <li><a href="{{ url('post/addPost') }}">Thêm mới</a></li>
                            @endcan
                            @can('list-post')
                                <li><a href="{{ url('post/showPost') }}">Danh sách</a></li>
                            @endcan
                            @can('add-cat-post')
                                <li><a href="{{ url('post/catPost') }}">Danh mục</a></li>
                            @endcan
                        </ul>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fab fa-product-hunt"></i>
                            </div>
                            Sản phẩm
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            @can('add-product')
                                <li><a href="{{ url('product/addProduct') }}">Thêm sản phẩm</a></li>
                            @endcan
                            @can('add-material')
                                <li><a href="{{ url('product/materialProduct') }}">Thêm chất liệu</a></li>
                            @endcan
                            @can('add-color')
                                <li><a href="{{ url('product/colorProduct') }}">Thêm màu sắc</a></li>
                            @endcan
                            @can('list-product')
                                <li><a href="{{ url('product/showProduct') }}">Danh sách sản phẩm</a></li>
                            @endcan
                            @can('add-cat-product')
                                <li><a href="{{ url('product/catProduct') }}">Thêm danh mục</a></li>
                            @endcan
                        </ul>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-luggage-cart"></i>
                            </div>
                            Bán hàng
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            @can('list-order')
                                <li><a href="{{ url('order/showOrder') }}">Đơn hàng</a></li>
                            @endcan
                        </ul>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-users"></i>
                            </div>
                            Users
                        </a>
                        <i class="arrow fas fa-angle-right"></i>

                        <ul class="sub-menu">
                            @can('delete-user')
                                <li><a href="{{ url('user/addUser') }}">Thêm mới</a></li>
                            @endcan
                            @can('list-user')
                                <li><a href="{{ url('user/showUser') }}">Danh sách</a></li>
                            @endcan
                        </ul>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-users"></i>
                            </div>
                            Danh sách vai trò
                        </a>
                        <i class="arrow fas fa-angle-right"></i>

                        <ul class="sub-menu">
                            @can('add-role')
                                <li><a href="{{ url('role/addRole') }}">Thêm mới vai trò</a></li>
                            @endcan
                            @can('list-role')
                                <li><a href="{{ url('role/showRole') }}">Danh sách vai trò</a></li>
                            @endcan
                        </ul>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-address-book"></i>
                            </div>
                            Quyền
                        </a>
                        <i class="arrow fas fa-angle-right"></i>

                        <ul class="sub-menu">
                            <li><a href="{{ url('permission/addPermission') }}">Danh sách quyền</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div id="wp-content">
                @yield('wp-content')
            </div>
        </div>
    </div>
    <script src="{{ url('public/js/jquery.js') }}"></script>
    <script src="{{ url('public/js/app.js') }}"></script>
    {{-- <script src="{{url('public/js/jquery.js')}}"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"></script>
    <?php $cancelOrders = DB::table('list_orders')
        ->where('status', 'Hủy đơn hàng')
        ->get(); ?>
    <script>
        // SELECT 2
        $('#select2_init').select2({
            'placeholder': 'Chọn vai trò'
        });
        // Chart
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Đơn hàng thành công', 'Số lượng đơn hàng xử lí', 'Danh số', 'Đơn hàng hủy',
                    'Đang vận chuyển',
                    'Thành viên'
                ],
                datasets: [{
                    label: 'Biểu đồ quản lí đơn hàng',
                    data: [12, 8, 3, 5, 2, 3],
                    backgroundColor: [
                        'red',
                        'blue',
                        'yellow',
                        'black',
                        'gray',
                        'green',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>
