@extends('Admin_index')
@section('ad_content')

<div class="container-fluid" style=" background: #fff;width: 55rem;  margin-top: 5rem;">

      <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800" style="margin: 3rem;margin-left: 18rem;font-weight: 700;
            font-family: 'Font Awesome 5 Free'; font-size: 35px;">Cập Nhật Nhân Viên </h1>

         </div>

          <?php
                $message = Session::get('message');
                 if($message){
                    echo '<span style="color:red; font-style: italic;}">'.$message.'<p></p></span>';
                    Session::put('message',null);
                  }

          ?>


        @foreach($sua_NhanVien as $key=>$sua_NhanVien)
            <form  action="{{URL::to('/admin-capnhat-NhanVien/'.$sua_NhanVien->id_NhanVien)}}" method="post" class="templatemo-login-form"  enctype="multipart/form-data" style="margin: 3rem;width: 55rem; margin-left: 12rem">
              {{csrf_field()}}

          {{--      <input type="hidden" name="id_AD"> --}}

              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label style="color: #4e73df">Tên nhân viên</label>
                    <input name="TenNV"value="{{$sua_NhanVien->TenNV}}" type="text" class="form-control
                        form-control-user"  >

                  </div>
              </div>

                <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label style="color: #4e73df">Email</label>
                    <input name="Email"value="{{$sua_NhanVien->Email}}" type="Email" class="form-control
                        form-control-user"  >

                  </div>
              </div>

              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label style="color: #4e73df">Số điện thoại</label>
                    <input name="SoDienThoai"value="{{$sua_NhanVien->SoDienThoai}}" type="text" class="form-control form-control-user"  >

                  </div>
              </div>

              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label style="color: #4e73df">Địa chỉ</label>
                   <input name="DiaChi"value="{{$sua_NhanVien->DiaChi}}" type="text" class="form-control
                        form-control-user"  >

                  </div>
              </div>

              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label style="color: #4e73df">Mật khẩu</label>
                    <input name="MatKhau"value="{{$sua_NhanVien->MatKhau}}" type="text" class="form-control
                        form-control-user"  >

                  </div>
              </div>


              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label style="color: #4e73df">Ngày sinh &emsp;&emsp;</label>
                    <input name="NgaySinh" required="required" value="{{$sua_NhanVien->NgaySinh}}" type="text" required="required" style="font-size: 1rem; width: 100%" class="form-control form-control-user"  placeholder="Nhập link ảnh" id="datepicker" >

                  </div>
              </div>

             {{--  <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label style="color: #4e73df">Ảnh đại diện</label>
                    <input name="AnhDaiDien" type="file"  >
                    <img src="{{URL::to('public/upload/nhanvien/'.$sua_NhanVien->AnhDaiDien)}}" style="height: 100px; width: 100px">
                  </div>
              </div> --}}

              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label style="color: #4e73df">Kinh nghiệm &emsp;&emsp;</label>
                    <input name="KinhNghiem" required="required" value="{{$sua_NhanVien->KinhNghiem}}" type="text" required="required" style="font-size: 1rem; width: 50%" class="form-control form-control-user"  placeholder="Nhập kinh nghiệm" id="datepicker" >


                  </div>
              </div>


                <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label style="color: #4e73df">Giới tính &emsp;&emsp;</label>
                    <select class="form-control xu-ly-don-hang" style="width: 15rem" name="GioiTinh">
                        @if($sua_NhanVien->GioiTinh=='Nữ')
                            <option value="Nữ"> Nữ</option>
                        @else
                            <option value="Nam">Nam</option>
                        @endif
                        <option value="Nam">Nam</option>
                        <option  value="Nữ">Nữ</option>


                    </select>

                  </div>
              </div>


           {{--     <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">
                     <label  style="color: #4e73df">Chức vụ &emsp;&emsp;</label>
                          <select name="ChucVu"  style="color: #6e707e; line-height: 1.5; height: calc(1.5em + .75rem + 2px);padding: .37rem.75rem;background-color: #fff;background-clip: padding-box;border: 1px solid #d1d3e2;border-radius: .35rem;">
                            @foreach($chucvu as $key=>$chucvu)
                              @if($chucvu->id_ChucVu == $sua_NhanVien->id_ChucVu)
                                <option selected class="form-control form-control-user" value="{{$chucvu->id_ChucVu}}"> {{$chucvu->TenChucVu}}</option>
                              @else
                                <option class="form-control form-control-user" value="{{$chucvu->id_ChucVu}}">
                                    {{$chucvu->TenChucVu}}</option>

                              @endif

                            @endforeach
                          </select>
                </div>

              </div> --}}



              <button type = "submit" name="them_baiviet" class="btn btn-primary btn-user btn-block"
                  style="width: 100px;" >Cập nhật</button>

                   <br><br><br>

            </form>

    @endforeach

        </div>

@endsection
