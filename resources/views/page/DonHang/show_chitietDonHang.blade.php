
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
                    <li><span style="font-family: 'FontAwesome';">Chi tiết đơn hàng</span>
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
                                                style="color: black">Chờ xác nhận</a></h4>
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

                    <div class="title text-center">
                        <div class="page-title color">
                            <h3 class="title-main">Market Online</h3>
                            <div class="title title-icon">
                                <h2 class="title-h2">Chi tiết đơn hàng</h2>

                            </div>
                        </div>
                    </div>

                    <br><br>



            <div class="<div class=">
                <div class="container" >
                    <div class="row" style="margin-left: 4rem; width: 100rem;">
                        <div class="col-md-7 col-sm-12 m-b-50">

                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="content">
                                    <p class="title-black" style="background-color: antiquewhite;height: 2.5rem; padding: 0.5rem;">THÔNG TIN ĐƠN HÀNG</p>

                                        @foreach($show_DH as $key=>$chitiet)
                                        <p>Mã đơn hàng : {{$chitiet->id_HD}}</p>
                                        <p>Ngày đặt hàng : {{$chitiet->Ngay_DH}}</p>
                                        <p>Trạng thái đơn hàng :

                                            @if($chitiet->TrangThaiHoaDon == 1)
                                               Chờ xác nhận

                                            @elseif($chitiet->TrangThaiHoaDon == 2)
                                                 Đang giao
                                            @elseif($chitiet->TrangThaiHoaDon == 3)
                                                Đã hủy

                                            @elseif($chitiet->TrangThaiHoaDon == 4)
                                                Đã xác nhận

                                            @endif

                                        </p>

                                        @if($chitiet->TrangThaiHoaDon == 3)
                                            <p>Lý do hủy đơn: {{$chitiet->LyDoHuyDon}}</p>

                                        @endif

                                        @endforeach
                                    </div>


                                </div>


                                <div class="col-md-6 col-sm-12">
                                    <div class="content">
                                        <p class="title-black" style="background-color: antiquewhite;height: 2.5rem; padding: 0.5rem;">THÔNG TIN CHI TIẾT</p>

                                         @foreach($show_chitietDH as $key=>$chitiet)
                                        <p>Tên sản phẩm : {{$chitiet->TenSanPham}}  </p>
                                        <p>Giá : {{number_format($chitiet->Gia)}} vnđ</p>
                                        <p>Số lượng mua :  {{$chitiet->SoLuongMua}}  </p>
                                        <p>Lưu ý giao hàng : {{$chitiet->GhiChu_DH}}</p>

                                        @endforeach
                                    </div>
                                </div>


                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="content">
                                        <p class="title-black" style="background-color: antiquewhite;height: 2.5rem; padding: 0.5rem;">NGƯỜI NHẬN</p>
                                        @foreach($show_DH as $key=>$chitiet)
                                        <p>Tên người nhận : {{$chitiet->TenDatHang}}</p>
                                        <p>Ngày đặt hàng : {{$chitiet->Ngay_DH}}</p>
                                        <p>Số điện thoại : {{$chitiet->SoDienThoai_DH}}</p>
                                        <p>Email : {{$chitiet->Email_DH}}</p>
                                        <p>Địa chỉ nhận hàng : {{$chitiet->DiaChi_DH}}</p>

                                        @endforeach
                                    </div>

                                </div>

                                 <div class="col-md-6 col-sm-12">
                                    <div class="content">
                                        <p class="title-black" style="background-color: antiquewhite;height: 2.5rem; padding: 0.5rem;">CHI PHÍ </p>
                                         @foreach($show_chiphi as $key=>$chitiet)
                                        <p>Phí vận chuyển : Free shipping</p>
                                        <p>Phương thức thanh toán : {{$chitiet->PhuongThucThanhToan}}</p>
                                        <p>Tổng hóa đơn : {{$chitiet->TongHoaDon}} vnđ</p>

                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <br>
                            @foreach($show_DH as $key=>$chitiet)
                                @if($chitiet->TrangThaiHoaDon == 1)


                                {{-- <form>
                                 @csrf --}}
                                     <!-- Trigger the modal with a button -->
                                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#huydon" style="background: #91ad41;  border-color: #91ad41;font-family: oppins,Helvetica,Arial,sans-serif;
                                         font-size: 14px;" >HỦY ĐƠN HÀNG</button>

                                    <!-- Modal -->
                                    <div id="huydon" class="modal fade" role="dialog">
                                      <div class="modal-dialog" style="    margin-top: 10rem;">

                                        <form>
                                            @csrf

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                          <div class="modal-header">

                                            <p style="margin-left: 8rem; font-size: 20px; color: #91ad41;">
                                                Lý do hủy đơn hàng</p>
                                          </div>
                                          <div class="modal-body">
                                            <p><textarea rows="4"  placeholder="Lý do hủy đơn" required
                                                style=" width: 28rem" class="lydohuydon"></textarea></p>
                                          </div>
                                          <div class="modal-footer">

                                            <button type="button" class="btn btn-success"
                                                data-dismiss="modal" id="{{$chitiet->id_HD}} "
                                                onclick="Huydonhang(this.id)" style="background: #91ad41;
                                                border-color: #91ad41;">Gửi
                                            </button>

                                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>


                                          </div>
                                        </div>

                                        </form>

                                      </div>
                                    </div>

                                @endif
                            @endforeach

                        </div>

                    </div>


                </div>
            </div>





                </div>
            </div>



@endsection
