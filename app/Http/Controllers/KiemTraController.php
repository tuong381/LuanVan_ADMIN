<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;  //Redirect :tra ve

use Toastr;
session_start();

class KiemTraController extends Controller
{
    //
    public function login(){
       $danhmuc_SP=DB::table('danhmucsanpham')->orderby('id_DanhMuc','asc')->get();
        $danhmuc_BaiViet=DB::table('danhmucbaiviet')->orderby('id_DanhMucBaiViet','asc')->get();
    return view('page.Login.login')->with('danhmuc_SP',$danhmuc_SP)->with('danhmuc_BaiViet',$danhmuc_BaiViet);
    }

    public function register(){
        $danhmuc_SP=DB::table('danhmucsanpham')->orderby('id_DanhMuc','asc')->get();
        $danhmuc_BaiViet=DB::table('danhmucbaiviet')->orderby('id_DanhMucBaiViet','asc')->get();
    return view('page.Login.dangky')->with('danhmuc_SP',$danhmuc_SP)->with('danhmuc_BaiViet',$danhmuc_BaiViet);
    }

    // dang ky
    public function dangky(Request $request){

        $data = array();
        $data['HotenKH'] = $request->HoTenKH;
        $data['SoDienThoai_KH'] = $request->SoDienThoai_KH;
        $data['Email_KH'] = $request->Email_KH;
        $data['MatKhau_KH'] = md5($request->MatKhau_KH);

        $id_KH = DB::table('khachhang')->InsertGetId($data);

        Session::put('id_KH',$id_KH);
        Session::put('HotenKH',$request->HoTenKH);

        Toastr::success('Đăng ký tài khoản thành công', 'Success',);
        return Redirect::to('/cua-hang');
    }

    // dang nhap
    public function dangnhap(Request $request){

        $email_KH = $request->Email_KH;
        $matkhau_KH = md5($request->MatKhau_KH);

        $data = DB::table('khachhang')->where('Email_KH',$email_KH)->where('MatKhau_KH',$matkhau_KH)->first();

        if($data){
            Session::put('id_KH',$data->id_KH);

             Toastr::success('Đăng nhập tài khoản thành công', 'Success',);
             return Redirect::to('/cua-hang');
            // return redirect()->getCallback() ;
         }
        else{
            Toastr::error('Vui lòng kiểm tra thông tin đăng nhập', 'Error',);
            return Redirect::to('/login');
        }
    }


    // thanh toan
    public function kiemtraSP(){

         $danhmuc_BaiViet=DB::table('danhmucbaiviet')->orderby('id_DanhMucBaiViet','asc')->get();

         $danhmuc_SP=DB::table('danhmucsanpham')->orderby('id_DanhMuc','asc')->get();
        return view('page.Login.kiemtra_SP')->with('danhmuc_SP',$danhmuc_SP)->with('danhmuc_BaiViet',$danhmuc_BaiViet);

    }

    public function dathang(Request $request){

        // insert vao bang dathang
         $data = array();
        $data['TenDatHang'] = $request->TenDatHang;
        $data['SoDienThoai_DH'] = $request->SoDienThoai_DH;
        $data['Email_DH'] = $request->Email_DH;
        $data['DiaChi_DH'] = $request->DiaChi_DH;
          $data['Ghichu_DH'] = $request->GhiChu_DH;
        // if(isset($data['Ghichu_DH'])){
        //     $data['Ghichu_DH'] = $request->GhiChu_DH;
        // }else{
        //      $data['Ghichu_DH'] ='Không có';
        // }


        $id_DH = DB::table('dathang')->InsertGetId($data);
        Session::put('id_DH',$id_DH);

        // insert vao bang thanhtoan
        $data2 = array();
        $data2['PhuongThucThanhToan'] = $request->PhuongThucThanhToan;
        $data2['TinhTrangThanhToan'] = "Đang chờ xử lí";


        $id_TT = DB::table('thanhtoan')->InsertGetId($data2);

        // insert vao bang hoadon
         $data3 = array();
        $data3['id_KH'] = Session::get('id_KH');
        $data3['id_DH'] = Session::get('id_DH');
        $data3['id_TT'] =$id_TT;
         $data3['TongHoaDon'] = Cart::subtotal(0);
         $data3['TrangThaiHoaDon'] = 1;
         $data3['created_at'] = now();

         $data3['Ngay_DH'] = now()->format('d-m-Y');

        $id_HD = DB::table('hoadon')->InsertGetId($data3);

        // insert vao bang chitiethoadon
          $content= Cart::content();
        foreach ($content as $giohang) {
             $data4 = array();
            $data4['id_HD'] = $id_HD;
            $data4['id_SanPham'] = $giohang->id;
            $data4['TenSanPham'] = $giohang->name;
             $data4['Gia'] = $giohang->price;
             $data4['SoLuongMua'] = $giohang->qty;

            $id_CTHD = DB::table('chitiethoadon')->Insert($data4);
        }

        if($data2['PhuongThucThanhToan'] == "Thanh toán khi nhận hàng"){
             // Cart::destroy();
            echo "Thanh toán khi nhận hàng";

        }
        else {
            // Cart::destroy();
            echo "Thanh toán bằng thẻ ATM";
        }






    //    Session::put('id_DH',$id_DH);

        // Session::put('message','Có 1 đơn đặt hàng mới');

         Toastr::success('Đặt hàng thành công', 'Success',);
         return Redirect::to('/thanh-toan');
    }

    public function thanhtoan(){

        $danhmuc_SP=DB::table('danhmucsanpham')->orderby('id_DanhMuc','asc')->get();

         $danhmuc_BaiViet=DB::table('danhmucbaiviet')->orderby('id_DanhMucBaiViet','asc')->get();

        // return view('page.Login.thanhtoan')->with('danhmuc_SP',$danhmuc_SP);
       // echo $thanhtoan;


         // $chitiet_DH = DB:: table('hoadon')
         //    ->join('chitiethoadon','chitiethoadon.id_HD','=','hoadon.id_HD')
         //    ->join('thanhtoan','thanhtoan.id_TT','=','hoadon.id_TT')
         //    ->join('dathang','dathang.id_DH','=','hoadon.id_DH')

         //    ->get();
            return view('page.Login.thanhtoan')->with('danhmuc_SP',$danhmuc_SP)->with('danhmuc_BaiViet',$danhmuc_BaiViet);


    }

    public function logout(){

       Session::flush();
        return Redirect('/login');
    }



}
