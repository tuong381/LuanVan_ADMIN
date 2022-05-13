@extends('Admin_index')
@section('ad_content')



          <?php
                $message = Session::get('message');
                 if($message){
                    echo '<span style="color:red; font-style: italic;}">'.$message.'<p></p></span>';
                    Session::put('message',null);
                  }

          ?>

            <div class="card shadow mb-4" style=" margin: 4rem;width: 55rem; margin-left: 12rem">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800" style="margin: 3rem;margin-left: 20rem">Đổi Mật Khẩu </h1>

                </div>

                <div class="card-body">

                    <form  action="{{URL::to('capnhat_MatKhau')}}" method="post" class="templatemo-login-form"  enctype="multipart/form-data" style="margin: 3rem;width: 55rem; margin-left: 12rem" >

                      {{csrf_field()}}
                       <input type="hidden" name="SoLuong_SPDaBan" value="0">

                      <div class="row form-group">
                          <div class="col-lg-6 col-md-6 form-group">
                            <label style="color: #4e73df">Mật khẩu mới</label>
                            <input name="MatKhau" type="password" required="required" style="font-size: 1rem;"   class="form-control form-control-user"  placeholder="Nhập mật khẩu">

                          </div>
                      </div>

                      <button type = "submit" name="them_sanpham" class="btn btn-primary btn-user btn-block"
                         style="width:100px" onclick="return confirm('Bạn có chắc muốn đổi mật khẩu không?')">
                          Cập nhật</button>

                        <br><br><br>

                    </form>


                </div>

                {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                   <h3 class="h3 mb-0 text-gray-800">

                   <p><a href="{{url('/admin-sua-taikhoan/'.Auth::user()->id_AD)}}" class="btn view button-main" style="background: #4e73df;color: white; font-weight: 600;margin-left: 20rem">Cập nhật thông tin</a></p>
                    </h3>

                </div> --}}


        </div>


@endsection
