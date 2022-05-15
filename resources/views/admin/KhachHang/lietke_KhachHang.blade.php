@extends('Admin_index')
@section('ad_content')

<?php
      $message = Session::get('message');
       if($message){
          echo '<span class="text-alert">'.$message.'</span>';
          Session::put('message',null);
        }

    ?>

      <div class="d-sm-flex align-items-center justify-content-between mb-4">
           <h1 class="h3 mb-0 text-gray-800" style="margin-left: 30rem; font-weight: 700;
            font-family: 'Font Awesome 5 Free'; font-size: 35px;">Danh Sách Khách Hàng </h1>

        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <form action="{{URL::to('/tim-kiem-khach-hang')}}" method="post">
        {{csrf_field()}}

            <div class="input-group" style="width:25rem">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2" name="tu_timkiem">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>


         <div class="d-sm-flex align-items-center justify-content-between mb-4">
           <h3 class="h3 mb-0 text-gray-800">

           <p><a href="{{URL::to('/admin-them-KhachHang')}}" class="btn view button-main" style="width: 80px;background: #4e73df;color: white; font-weight: 600;">Thêm</a></p>
            </h3>

        </div>



        <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                    <thead>
                                        <tr style="color: #4e73df; text-align: center">
                                            <th>STT</th>
                                            <th>Tên khách hàng</th>
                                            <th>Email</th>
                                            <th>Số điện thoại</th>
                                            <th>Giới tính</th>
                                            <th>Địa chỉ</th>
                                           {{--  <th>Hình ảnh</th> --}}
                                            <th>Chứa năng</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                         <tr style="color: #4e73df; text-align: center">
                                            <th>STT</th>
                                            <th>Tên khách hàng</th>
                                            <th>Email</th>
                                            <th>Số điện thoại</th>
                                            <th>Giới tính</th>
                                            <th>Địa chỉ</th>
                                            {{-- <th>Hình ảnh</th> --}}
                                            <th>Chứa năng</th>
                                    </tfoot>

                                    <tbody>
                                      <!-- hamf lay du lieu  -->
                                      @php
                                        $i=0;

                                      @endphp

                                      @foreach($lietke_KhachHang as $key=>$khachhang)

                                      @php
                                        $i++;

                                      @endphp
                                        <tr style="text-align: center;">
                                            <td style="text-align: center;">{{$i}}</td>
                                            <td>{{$khachhang->TenKH}}</td>
                                            <td>{{$khachhang->Email}}</td>
                                            <td>{{$khachhang->SoDienThoai}}</td>

                                           <td>
                                                @if($khachhang->GioiTinh=='Nu')
                                                    <span>Nữ</span>
                                                @else
                                                    <span>Nam</span>
                                                @endif

                                            </td>

                                            <td>{{$khachhang->DiaChi}}</td>
                                             {{-- <td style="text-align: center;"><img src="{{$khachhang->HinhAnh}}" style="height: 100px;width: 100px" ></td> --}}
                                          {{--   <td><img src="storage/emulated/0/Android/data/com.appgym/files/Pictures/8f1826e3-8f78-4bf7-a058-08903ee6522c.jpg" style="height: 100px;width: 100px" ></td> --}}


                                       {{--      <td style="text-align: center;">{{$dichvu->TenNV}}</td> --}}

                                     <!--       <td></td>     -->
                                            <td style="text-align: center;">

                                                 {{-- <a href="#" >
                                                  <i class="fas fa-edit"></i>&emsp;  </a> --}}

                                              <a onclick="return confirm('Bạn có muốn xóa sản phẩm này không?')" href="{{URL::to('/admin-xoa-KhachHang/'.$khachhang->id_KhachHang)}}" >
                                                    <i class="fas fa-trash"  style="color: red"></i> &emsp;  </a>



                                            </td>

                                        </tr>


                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    <div style="margin-left: auto;">

                       {{--   {{ $lietke_SanPham->links("pagination::bootstrap-4") }} --}}


                    </div>
        </div>





@endsection
