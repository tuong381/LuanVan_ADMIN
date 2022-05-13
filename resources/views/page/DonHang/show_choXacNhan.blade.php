
@extends('welcome')
@section('content')


<div class="page-title-breadcrumbs">
    <div class="breadcrumbs-container container">
        <div class="breadcrumbs_wrapper">
            <div class="page-title-container">
                <h1 class="text-center">Market Online</h1>
            </div>
            <div class="breadcrumbs-container text-center">
                <ul class="breadcrumbs primary-font">
                    <li><a href="{{URL::to('/trang-chu')}}"><span style="font-family: 'FontAwesome';">Trang chủ</span></a>
                    </li>
                    <li class="breadcrumb-sep">/</li>
                    <li><span style="font-family: 'FontAwesome';">Danh sách đơn hàng</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="section about">
                <div class="container">

                    <div class="content-about text-center m-top">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-12 mg-bottom-50" style="max-width: 20%;">
                                <div class="item">

                                    <div class="item-content">
                                        <div class="sub-title">
                                            <h4 ><a href="{{URL::to('/xem-danh-sach-don-hang')}}"
                                                style="color: black">Tất cả đơn hàng</a></h4>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 mg-bottom-50" style="max-width: 20%;">
                                <div class="item">

                                    <div class="item-content">
                                        <div class="sub-title">
                                            <h4><a href="{{URL::to('/xem-danh-sach-don-hang-1')}}"
                                                style="color: chocolate">Chờ xác nhận</a></h4>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-12 mg-bottom-50" style="max-width: 20%;">
                                <div class="item">

                                    <div class="item-content">
                                        <div class="sub-title">
                                            <h4><a href="{{URL::to('/xem-danh-sach-don-hang-4')}}"
                                                style="color: black">Đã xác nhận</a></h4>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-12 m-b-50" style="max-width: 20%;">
                                <div class="item">

                                    <div class="item-content">
                                        <div class="sub-title">
                                             <h4><a href="{{URL::to('/xem-danh-sach-don-hang-2')}}"
                                                style="color: black">Đang giao</a></h4>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12" style="max-width: 20%;">
                                <div class="item">

                                    <div class="item-content">
                                        <div class="sub-title">
                                           <h4><a href="{{URL::to('/xem-danh-sach-don-hang-3')}}"
                                                style="color: black">Đã hủy</a></h4>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <br><br>



                  <table class="table table-hover" style="text-align: center; box-shadow: 1px 1px 3px 0px rgb(0 0 0 / 20%), 0 1px 0 rgb(0 0 0 / 7%), inset 0 0 0 1px rgb(0 0 0 / 5%);">
                    <thead style="color: #91ad41">
                      <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Tình trạng đơn hàng</th>
                        <th>Tổng đơn hàng</th>
                        <th>Quản lý</th>
                      </tr>
                    </thead>
                    <tbody >

                        <?php
                            $i=0;

                        ?>

                        @foreach($id_kh as $key=>$show)
                        <?php
                            $i++;

                        ?>

                          <tr >

                            <td>{{$i}}</td>
                            <td>{{$show->id_HD}}</td>
                            <td>{{$show->Ngay_DH}}</td>
                            <td>
                                @if($show->TrangThaiHoaDon == 1)
                                   Chờ xác nhận

                                @elseif($show->TrangThaiHoaDon == 2)
                                     Đang giao
                                @elseif($show->TrangThaiHoaDon == 3)
                                    Đã hủy

                                @elseif($show->TrangThaiHoaDon == 4)
                                    Đã xác nhận

                                @endif

                            </td>
                            <td> {{$show->TongHoaDon}}  </td>
                            <td ><a href="{{URL::to('/xem-chi-tiet-danh-sach-don-hang/'.$show->id_HD)}}" style="color: #91ad41" >Xem đơn hàng  </a></td>



                          </tr>




                      @endforeach
                    </tbody>
                  </table>






                </div>
            </div>


@endsection
