<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('public/backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('public/backend/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <link href="{{asset('public/backend/css/formValidation.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/sweetalert.css')}}">

    <link href="{{asset('public/backend/css/sb-admin-2.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">



    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> --}}




</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->


        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"  >

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{URL::to('Dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
               Quản Lý
            </div>

            <!-- MENU QUAN LY DANH MUC SAN PHAM-->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-list"></i>
                    <span>Danh Mục Sản Phẩm </span>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                       {{--  <h6 class="collapse-header">Custom Components:</h6> --}}
                        <a class="collapse-item" href="{{URL::to('/admin-them-DanhMucTB')}}">Thêm danh Mục</a>
                        <a class="collapse-item" href="{{URL::to('/admin-lietke-DanhMucTB')}}">Liệt Kê Danh Mục</a>

                    </div>
                </div>
            </li>



            <!-- MENU QUAN LY SAN PHAM -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                     <i class="fas fa-store"></i>
                    <span>Sản Phẩm</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="{{URL::to('/admin-them-SanPham')}}">Thêm Sản Phẩm</a>
                        <a class="collapse-item" href="{{URL::to('/admin-lietke-SanPham')}}">Liệt Kê Sản Phẩm</a>

                    </div>
                </div>
            </li>



            <!-- Divider -->
           {{--  <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div> --}}
            <!-- MENU QUAN LY DICH VU  -->

              <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseService"
                    aria-expanded="true" aria-controls="collapseService">
                  <i class="fas fa-gift"></i>
                    <span>Dịch Vụ</span>
                </a>
                <div id="collapseService" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="{{URL::to('/admin-them-DichVu')}}">Thêm Dịch Vụ</a>
                        <a class="collapse-item" href="{{URL::to('/admin-lietke-DichVu')}}">Liệt Kê Dịch Vụ</a>

                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->






             <!-- NAV ITEM - DANH MUC BAI VIET   -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseImage"
                    aria-expanded="true" aria-controls="collapseImage">
                    <i class="fas fa-images"></i>
                    <span>Danh Mục Bài Viết </span>
                </a>
                <div id="collapseImage" class="collapse" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="{{URL::to('/admin-them-DanhMucBaiViet')}}">Thêm danh mục</a>
                        <a class="collapse-item" href="{{URL::to('/admin-lietke-DanhMucBaiViet')}}">Liệt kê danh mục</a>


                    </div>
                </div>
            </li>

            <!-- Nav Item - BAI VIET -->
         <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse"
                    aria-expanded="true" aria-controls="collapse">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Bài Viết</span>
                </a>
                <div id="collapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                         <a class="collapse-item" href="{{URL::to('/admin-them-BaiViet')}}">Thêm bài viết</a>
                        <a class="collapse-item" href="{{URL::to('/admin-lietke-BaiViet')}}">Liệt kê bài viết</a>


                    </div>
                </div>
            </li>

            <!-- MENU QUAN LY KHACH HANG  -->

              <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHoaDon"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-users"></i>
                    <span>Khách Hàng</span>
                </a>
                <div id="collapseHoaDon" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="{{URL::to('/admin-lietke-KhachHang')}}">Liệt kê khách hàng</a>

                    </div>
                </div>
            </li>


            <!-- NAV ITEM USER   -->
      {{--      @hasrole('QTV')   --}}


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
                    aria-expanded="true" aria-controls="collapseUser">
                    <i class="fas fa-users"></i>
                    <span>Nhân Viên</span>
                </a>
                <div id="collapseUser" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                          <a class="collapse-item" href="{{URL::to('/admin-them-NhanVien')}}">Thêm nhân viên
                          </a>
                         <a class="collapse-item" href="{{URL::to('/lietke-user')}}">Liệt kê nhân viên</a>


                    </div>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLichHen"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Lịch hẹn</span>
                </a>
                <div id="collapseLichHen" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                         <a class="collapse-item" href="{{URL::to('/admin-lietke-LichHen')}}">Liệt kê lịch hẹn</a>


                    </div>
                </div>
            </li>

             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-edit"></i>
                    <span>Hóa đơn</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                         <a class="collapse-item" href="{{URL::to('/admin-lietke-HoaDon')}}">Liệt kê hóa đơn</a>


                    </div>
                </div>
            </li>



    {{--         @endhasrole        --}}

            <!-- Nav Item - Tables -->
            {{-- <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li> --}}

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>


        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                         <li class="nav-item dropdown no-arrow mx-1">

                           {{--  <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a> --}}

                            <div id="soluongDH"></div>
                            <!-- Dropdown - Alerts -->
                            {{-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div> --}}
                        </li>



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">

                                   {{--  <?php
                                        $ten =Auth::user()->HoTenAD;
                                        if($ten){
                                            echo $ten;

                                        }

                                    ?> --}}

                                </span>
                                {{-- <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg"> --}}
                                    <i class="fas fa-user" style="color: #4e73df"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{URL::to('/admin-tai-khoan-cua-toi')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Tài khoản của tôi
                                </a>
                                 <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{URL::to('/admin-doi-mat-khau')}}">
                                    <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đổi mật khẩu
                                </a>
                               {{--  <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> --}}
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đăng xuất
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid" >

                    <!-- Page Heading -->


                     @yield('ad_content')


                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="    font-family: 'Font Awesome 5 Free'; font-size: 18px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: #4e73df">Bạn Muốn Đăng Xuất?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Chọn "Đăng xuất" nếu bạn thực sự muốn đăng xuất.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                    <a class="btn btn-primary" href="{{URL::to('/admin-Logout')}}">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('public/backend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('public/backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('public/backend/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('public/backend/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('public/backend/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('public/backend/js/demo/chart-pie-demo.js')}}"></script>

    <script src="{{asset('public/backend/js/jquery.form-validator.min.js')}}"></script>

    <script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>

    {{-- chartjs--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

     {{-- toastr  --}}
     <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
     {!! Toastr::message() !!}

    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    <script type="text/javascript">
        CKEDITOR.replace('ckeditor_sanpham');
        CKEDITOR.replace('ckeditor_sua_sanpham');
        CKEDITOR.replace('ckeditor_baiviet');
        CKEDITOR.replace('ckeditor_sua_baiviet');
    </script>


   {{--  <script type="text/javascript">
        $.validate({

        });
    </script> --}}


    <script type="text/javascript">
        $('.xu-ly-don-hang').change(function(){
            var TrangThaiHoaDon = $(this).val();
            var id_HD = $(this).children(":selected").attr("idHD");
            var id_SanPham = $(this).children(":selected").attr("idSP");
            //alert(id_HD);alert(id_SanPham);
            var _token = $('input[name="_token"]').val();
            var SoLuong_SPDaBan=1;
        //    alert(SoLuong_SPDaBan);

            //lay so luong
            soluong = [];
            $("input[name='sl']").each(function(){

                soluong.push($(this).val());

            });
            // lay ra id sp

            order_idsp = [];

            $("input[name='kiemtra_idSP']").each(function(){

                order_idsp.push($(this).val());

            });
            j=0;

            for(i=0;i<order_idsp.length;i++){
                var order_sl= $('.sl_mua_'+order_idsp[i]).val();    // so luong khach dat
                var order_sl_kho= $('.sl_kho_'+order_idsp[i]).val();
                if(parseInt(order_sl) > parseInt(order_sl_kho)){

                  j=j+1;
                  if(j==1){
                       alert("Số lượng trong kho không đủ!");
                  }

                    $('.color_qty_'+order_idsp[i]).css('background','#ccd3e8');
                }

            }
            if(j==0){
                $.ajax({
                    url : '{{url('/admin-capnhat-soluong-DonHang')}}',
                    method : 'POST',
                    data : {_token:_token,  TrangThaiHoaDon:TrangThaiHoaDon, id_HD:id_HD,
                     id_SanPham:id_SanPham, SoLuong_SPDaBan:SoLuong_SPDaBan},
                    success:function(data){
                        alert('Đơn hàng đã được xử lý');
                        location.reload();
                    }
                });

            }



        })
    </script>

    <!--  thu vien hinh anh  -->
    <script type="text/javascript">

        $(document).ready(function(){

             load_image();

            function load_image(){
                var id_SP = $('.id_SP').val();
                // alert(id_SP);
                var _token = $('input[name="_token"]').val();
               $.ajax({
                url: "{{url('/admin-lietke-ThuVienAnh')}}",
                method: "POST",
                data:{id_SP:id_SP, _token:_token},
                success:function(data){
                    $('#image_load').html(data);

                }
               });
            }

            $('#file').change(function(){

                var error='';
                var files = $('#file')[0].files;

                if(files.length >4){
                    error +='<span style="font-size: 20px;"> Bạn chỉ được thêm tối đa 4 ảnh</span>';
                }

                if(error==''){

                }else{
                    $('#file').val('');
                    $('#error_image').html('<span class="text-danger">'+error+'</span>');
                    return false;
                }
            });


            $(document).on('click','.delete-anh',function(){

                var anh_id = $(this).data('anh_id');
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{url('/admin-xoa-Anh')}}",
                    method: "POST",
                    data:{anh_id:anh_id, _token:_token},
                    success:function(data){
                        load_image();
                        $('#error_image').html('<span class="text-danger">Xóa hình ảnh thành công</span>');

                }
               });

            })

        });
    </script>

    <script type="text/javascript">

         $(document).ready(function(){

            // show so luong gio hang
            soluong_DH();
            function soluong_DH(){
                $.ajax({
                     url:'{{url('/show-so-luong-don-hang')}}',
                     method:"GET",

                     success:function(data){
                        $('#soluongDH').html(data);
                     }

                });

            }
        }
    </script>

    <script src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true
                }).datepicker('update', new Date());
            });
    </script>
    <link rel="stylesheet prefetch" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css"><script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>



  {{--   <script >

            var ctx = document.getElementById('myChart').getContext('2d');
            var data=json_encode($data1);
            var myChart = new Chart(ctx, {


                elsement:'myChart',
                type: 'bar',
                data: {
                    labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6','Tháng 7',
                        'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                    datasets: [{
                        label: 'Thống kê doanh thu',
                        data:   [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',

                            // 'rgba(255, 99, 132, 0.2)',
                            // 'rgba(54, 162, 235, 0.2)',
                            // 'rgba(255, 206, 86, 0.2)',
                            // 'rgba(75, 192, 192, 0.2)',
                            // 'rgba(153, 102, 255, 0.2)',
                            // 'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',

                            // 'rgba(255, 99, 132, 0.2)',
                            // 'rgba(54, 162, 235, 0.2)',
                            // 'rgba(255, 206, 86, 0.2)',
                            // 'rgba(75, 192, 192, 0.2)',
                            // 'rgba(153, 102, 255, 0.2)',
                            // 'rgba(255, 159, 64, 0.2)'
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


</script> --}}


<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
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
