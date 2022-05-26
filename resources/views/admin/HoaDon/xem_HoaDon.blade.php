@extends('Admin_index')
@section('ad_content')

{{--  thong tin van chuyen --}}




  <div style="width: 49%;height: 30rem;  float: left;
       box-shadow: 0 0.15rem 1.75rem 0 rgb(58 59 69 / 15%) !important;">

 <div class="container-fluid" style="   margin-top: 2rem;">


      <div class="d-sm-flex align-items-center justify-content-between mb-4"  >
             <h1 class="h3 mb-0 text-gray-800" style="margin-left: 10rem; font-weight: 700;
            font-family: 'Font Awesome 5 Free'; font-size: 30px;">Thông tin khách hàng</h1>

         </div>

          <?php
                $message = Session::get('message');
                 if($message){
                    echo '<span style="color:red; font-style: italic;}">'.$message.'<p></p></span>';
                    Session::put('message',null);
                  }

          ?>

          <div>

            <form  action="{{URL::to('/luu_DichVu')}}" method="post" class="templatemo-login-form"  enctype="multipart/form-data" style="margin-left: 3rem;" >

            @foreach($xem_HoaDon as $key=>$xem)


                  <div style="margin-top: 1rem;">
                    <label style="color: #4e73df; margin-left: 4rem; width:10rem">Tên khách hàng: </label>
                    <label style="margin-left: 1rem">{{$xem->TenKH}}</label>

                  </div>


                 {{--  <div style="margin-top: 1rem;">
                    <label style="color: #4e73df; margin-left: 4rem; width:10rem">Hình ảnh: </label>
                    <img src="{{$xem->HinhAnh}}" style="height: 100px;width: 100px; margin-left: 1rem" >

                  </div> --}}

                  <div style="margin-top: 1rem;">
                    <label style="color: #4e73df; margin-left: 4rem; width:10rem">Email: </label>
                    <label style="margin-left: 1rem">{{$xem->Email}}</label>

                  </div>

                  <div style="margin-top: 1rem;" >
                    <label style="color: #4e73df; margin-left: 4rem; width:10rem">Số điện thoại: </label>
                    <label style="margin-left: 1rem">{{$xem->SoDienThoai}}</label>

                  </div>

                  <div style="margin-top: 1rem;" >
                    <label style="color: #4e73df; margin-left: 4rem; width:10rem">Địa chỉ: </label>
                    <label style="margin-left: 1rem">{{$xem->DiaChi}}</label>

                  </div>



              @endforeach

                <br><br><br>

            </form>

            </div>


        </div>
  </div>


  <div style="width: 49%; height: 30rem;  float: right;
      box-shadow: 0 0.15rem 1.75rem 0 rgb(58 59 69 / 15%) !important;">

      <div class="container-fluid" style="   margin-top: 2rem;">


      <div class="d-sm-flex align-items-center justify-content-between mb-4"  >
             <h1 class="h3 mb-0 text-gray-800" style="margin-left: 10rem; font-weight: 700;
            font-family: 'Font Awesome 5 Free'; font-size: 30px;">Thông tin hóa đơn</h1>

         </div>

      <div>

            <form class="templatemo-login-form"  enctype="multipart/form-data" style="margin-left: 3rem;" >

            @foreach($xem_HoaDon as $key=>$xem)


                  @if($xem->id_LichHen!=='NULL')

                        @foreach($xem_DichVu as $key=>$dichvu)


                          <div style="margin-top: 1rem;">
                            <label style="color: #4e73df; margin-left: 4rem; width:10rem">Tên dịch vụ: </label>
                            <label style="margin-left: 1rem;">{{$dichvu->TenVe}}</label>
                          </div>

                          <div style="margin-top: 1rem;">
                            <label style="color: #4e73df; margin-left: 4rem; width:10rem">Giá: </label>
                            <label style="margin-left: 1rem">{{$dichvu->TongTien}}</label>
                          </div>

                          <div style="margin-top: 1rem;">
                            <label style="color: #4e73df; margin-left: 4rem; width:10rem">Ngày đăng ký: </label>
                            <label style="margin-left: 1rem">{{$dichvu->NgayDK}}</label>
                          </div>

                          <div style="margin-top: 1rem;">
                            <label style="color: #4e73df; margin-left: 4rem; width:10rem">Giờ đăng ký: </label>
                            <label style="margin-left: 1rem">{{$dichvu->GioDK}}</label>
                          </div>

                          <div style="margin-top: 1rem;">
                            <label style="color: #4e73df; margin-left: 4rem; width:10rem">Nhân viên thực hiện: </label>
                            <label style="margin-left: 1rem">{{$dichvu->TenNV}}</label>
                          </div>

                          <div style="margin-top: 1rem;">
                            <label style="color: #4e73df; margin-left: 4rem; width:10rem">Trạng thái thanh toán: </label>
                            @if($dichvu->TrangThaiHoaDon == 0)
                                 <label style="margin-left: 1rem">Chưa thanh toán</label>
                            @elseif($dichvu->TrangThaiHoaDon == 1)
                                 <label style="margin-left: 1rem">Đã thanh toán</label>
                            @elseif($dichvu->TrangThaiHoaDon == -1)
                                 <label style="margin-left: 1rem">Hóa đơn đã bị hủy</label>
                            @endif
                          </div>

                           <div style="margin-top: 1rem;  margin-left: 4rem;">
                                <label style="color: #4e73df; width:10rem">Xử lý đơn hàng: </label>

                                 <form >
                                     {{csrf_field()}}


                                    <select class="form-control xu-ly-don-hang-dich-vu" style="width: 13rem; margin-left: 11rem; margin-top: -2rem">

                                        <option selected>
                                            Chọn hình thức xử lý
                                        </option>
                                        <option  id="{{$dichvu->id_HD}}" value="1">Đã thanh toán</option>


                                    </select>
                                </form>
                            </div>


                      @endforeach
                  @endif

                @if($xem->id_SanPham!=='NULL')
                    @foreach($xem_SanPham as $key=>$sanpham)

                        <div style="margin-top: 1rem;">

                            <input type="hidden" name="sl" class="sl_mua_{{$sanpham->id_SanPham}}" value="{{$sanpham->SoLuongMua}}" style="width: 4rem;">


                            <input type="hidden" name="sl_kho" class="sl_kho_{{$sanpham->id_SanPham}}" value="{{$sanpham->SoLuong_SP}}">

                             <input type="hidden" name="kiemtra_idSP" class="kiemtra_idSP" value="{{$sanpham->id_SanPham}}">
                        </div>


                        <div style="margin-top: 1rem;">
                            <label style="color: #4e73df; margin-left: 4rem; width:10rem">Tên sản phẩm: </label>
                            <label style="margin-left: 15rem; margin-top: -3rem">{{$sanpham->TenSanPham}}</label>
                        </div>

                          <div style="margin-top: 1rem;">
                                <label style="color: #4e73df; margin-left: 4rem; width:10rem">Số lượng: </label>
                                <label style="margin-left: 1rem;">{{$sanpham->SoLuongMua}} x {{$sanpham->Gia}}</label>
                          </div>

                          <div style="margin-top: 1rem;">
                                <label style="color: #4e73df; margin-left: 4rem; width:10rem">Tổng hóa đơn: </label>
                                <label style="margin-left: 1rem">{{$sanpham->TongHoaDon}} vnđ</label>
                          </div>

                          <div style="margin-top: 1rem;">
                                <label style="color: #4e73df; margin-left: 4rem; width:10rem">Ngày đặt hàng: </label>
                                <label style="margin-left: 1rem">{{$sanpham->Ngay}}</label>
                          </div>

                          <div style="margin-top: 1rem;">
                                <label style="color: #4e73df; margin-left: 4rem; width:10rem">Trạng thái thanh toán: </label>
                                @if($sanpham->TrangThaiHoaDon == 0)
                                    <label style="margin-left: 1rem">Chưa thanh toán</label>
                                @elseif($sanpham->TrangThaiHoaDon == 1)
                                     <label style="margin-left: 1rem">Đã thanh toán</label>
                                @else
                                      <label style="margin-left: 1rem">Đã xác nhận</label>
                                @endif
                              </div>
                         {{--  @endforeach
                        @endif --}}

                           <div style="margin-top: 1rem;  margin-left: 4rem;">
                                <label style="color: #4e73df; width:10rem">Xử lý đơn hàng: </label>

                                 <form >
                                     {{csrf_field()}}
                                     <input type="hidden" name="sl" class="sl_mua_{{$sanpham->id_SanPham}}" value="1" style="width: 4rem;">

                                    <select class="form-control xu-ly-don-hang" style="width: 13rem; margin-left: 11rem; margin-top: -2rem">

                                        <option selected>
                                          {{--   @if($sanpham->TrangThaiHoaDon==0)
                                                Chưa thanh toán
                                            @elseif($sanpham->TrangThaiHoaDon==1)
                                                Đã thanh toán
                                            @else
                                                Đã xác nhận
                                            @endif --}}
                                            Chọn hình thức xử lý
                                        </option>
                                        <option id="{{$sanpham->id_HD}}" value="2">Đã xác nhận</option>
                                        <option  id="{{$sanpham->id_HD}}" value="1">Đã thanh toán</option>


                                    </select>
                                </form>
                        </div>

                    @endforeach













                @endif
                <br><br><br>
            @endforeach
            </form>

        </div>

  </div>
@endsection
