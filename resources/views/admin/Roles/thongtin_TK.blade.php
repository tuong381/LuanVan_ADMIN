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
                <h1 class="h3 mb-0 text-gray-800" style="margin: 3rem;margin-left: 20rem">Hồ Sơ Của Bạn </h1>

                </div>

                <div class="card-body">

                     @foreach( $taikhoan as $key=>$admin)

                       {{--  <label style="color: #4e73df; margin-left: 20rem;">Mã nhân viên: &emsp;&emsp;</label>
                        {{ $admin->id_AD}} <br> --}}



                     <label style="color: #4e73df; margin-left: 18rem;">Tên nhân viên: &emsp;&emsp;</label>
                        {{$admin->HoTenAD}}<br>
                    <label style="color: #4e73df; margin-left: 18rem;">Email: &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        </label>{{$admin->Email}}<br>
                    <label style="color: #4e73df;  margin-left: 18rem;">Số điện thoại : &emsp;&emsp;</label>
                        {{$admin->SoDT}}<br>
                    <label style="color: #4e73df; margin-left: 18rem;">Địa chỉ: &emsp;&emsp;&emsp;&emsp;&emsp;</label>
                        {{$admin->DiaChi}}<br>

                    <p><a href="{{URL::to('/admin-sua-taikhoan')}}" class="btn view button-main" style="background: #4e73df;color: white; font-weight: 600;margin-left: 18rem;
                    margin-top: 2rem;"> Cập nhật tài khoản</a></p>


                    @endforeach

                </div>

                {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                   <h3 class="h3 mb-0 text-gray-800">

                   <p><a href="{{url('/admin-sua-taikhoan/'.Auth::user()->id_AD)}}" class="btn view button-main" style="background: #4e73df;color: white; font-weight: 600;margin-left: 20rem">Cập nhật thông tin</a></p>
                    </h3>

                </div> --}}


        </div>


@endsection
