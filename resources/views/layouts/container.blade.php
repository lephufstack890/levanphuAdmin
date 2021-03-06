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
    <title>Qu???n tr??? h??? th???ng</title>
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
                                <div class="col-12"><span>B???n c?? ch???c ch???n x??a danh m???c n??y kh??ng?</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-danger" data-bs-dismiss='modal'>H???y
                            b???</a>
                        <a id="yesObtion" href="" class="btn btn-primary">?????ng
                            ??</a>
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
                                <div class="col-12"><span>N???u x??a th?? b???n kh??ng th??? kh??i ph???c danh m???c b???n ch???c
                                        ch???n x??a ch????</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-danger" data-bs-dismiss='modal'>H???y
                            b???</a>
                        <a id="yespermanentlydelete" href="" class="btn btn-primary">?????ng
                            ??</a>
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
                                <div class="col-12"><span>B???n ?????ng ?? x??a ch???t li???u n??y kh??ng?</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-danger" data-bs-dismiss='modal'>H???y
                            b???</a>
                        <a id="yesdeleteMaterial" href="" class="btn btn-primary">?????ng
                            ??</a>
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
                                <div class="col-12"><span>B???n ?????ng ?? x??a m??u s???c n??y kh??ng?</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-danger" data-bs-dismiss='modal'>H???y
                            b???</a>
                        <a id="yesdeleteColor" href="" class="btn btn-primary">?????ng
                            ??</a>
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
                                <div class="col-12"><span>B???n c?? ch???c ch???n x??a b??i vi???t n??y kh??ng?</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-danger" data-bs-dismiss='modal'>H???y
                            b???</a>
                        <a id="yesdelete" href="" class="btn btn-primary">?????ng
                            ??</a>
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
                                <div class="col-12"><span>B???n c?? ch???c ch???n x??a s???n ph???m n??y kh??ng?</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-danger" data-bs-dismiss='modal'>H???y
                            b???</a>
                        <a id="yesdeleteProduct" href="" class="btn btn-primary">?????ng
                            ??</a>
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
                                <div class="col-12"><span>N???u x??a th?? b???n kh??ng th??? kh??i ph???c s???n ph???m b???n ch???c
                                        ch???n x??a ch????</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-danger" data-bs-dismiss='modal'>H???y
                            b???</a>
                        <a id="yespermanentlydeleteproduct" href="" class="btn btn-primary">?????ng
                            ??</a>
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
                                <div class="col-12"><span>B???n c?? ch???c ch???n x??a trang n??y kh??ng?</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-danger" data-bs-dismiss='modal'>H???y
                            b???</a>
                        <a id="yesdeletePage" href="" class="btn btn-primary">?????ng
                            ??</a>
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
                                <div class="col-12"><span>N???u x??a th?? b???n kh??ng th??? kh??i ph???c trang b???n ch???c
                                        ch???n x??a ch????</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-danger" data-bs-dismiss='modal'>H???y
                            b???</a>
                        <a id="yespermanentlydeletepage" href="" class="btn btn-primary">?????ng
                            ??</a>
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
                                <div class="col-12"><span>B???n c?? ch???c ch???n x??a th??nh vi??n n??y kh??ng?</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-danger" data-bs-dismiss='modal'>H???y
                            b???</a>
                        <a id="yesdeleteUser" href="" class="btn btn-primary">?????ng
                            ??</a>
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
                                <div class="col-12"><span>B???n c?? ch???c ch???n x??a vai tr?? n??y kh??ng?</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-danger" data-bs-dismiss='modal'>H???y
                            b???</a>
                        <a id="yesdeleteRole" href="" class="btn btn-primary">?????ng
                            ??</a>
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
                                <div class="col-12"><span>B???n c?? ch???c ch???n x??a th??nh vi??n n??y kh??ng?</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-danger" data-bs-dismiss='modal'>H???y
                            b???</a>
                        <a id="yesdeleteSlider" href="" class="btn btn-primary">?????ng
                            ??</a>
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
                                <div class="col-12"><span>B???n c?? ch???c ch???n x??a ????n h??ng n??y kh??ng?</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-danger" data-bs-dismiss='modal'>H???y
                            b???</a>
                        <a id="yesdeleteOrder" href="" class="btn btn-primary">?????ng
                            ??</a>
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
                        <a class="dropdown-item" href="{{ url('post/addPost') }}">Th??m b??i vi???t</a>
                        <a class="dropdown-item" href="{{ url('product/addProduct') }}">Th??m s???n ph???m</a>
                        <a class="dropdown-item" href="{{ url('order/showOrder') }}">Th??m ????n h??ng</a>
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
            {{-- Ch???c do c??i ss out ????y --}}
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
                                <li><a href="{{ url('page/addPage') }}">Th??m m???i</a></li>
                            @endcan
                            @can('list-page')
                                <li><a href="{{ url('page/showPage') }}">Danh s??ch</a></li>
                            @endcan
                            <li><a href="{{ url('page/catPage') }}">Danh m???c</a></li>
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
                                <li><a href="{{ url('slider/addSlider') }}">Th??m m???i</a></li>
                            @endcan
                            @can('list-slider')
                                <li><a href="{{ url('slider/showSlider') }}">Danh s??ch slider</a></li>
                            @endcan
                        </ul>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-file-word"></i>
                            </div>
                            B??i vi???t
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            @can('add-post')
                                <li><a href="{{ url('post/addPost') }}">Th??m m???i</a></li>
                            @endcan
                            @can('list-post')
                                <li><a href="{{ url('post/showPost') }}">Danh s??ch</a></li>
                            @endcan
                            @can('add-cat-post')
                                <li><a href="{{ url('post/catPost') }}">Danh m???c</a></li>
                            @endcan
                        </ul>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fab fa-product-hunt"></i>
                            </div>
                            S???n ph???m
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            @can('add-product')
                                <li><a href="{{ url('product/addProduct') }}">Th??m s???n ph???m</a></li>
                            @endcan
                            @can('add-material')
                                <li><a href="{{ url('product/materialProduct') }}">Th??m ch???t li???u</a></li>
                            @endcan
                            @can('add-color')
                                <li><a href="{{ url('product/colorProduct') }}">Th??m m??u s???c</a></li>
                            @endcan
                            @can('list-product')
                                <li><a href="{{ url('product/showProduct') }}">Danh s??ch s???n ph???m</a></li>
                            @endcan
                            @can('add-cat-product')
                                <li><a href="{{ url('product/catProduct') }}">Th??m danh m???c</a></li>
                            @endcan
                        </ul>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-luggage-cart"></i>
                            </div>
                            B??n h??ng
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            @can('list-order')
                                <li><a href="{{ url('order/showOrder') }}">????n h??ng</a></li>
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
                                <li><a href="{{ url('user/addUser') }}">Th??m m???i</a></li>
                            @endcan
                            @can('list-user')
                                <li><a href="{{ url('user/showUser') }}">Danh s??ch</a></li>
                            @endcan
                        </ul>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-users"></i>
                            </div>
                            Danh s??ch vai tr??
                        </a>
                        <i class="arrow fas fa-angle-right"></i>

                        <ul class="sub-menu">
                            @can('add-role')
                                <li><a href="{{ url('role/addRole') }}">Th??m m???i vai tr??</a></li>
                            @endcan
                            @can('list-role')
                                <li><a href="{{ url('role/showRole') }}">Danh s??ch vai tr??</a></li>
                            @endcan
                        </ul>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-address-book"></i>
                            </div>
                            Quy???n
                        </a>
                        <i class="arrow fas fa-angle-right"></i>

                        <ul class="sub-menu">
                            <li><a href="{{ url('permission/addPermission') }}">Danh s??ch quy???n</a></li>
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
        ->where('status', 'H???y ????n h??ng')
        ->get(); ?>
    <script>
        // SELECT 2
        $('#select2_init').select2({
            'placeholder': 'Ch???n vai tr??'
        });
        // Chart
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['????n h??ng th??nh c??ng', 'S??? l?????ng ????n h??ng x??? l??', 'Danh s???', '????n h??ng h???y',
                    '??ang v???n chuy???n',
                    'Th??nh vi??n'
                ],
                datasets: [{
                    label: 'Bi???u ????? qu???n l?? ????n h??ng',
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
