@extends('Admin_index')
@section('ad_content')

<div class="container-fluid" style=" background: #fff;width: 55rem;  margin-top: 5rem;">

      <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800" style="margin: 3rem;margin-left: 18rem;font-weight: 700;
            font-family: 'Font Awesome 5 Free'; font-size: 35px;">Thêm Khách Hàng </h1>

         </div>

          <?php
                $message = Session::get('message');
                 if($message){
                    echo '<span style="color:red; font-style: italic;}">'.$message.'<p></p></span>';
                    Session::put('message',null);
                  }

          ?>

            <form  action="{{URL::to('/luu_KhachHang')}}" method="post" class="templatemo-login-form"  enctype="multipart/form-data" style="margin: 3rem;width: 55rem; margin-left: 12rem">
              {{csrf_field()}}

          {{--      <input type="hidden" name="id_AD"> --}}

              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label style="color: #4e73df">Tên khách hàng</label>
                    <input name="TenKH" type="text" required="required" style="font-size: 1rem; width: 100%" class="form-control form-control-user"  placeholder="Nhập tên nhân viên">

                  </div>
              </div>

              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label style="color: #4e73df">Email</label>
                    <input name="Email" type="email" required="required" style="font-size: 1rem; width: 100%" class="form-control form-control-user"  placeholder="Nhập Email">

                  </div>
              </div>

              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label style="color: #4e73df">Số điện thoại</label>
                    <input name="SoDienThoai" type="text" required="required" style="font-size: 1rem; width: 100%" class="form-control form-control-user"  placeholder="Nhập số điện thoại">

                  </div>
              </div>

              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label style="color: #4e73df">Địa chỉ</label>
                    <input name="DiaChi" type="text"required="required" style="font-size: 1rem; width: 100%" class="form-control form-control-user"  placeholder="Nhập địa chỉ">

                  </div>
              </div>

               <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label style="color: #4e73df">Mật khẩu</label>
                    <input name="MatKhau" type="password" required="required" style="font-size: 1rem; width: 100%" class="form-control form-control-user"  placeholder="Nhập mật khẩu">

                  </div>
              </div>

              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label style="color: #4e73df">Ngày sinh &emsp;&emsp;</label>
                    <input name="NgaySinh" required="required"  type="text" required="required" style="font-size: 1rem; width: 100%" class="form-control form-control-user"
                             placeholder="chọn ngày sinh" id="datepicker" >

                  </div>
              </div>


              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label style="color: #4e73df">Giới tính &emsp;&emsp;</label>
                    <select class="form-control xu-ly-don-hang" style="width: 15rem" name="GioiTinh">

                        <option value="Nam">Nam</option>
                        <option  value="Nữ">Nữ</option>


                    </select>

                  </div>
              </div>

              <button type = "submit" name="them_baiviet" class="btn btn-primary btn-user btn-block"
                  style="width: 100px;" >Thêm</button>

                   <br><br><br>

            </form>

        </div>
@endsection
