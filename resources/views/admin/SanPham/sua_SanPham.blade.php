@extends('Admin_index')
@section('ad_content')

<div class="container-fluid" style=" background: #fff;width: 55rem;  margin-top: 5rem;">

      <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800" style="margin: 3rem;margin-left: 17rem; font-weight: 700;
            font-family: 'Font Awesome 5 Free'; font-size: 35px;">Cập nhật Sản Phẩm </h1>

         </div>

          <?php
                $message = Session::get('message');
                 if($message){
                    echo '<span style="color:red; font-style: italic;}">'.$message.'<p></p></span>';
                    Session::put('message',null);
                  }

          ?>
          @foreach($sua_SanPham as $key=>$sua)

            <form  action="{{URL::to('/admin-capnhat-SanPham/'.$sua->id_SanPham)}}" method="post" class="templatemo-login-form" enctype="multipart/form-data" style="margin: 3rem;width: 55rem; margin-left: 12rem">

              {{csrf_field()}}

              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label style="color: #4e73df">Tên Sản Phẩm</label>
                    <input name="TenSanPham"value="{{$sua->TenSanPham}}" type="text" class="form-control
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
                    <label style="color: #4e73df">Số lượng kho</label>
                    <input name="SoLuong_SP" value="{{$sua->SoLuong_SP}}" type="text" class="form-control form-control-user">

                  </div>
              </div>

              <div class="row form-group">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label style="color: #4e73df">Hình ảnh &emsp;&emsp;</label>
                     <input name="HinhAnh_SP" type="file"  >
                    <img src="{{URL::to('public/upload/sanpham/'.$sua->HinhAnh_SP)}}" style="height: 100px; width: 100px">


                  </div>
              </div>

              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">
                    <label  style="color: #4e73df">Mô tả sản phẩm</label>
                    <input name="MoTaSanPham" value="{{$sua->MoTaSanPham}}" style=" resize: none; height: 100px;" type="text" class="form-control" >
                </div>

              </div>

              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">
                     <label  style="color: #4e73df">Danh mục sản phẩm &emsp;&emsp;</label>
                          <select name="danhmuc_SP"  style="color: #6e707e; line-height: 1.5; height: calc(1.5em + .75rem + 2px);padding: .37rem.75rem;background-color: #fff;background-clip: padding-box;border: 1px solid #d1d3e2;border-radius: .35rem;">
                            @foreach($danhmuc_SP as $key=>$danhmuc)
                              @if($danhmuc->id_DanhMuc == $sua->id_DanhMuc)
                                <option selected class="form-control form-control-user" value="{{$danhmuc->id_DanhMuc}}"> {{$danhmuc->TenDanhMuc}}</option>
                              @else
                                <option class="form-control form-control-user" value="{{$danhmuc->id_DanhMuc}}">
                                    {{$danhmuc->TenDanhMuc}}</option>

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
