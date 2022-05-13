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
            font-family: 'Font Awesome 5 Free'; font-size: 35px;">Danh Sách Lịch Hẹn </h1>

        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
           <h3 class="h3 mb-0 text-gray-800">

           <p><a href="{{URL::to('/admin-them-LichHen')}}" class="btn view button-main" style="width: 80px;background: #4e73df;color: white; font-weight: 600;">Thêm</a></p>
            </h3>

        </div>


        <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                    <thead>
                                        <tr style="color: #4e73df; text-align: center">
                                            <th>STT</th>
                                            <th>Loại vé</th>
                                            <th>khách hàng</th>
                                            <th>Nhân viên thực hiện</th>
                                            <th>Giá</th>
                                            <th>Ngày đăng ký</th>
                                            <th>Giờ đăng ký</th>
                                            <th>Trạng thái</th>
                                            <th>Chứa năng</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                         <tr style="color: #4e73df; text-align: center">
                                            <th>STT</th>
                                            <th>Loại vé</th>
                                            <th>khách hàng</th>
                                            <th>Nhân viên thực hiện</th>
                                            <th>Giá</th>
                                            <th>Ngày đăng ký</th>
                                            <th>Giờ đăng ký</th>
                                            <th>Trạng thái</th>
                                            <th>Chứa năng</th>
                                    </tfoot>

                                    <tbody>
                                      <!-- hamf lay du lieu  -->
                                      @php
                                        $i=0;

                                      @endphp

                                      @foreach($lietke_LichHen as $key=>$lichhen)

                                      @php
                                        $i++;

                                      @endphp
                                        <tr>
                                            <td style="text-align: center;">{{$i}}</td>
                                            <td>{{$lichhen->TenDichVu}}</td>
                                            <td>{{$lichhen->TenKH}}</td>
                                            <td>{{$lichhen->TenNV}}</td>
                                            <td>{{$lichhen->TongTien}}</td>
                                            <td>{{$lichhen->NgayDK}}</td>
                                            <td>{{$lichhen->GioDK}}</td>
                                            {{-- <td>{{$lichhen->TrangThaiLichHen}}</td> --}}
                                            @if($lichhen->TrangThaiLichHen==1 || $lichhen->TrangThaiLichHen==2)

                                                <td>Còn hạn</td>
                                            @elseif($lichhen->TrangThaiLichHen==0)
                                                <td>Đang chờ xác nhận</td>
                                            @elseif($lichhen->TrangThaiLichHen== -1)
                                                <td>Đã hủy</td>
                                            @endif


                                     <!--       <td></td>     -->
                                            <td style="text-align: center;">

                                                 {{-- <a href="{{URL::to('/admin-sua-LichHen/'.$lichhen->id_LichHen)}}" >
                                                  <i class="fas fa-edit"></i>&emsp;  </a> --}}

                                              <a onclick="return confirm('Bạn có muốn xóa lịch hẹn này không?')" href="{{URL::to('/admin-xoa-LichHen/'.$lichhen->id_LichHen)}}" >
                                                    <i class="fas fa-trash"  style="color: red"></i> &emsp;  </a>



                                            </td>

                                        </tr>


                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    <div style="margin-left: auto;">

                         {{ $lietke_LichHen->links("pagination::bootstrap-4") }}


                    </div>
        </div>





@endsection
