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
            font-family: 'Font Awesome 5 Free'; font-size: 35px;">Kết quả tìm kiếm</h1>

</div>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <form action="{{URL::to('/tim-kiem-nhan-vien')}}" method="post">
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
         <label> Tìm thấy {{count( $timkiem_NhanVien)}} nhân viên</label>
    </div>


        <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table {{-- class="table table-bordered" --}} class="table table-striped" id="dataTable" width="100%" cellspacing="0">

                                    <thead>
                                        <tr style="color: #4e73df; text-align: center">
                                            <th>STT</th>
                                            <th>Tên nhân viên</th>
                                            <th>Email</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa chỉ</th>
                                         {{--    <th>Mật khẩu</th> --}}
                                            <th>Ngày sinh</th>
                                           {{--  <th>Ảnh đại diện</th> --}}
                                            <th>Giới tính</th>

                                          {{--   <th>dich vu</th> --}}
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                         <tr style="color: #4e73df; text-align: center">
                                            <th>STT</th>
                                            <th>Tên nhân viên</th>
                                            <th>Email</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa chỉ</th>
                                         {{--    <th>Mật khẩu</th> --}}
                                            <th>Ngày sinh</th>
                                          {{--   <th>Ảnh đại diện</th> --}}
                                            <th>Giới tính</th>

                                          {{--   <th>dich vu</th> --}}
                                            <th>Chức năng</th>
                                    </tfoot>
                                    <tbody style="text-align: center; color: black">
                                      <!-- hamf lay du lieu  -->


                                      @php
                                        $i=0;

                                      @endphp


                                      @foreach( $timkiem_NhanVien as $key=>$ad)

                                      <form action="{{url('/phan-quyen-user')}}" method="post">
                                        @csrf
                                       @php
                                        $i++;


                                      @endphp

                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$ad->TenNV}}</td>
                                            <td>
                                              {{$ad->Email}}
                                              <input type="hidden" name="Email" value="{{$ad->Email}}">

                                            </td>

                                            <td>{{$ad->SoDienThoai}}</td>
                                            <td>{{$ad->DiaChi}}</td>
                                            <td>{{$ad->NgaySinh}}</td>

                                            {{-- <td style="text-align: center;"><img src="{{$ad->AnhDaiDien}}" style="height: 100px;width: 100px" ></td> --}}
                                           {{--  <td><img src="public/upload/nhanvien/{{$ad->AnhDaiDien}}" style="height: 100px;width: 100px" ></td> --}}

                                            <td>
                                                @if($ad->GioiTinh=='Nữ')
                                                    <span>Nữ</span>
                                                @else
                                                    <span>Nam</span>
                                                @endif

                                            </td>

                                           {{--  <td>{{$ad->TenChucVu}}</td> --}}
                                           {{--  <td>{{$ad->TenDichVu}}</td> --}}


                                              <td style="text-align: center;">

                                                <a href="{{url('/admin-sua-NhanVien/'.$ad->id_NhanVien)}}" >
                                                    <i class="fas fa-edit"></i> &emsp; </a>

                                              <a onclick="return confirm('Bạn có muốn xóa nhân viên này không?')" href="{{url('/admin-xoa-NhanVien/'.$ad->id_NhanVien)}}" >
                                                    <i class="fas fa-trash" style="color: red" ></i>   </a>



                                            </td>

                                        </tr>



                                        </form>
                                      @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div style="margin-left: auto;">

                         {{-- {{ $lietke_DonHang->links("pagination::bootstrap-4") }} --}}


                        </div>
        </div>


@endsection
