@extends('Admin_index')
@section('ad_content')
<div class="container-fluid" style=" background: #fff;width: 55rem;  margin-top: 5rem;">


      <div class="d-sm-flex align-items-center justify-content-between mb-4" style="margin: 3rem;" >
             <h1 class="h3 mb-0 text-gray-800" style="margin: 3rem;margin-left: 17rem;font-weight: 700;
            font-family: 'Font Awesome 5 Free'; font-size: 35px;">Thêm Dịch vụ</h1>

         </div>

          <?php
                $message = Session::get('message');
                 if($message){
                    echo '<span style="color:red; font-style: italic;}">'.$message.'<p></p></span>';
                    Session::put('message',null);
                  }

          ?>

          <div>

            <form  action="{{URL::to('/luu_DichVu')}}" method="post" class="templatemo-login-form"  enctype="multipart/form-data" style="margin: 3rem;width: 55rem; margin-left: 12rem" >

              {{csrf_field()}}
               <input type="hidden" name="SoLuong_SPDaBan" value="0">

              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label style="color: #4e73df">Tên dịch vụ</label>
                    <input name="TenDichVu" type="text" required="required" style="font-size: 1rem;"   class="form-control form-control-user"  placeholder="Nhập Tên Thiết Bị">

                  </div>
              </div>


              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label style="color: #4e73df">Giá</label>
                    <input name="Gia" type="text" required="required"  style="font-size: 1rem; " class="form-control form-control-user"   placeholder="Nhập giá sản phẩm">

                  </div>
              </div>



              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label style="color: #4e73df">Hình ảnh &emsp;&emsp;</label>
                    <input type="text" name="HinhAnh_DV" required="required"  style="font-size: 1rem;"   class="form-control form-control-user"  placeholder="Nhâp hình ảnh"  >

                  </div>
              </div>



             {{--  @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                    {{$error}}
                    @endforeach

                </div>

                @endif --}}

           {{--    <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">
                     <label  style="color: #4e73df">PT &emsp;&emsp;</label>
                          <select name="danhmuc_DV"  style="color: #6e707e; line-height: 1.5; height: calc(1.5em + .75rem + 2px);padding: .37rem.75rem;background-color: #fff;background-clip: padding-box;border: 1px solid #d1d3e2;border-radius: .35rem;">
                            @foreach($danhmuc_DV as $key=>$danhmuc)
                                <option class="form-control form-control-user" value="{{$danhmuc->id_NhanVien}}">
                                    {{$danhmuc->TenNV}}</option>

                            @endforeach
                          </select>
                </div>

              </div> --}}


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
