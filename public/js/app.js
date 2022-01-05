$(document).ready(function () {
    $('.nav-link.active .sub-menu').slideDown();
    $("p").slideUp();

    $('#sidebar-menu .nav-link a').click(function () {
        $(this).parents('li').children('.sub-menu').slideToggle();
        $(this).parents('li').toggleClass('fa-angle-right fa-angle-down');
    });

    // $('#sidebar-menu>li>a').click(function () {
    //     // $('#sidebar-menu i.arrow').addClass('deg');
    //     if (!$(this).parent('li').hasClass('deg')) {
    //         $(this).parent('li').addClass('deg');
    //     }
    //     return false;
    // });

    $("input[name='checkall']").click(function () {
        var checked = $(this).is(':checked');
        $('.table-checkall tbody tr td input:checkbox').prop('checked', checked);
    });

    $("#upload_multi").click(function (event) {
        // var data = new FormData(this);
        var inputFile = $('#file');
        var fileToUpload = inputFile[0].files;
        if (fileToUpload.length > 0) {
            // alert(fileToUpload.length);
            var formData = new FormData();
            for (var i = 0; i < fileToUpload.length; i++) {
                var file = fileToUpload[i];
                formData.append('file[]', file, file.name);
            }
            $.ajax({
                url: 'process_upload',
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'text',
                success: function (data) {
                    $("#result").html(data);
                    //thieeus rooif nhe
                    // console.log(data);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
        //alert('ok');
        return false;
    });

    // Cập nhật hình ảnh
    $("#multi_update").click(function (event) {
        // var data = new FormData(this);
        var inputFile = $('#file');
        var fileToUpload = inputFile[0].files;
        if (fileToUpload.length > 0) {
            // alert(fileToUpload.length);
            var formData = new FormData();
            for (var i = 0; i < fileToUpload.length; i++) {
                var file = fileToUpload[i];
                formData.append('file[]', file, file.name);
            }
            $.ajax({
                url: '/Admin/product/updateProduct/process_update',
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'text',
                success: function (data) {
                    $("#result").html(data);
                    //thieeus rooif nhe
                    // console.log(data);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
        //alert('ok');
        return false;
    });
    // Checked
    $('.checkbox_wp').on('click', function () {
        $(this).parents('.card').find('.checkbox_child').prop('checked', $(this).prop('checked'));
    });
    // Checkall
    $('#check_all').on('click', function () {
        $(this).parents().find('.checkbox_child').prop('checked', $(this).prop('checked'));
        $(this).parents().find('.checkbox_wp').prop('checked', $(this).prop('checked'));
    });
    // GIT
    
});

function myFunction(id) {
    $('#yesObtion').attr('href', 'deleteCatpost/' + id);
    $('#demo-modal').modal('show');
}

function myDeletepost(id) {
    $('#yesdelete').attr('href', 'deletePost/' + id);
    $('#demo-modal-deletePost').modal('show');
}

function permanentlyDeletepost(id) {
    $('#yespermanentlydelete').attr('href', 'permanentlydeletePost/' + id);
    $('#demo-modal-permanentlydeletePost').modal('show');
}

function mydeleteCatproduct(id) {
    $('#yesObtion').attr('href', 'deleteCatproduct/' + id);
    $('#demo-modal').modal('show');
}

function myDeletematerial(id) {
    $('#yesdeleteMaterial').attr('href', 'deleteMaterial/' + id);
    $('#demo-modal-deleteMaterial').modal('show');
}

function myDeleteColor(id) {
    $('#yesdeleteColor').attr('href', 'deleteColor/' + id);
    $('#demo-modal-deleteColor').modal('show');
}

function myDeleteProduct(id) {
    $('#yesdeleteProduct').attr('href', 'deleteProduct/' + id);
    $('#demo-modal-deleteProduct').modal('show');
}

function permanentlyDeleteproduct(id) {
    $('#yespermanentlydeleteproduct').attr('href', 'permanentlydeleteproduct/' + id);
    $('#demo-modal-permanentlydeleteproduct').modal('show');
}

// Xóa danh mục trang

function myDeletecatpage(id) {
    $('#yesObtion').attr('href', 'deleteCatpage/' + id);
    $('#demo-modal').modal('show');
}

// Xóa tạm thời trang

function myDeletepage(id) {
    $('#yesdeletePage').attr('href', 'deletePage/' + id);
    $('#demo-modal-deletePage').modal('show');
}
// Xóa vĩnh viễn trang
function permanentlyDeletepage(id) {
    $('#yespermanentlydeletepage').attr('href', 'permanentlydeletepage/' + id);
    $('#demo-modal-permanentlydeletepage').modal('show');
}
// Xóa user
function myDeleteUser(id) {
    $('#yesdeleteUser').attr('href', 'deleteUser/' + id);
    $('#demo-modal-deleteUser').modal('show');
}
// Xóa vai trò
function myDeleteRole(id) {
    $('#yesdeleteRole').attr('href', 'deleteRole/' + id);
    $('#demo-modal-deleteRole').modal('show');
}
// Xóa slider
function myDeleteSlider(id) {
    $('#yesdeleteSlider').attr('href', 'deleteSlider/' + id);
    $('#demo-modal-deleteSlider').modal('show');
}
// Xóa đơn hàng
function myDeleteOrder(id) {
    $('#yesdeleteOrder').attr('href', 'deleteOrder/' + id);
    $('#demo-modal-deleteOrder').modal('show');
}




