@extends('Admin_index')
@section('ad_content')

<div class="container-fluid" style=" background: #fff;width: 55rem;  margin-top: 5rem;">

      <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800" style="margin: 3rem;margin-left: 17rem; font-weight: 700;
            font-family: 'Font Awesome 5 Free'; font-size: 35px;">Cập nhật Dịch Vụ </h1>

         </div>

          <?php
                $message = Session::get('message');
                 if($message){
                    echo '<span style="color:red; font-style: italic;}">'.$message.'<p></p></span>';
                    Session::put('message',null);
                  }

          ?>
          @foreach($sua_DichVu as $key=>$sua)

            <form  action="{{URL::to('/admin-capnhat-DichVu/'.$sua->id_DichVu)}}" method="post" class="templatemo-login-form" enctype="multipart/form-data" style="margin: 3rem;width: 55rem; margin-left: 12rem">

              {{csrf_field()}}

              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label style="color: #4e73df">Tên dịch vụ</label>
                    <input name="TenDichVu"value="{{$sua->TenDichVu}}" type="text" class="form-control
                        form-control-user"  >

                  </div>
              </div>


              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label style="color: #4e73df">Giá</label>
                    <input name="Gia" value="{{$sua->Gia}}" type="text" class="form-control form-control-user">

                  </div>
              </div>

               <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label style="color: #4e73df">Hình ảnh</label>
                    <input name="HinhAnh_DV"  type="text" required="required"  value="{{$sua->HinhAnh_DV}}" style="font-size: 1rem; width: 100%" class="form-control form-control-user">
                    <img src="{{$sua->HinhAnh_DV}}" style="height: 100px; width: 100px">


                  </div>
              </div>

              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">
                     <label  style="color: #4e73df">PT &emsp;&emsp;</label>
                          <select name="danhmuc_DV"  style="color: #6e707e; line-height: 1.5; height: calc(1.5em + .75rem + 2px);padding: .37rem.75rem;background-color: #fff;background-clip: padding-box;border: 1px solid #d1d3e2;border-radius: .35rem;">
                            @foreach($danhmuc_DV as $key=>$danhmuc)
                              @if($danhmuc->id_NhanVien == $sua->id_NhanVien)
                                <option selected class="form-control form-control-user" value="{{$danhmuc->id_NhanVien}}"> {{$danhmuc->TenNV}}</option>
                              @else
                                <option class="form-control form-control-user" value="{{$danhmuc->id_NhanVien}}">
                                    {{$danhmuc->TenNV}}</option>

                              @endif

                            @endforeach
                          </select>
                </div>

              </div>


              <button type = "submit" name="them_sanpham" class="btn btn-primary btn-user btn-block"
                  style="width: 100px;" >Cập nhật</button>

                <br><br><br>

            </form>

          @endforeach

</div>

@endsection
