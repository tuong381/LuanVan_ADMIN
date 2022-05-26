@extends('Admin_index')
@section('ad_content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
           <h1 class="h3 mb-0 text-gray-800" style="margin-left: 30rem; font-weight: 700;
            font-family: 'Font Awesome 5 Free'; font-size: 35px;">Kết quả tìm kiếm</h1>

        </div>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <form action="{{URL::to('/tim-kiem-hoa-don')}}" method="post">
        {{csrf_field()}}

            <div class="input-group" style="width:25rem">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2" name="tu_timkiem">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
         <label> Tìm thấy {{count($timkiem_SP)}} hóa đơn</label>
    </div>


        <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table {{-- class="table table-bordered" --}} class="table table-striped" id="dataTable" width="100%" cellspacing="0">

                                    <thead>
                                        <tr style="color: #4e73df; text-align: center">
                                            <th>STT</th>
                                            <th>Tên khách hàng</th>
                                            <th>Tổng đơn hàng</th>
                                            <th>Ngày đặt hàng</th>
                                            <th>Tình trạng</th>
                                            <th>Chứa năng</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                         <tr style="color: #4e73df; text-align: center">
                                            <th>STT</th>
                                            <th>Tên khách hàng</th>
                                            <th>Tổng đơn hàng</th>
                                            <th>Ngày đặt hàng</th>
                                            <th>Tình trạng</th>
                                            <th>Chứa năng</th>
                                    </tfoot>

                                    <tbody style="text-align: center; color: black">
                                      <!-- hamf lay du lieu  -->


                                      @php
                                        $i=0;

                                      @endphp


                                      @foreach( $timkiem_SP as $key=>$hoadon)
                                       @php
                                        $i++;


                                      @endphp

                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$hoadon->TenKH}}</td>
                                            <td>{{$hoadon->TongHoaDon}} vnđ</td>
                                            <td>{{$hoadon->Ngay}}</td>
                                            {{-- <td>{{$donHang->TrangThaiHoaDon}}</td> --}}
                                            <td>
                                                @if($hoadon->TrangThaiHoaDon == 0)
                                                   <span style= "color: chocolate;font-weight: 700;">Chưa thanh toán</span>

                                                @elseif($hoadon->TrangThaiHoaDon == 1)
                                                    <span style= "font-weight: 200;">Đã thanh toán</span>
                                                @elseif($hoadon->TrangThaiHoaDon == -1)
                                                    <span style= "font-weight: 200;">Hóa đơn đã bị hủy</span>
                                                @else

                                                    <span style= "font-weight: 200;">Đã xác nhận</span>
                                                @endif


                                            </td>

                                     <!--       <td></td>     -->
                                            <td style="text-align: center;">
                                              <a  href="{{URL::to('/admin-xem-HoaDon/'.$hoadon->id_HD)}}" >
                                                <i class="fa fa-eye"></i> &emsp;  </a>

                                             <a onclick="return confirm('Bạn có muốn xóa đơn hàng này không?')"

                                              <a href="{{URL::to('/admin-xoa-HoaDon/'.$hoadon->id_HD)}}" >
                                                  <i class="fas fa-trash" style="color: red"></i>  </a>

                                            </td>
                                        </tr>

                                      @endforeach

                                    </tbody>

                                </table>
                            </div>
                        </div>


        </div>


@endsection
