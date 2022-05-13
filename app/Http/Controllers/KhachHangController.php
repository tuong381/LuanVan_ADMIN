<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;  //Redirect :tra ve
session_start();
use Auth;
use Toastr;

class KhachHangController extends Controller
{
    //
    public function them_KhachHang(){
    //     $this->kiemtra_AD();     /
        return view('admin.KhachHang.them_KhachHang');
    }

    public function luu_KhachHang(Request $request){
         $data = array();
        $data['TenKH'] = $request->TenKH;
        $data['Email'] = $request->Email;
         $data['SoDienThoai'] = $request->SoDienThoai;
        $data['DiaChi'] = $request->DiaChi;
        $data['MatKhau'] = $request->MatKhau;
        $data['NgaySinh'] = $request->NgaySinh;
        $data['GioiTinh'] = $request->GioiTinh;


        DB:: table ('khachhang')->insert($data);

         Toastr::success('Thêm dịch vụ '.$request->TenKH.'thành công', 'Success');
        //tra ve

       return Redirect::to('/admin-lietke-KhachHang');


    }


    public function lietke_KhachHang(){

    //    $this->kiemtra_AD();
         $lietke_KhachHang= DB:: table('khachhang')->orderby('id_KhachHang','DESC')->paginate(5);

        $quanli_khachhang = view('admin.KhachHang.lietke_KhachHang')->with('lietke_KhachHang',$lietke_KhachHang);
        return view('Admin_index')->with('admin.KhachHang.lietke_KhachHang',$quanli_khachhang);
    }

    public function xoa_KhachHang( $id_KhachHang){

        // insert vao csdl

        DB:: table ('khachhang')->where('id_KhachHang',$id_KhachHang)->delete();
        Toastr::success('Xóa khách hàng thành công', 'Success',);
        //tra ve
        return Redirect::to('admin-lietke-KhachHang');
    }

    public function timkiem(Request $request){

        $tu_timkiem = $request->tu_timkiem;

         $timkiem_SP = DB::table('khachhang')
                ->where('TenKH','like','%'.$tu_timkiem.'%')->get();

        $quanli_lichhen = view('admin.KhachHang.timkiem_KhachHang')
            ->with('timkiem_SP',$timkiem_SP);
        return view('Admin_index')->with('admin.KhachHang.timkiem_KhachHang',$quanli_lichhen);

    }

}
