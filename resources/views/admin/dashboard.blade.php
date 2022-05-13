
@extends('Admin_index')
@section('ad_content')

<?php
      $message = Session::get('message');
       if($message){
          echo '<span class="text-alert">'.$message.'</span>';
          Session::put('message',null);
        }

    ?>

                  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800" style="font-weight: 700; font-family: 'Font Awesome 5 Free';
                        font-size: 35px;" >Trang Chủ</h1>

                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Sản phẩm</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$sanpham}} sản phẩm</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-gift fa-2x text-gray-300"></i>
                                           {{--  fas fa-calendar --}}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Bài viết</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" class="price" class="money" > {{$baiviet}} bài viết
                                                </div>
                                        </div>
                                        <div class="col-auto">

                                            <i class="fas fa-comment-dots fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Đơn hàng
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        {{$donhang}} đơn hàng
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Tổng doanh thu</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{number_format($doanhso, 3, '.', '.')}}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                              <i class=" fa-2x text-gray-300" style="font-weight: 800;">vnđ</i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>


                    <div class="row">




                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Khách hàng
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        {{$khachhang}}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                          {{--   <i class="fas fa-clipboard-list fa-2x text-gray-300"></i> --}}
                                           {{--  <i class=" fa-2x text-gray-300" style="font-weight: 500;">người</i> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Nhân viên</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{$nhanvien}}
                                            </div>
                                        </div>
                                        {{-- <div class="col-auto">
                                              <i class=" fa-2x text-gray-300" style="font-weight: 800;">vnđ</i>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>


                      <canvas id="myChart" style="width: 900px !important; height: 500px;"></canvas>



</div>


@endsection
