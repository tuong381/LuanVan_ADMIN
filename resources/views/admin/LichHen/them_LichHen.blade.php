@extends('Admin_index')
@section('ad_content')
<div class="container-fluid" style=" background: #fff;width: 55rem;  margin-top: 5rem;">


      <div class="d-sm-flex align-items-center justify-content-between mb-4" style="margin: 3rem;" >
             <h1 class="h3 mb-0 text-gray-800" style="margin: 3rem;margin-left: 17rem;font-weight: 700;
            font-family: 'Font Awesome 5 Free'; font-size: 35px;">Thêm Lịch Hẹn</h1>

         </div>

          <?php
                $message = Session::get('message');
                 if($message){
                    echo '<span style="color:red; font-style: italic;}">'.$message.'<p></p></span>';
                    Session::put('message',null);
                  }

          ?>

          <div>

            <form  action="{{URL::to('/luu_LichHen')}}" method="post" class="templatemo-login-form"  enctype="multipart/form-data" style="margin: 3rem;width: 55rem; margin-left: 12rem" >

              {{csrf_field()}}
               <input type="hidden" name="SoLuong_SPDaBan" value="0">

              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">
                     <label  style="color: #4e73df">Khách hàng:  &emsp;&emsp;</label>
                          <select name="khachhang"  style="color: #6e707e; line-height: 1.5; height: calc(1.5em + .75rem + 2px);padding: .37rem.75rem;background-color: #fff;background-clip: padding-box;border: 1px solid #d1d3e2;border-radius: .35rem;">
                            @foreach($khachhang as $key=>$khachhang)
                                <option class="form-control form-control-user" value="{{$khachhang->id_KhachHang}}">
                                    {{$khachhang->TenKH}}</option>

                            @endforeach
                          </select>
                </div>

              </div>


              @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                    {{$error}}
                    @endforeach

                </div>

                @endif

              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">
                     <label  style="color: #4e73df">Dịch vụ:  &emsp;&emsp;</label>
                          <select name="dichvu"  style="color: #6e707e; line-height: 1.5; height: calc(1.5em + .75rem + 2px);padding: .37rem.75rem;background-color: #fff;background-clip: padding-box;border: 1px solid #d1d3e2;border-radius: .35rem;margin-left: 2rem">
                            @foreach($dichvu as $key=>$dichvu)
                                <option class="form-control form-control-user" value="{{$dichvu->id_DichVu}}"
                                    >
                                    {{$dichvu->TenDichVu}}
                                </option>

                            @endforeach
                          </select>
                </div>

              </div>

              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">
                     <label  style="color: #4e73df">Giờ đăng ký:  &emsp;&emsp;</label>
                          {{-- <select  style="color: #6e707e; line-height: 1.5; height: calc(1.5em + .75rem + 2px);padding: .37rem.75rem;background-color: #fff;background-clip: padding-box;border: 1px solid #d1d3e2;border-radius: .35rem;">
                              <option value="1" name="GioDK">6:00 - 7:30</option>
                              <option  value="2" name="GioDK">9:00 - 10:30</option>
                              <option value="3" name="GioDK">16:00 - 17:30</option>
                              <option  value="4" name="GioDK">18:00 -19:30</option>
                          </select> --}}

                        <div class="col-md-12 check-box payment">
                            <label class="check">
                                <input type="checkbox" name="GioDK"
                                value="6:00 - 7:30" ><span class="checkmark"></span>
                            </label>
                            <span class="title-black" style="color: #6e707e;
                                margin-right: 10px">6:00 - 7:30</span>

                            <input type="checkbox"  name="GioDK"
                                value="9:00 - 10:30" >
                            <span class="title-black" style="color: #6e707e;
                                margin-right: 10px">9:00 - 10:30</span>

                        </div>
                         <div class="col-md-12 check-box payment">

                            <input type="checkbox"  name="GioDK"
                                value="16:00 - 17:30" >
                            <span class="title-black" style="color: #6e707e;
                                margin-right: 10px">16:00 - 17:30</span>

                            <input type="checkbox"  name="GioDK"
                                value="18:00 -19:30" >
                            <span class="title-black" style="color: #6e707e;
                                margin-right: 10px">18:00 -19:30</span>

                         </div>

                </div>

              </div>

              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label style="color: #4e73df">Ngày đăng ký: &emsp;&emsp;</label>
                    <input name="NgayDK" required="required"  type="text" required="required" style="font-size: 1rem; width: 100%" class="form-control form-control-user"
                             placeholder="Chọn ngày đăng ký" id="datepicker" >

                  </div>
              </div>


              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">
                     <label  style="color: #4e73df">Nhân viên:  &emsp;&emsp;</label>
                          <select name="nhanvien"  style="color: #6e707e; line-height: 1.5; height: calc(1.5em + .75rem + 2px);padding: .37rem.75rem;background-color: #fff;background-clip: padding-box;border: 1px solid #d1d3e2;border-radius: .35rem; margin-left: 0.8rem;">
                            @foreach($nhanvien as $key=>$nhanvien)
                                <option class="form-control form-control-user" value="{{$nhanvien->id_NhanVien}}">
                                    {{$nhanvien->TenNV}}</option>

                            @endforeach
                          </select>
                </div>

              </div>


    <!--          <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">
                     <label  style="color: #4e73df">Hiển thị &emsp;&emsp;</label>
                          <select name="TrangThai_SP"  style="color: #6e707e; line-height: 1.5; height: calc(1.5em + .75rem + 2px);padding: .37rem.75rem;background-color: #fff;background-clip: padding-box;border: 1px solid #d1d3e2;border-radius: .35rem;">
                            <option class="form-control form-control-user" value="0">Ẩn</option>
                            <option class="form-control form-control-user" value="1">Hiển thị</option>
                          </select>
                </div>

              </div>

          -->

              <button type = "submit" name="them_sanpham" class="btn btn-primary btn-user btn-block"
                  style="width: 100px;" >Thêm</button>

                <br><br><br>

            </form>

            </div>


</div>



@endsection
