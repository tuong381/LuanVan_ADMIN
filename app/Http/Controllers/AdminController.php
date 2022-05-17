<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;  //Redirect :tra ve
session_start();

use Auth;
use App\Models\admin;
use App\Models\roles;

use App\Models\hoadon;
use Toastr;

class AdminController extends Controller
{

    //kiem tra dang nhap admin
    public function kiemtra_AD(){
        // $id_AD = session::get('id_AD');
        $id_AD = Auth::id();
        if($id_AD){
             Redirect::to('Dashboard');
        }else{
            return Redirect::to('Admin')->send();
        }
    }


    // trang Admin
    public function index(){
        return view('Admin_login');
    }

    // trang Dashboard
    public function showDashboard(){
  //      $this->kiemtra_AD();     // kiem tra co dang nhap k
        $sanpham = DB::table('sanpham')->get()->count();
        $baiviet = DB::table('baiviet')->get()->count();
        $donhang = DB::table('hoadon')->get()->count();
        $khachhang = DB::table('khachhang')->get()->count();
        $nhanvien = DB::table('nhanvien')->get()->count();
        $doanhsoDV = DB::table('hoadon')->where('id_SanPham', NULL)->sum('TongHoaDon');
        $doanhsoSP = DB::table('hoadon')->where('id_LichHen', NULL)->sum('TongHoaDon');
        $doanhso = DB::table('hoadon')->sum('TongHoaDon');
        // return view('admin.dashboard')->with('sanpham',$sanpham)->with('baiviet',$baiviet)
        //     ->with('donhang',$donhang)->with('doanhso',$doanhso)->with('khachhang',$khachhang)
        //     ->with('nhanvien',$nhanvien) ;



       //  return view('admin.dashboard');

        // $hoadon= hoadon::select(DB::raw("COUNT(*) as count"))
        //         ->whereYear("created_at", date('Y'))
        //         ->groupBy(DB::raw("Month(created_at)"))
        //         ->pluck('count');

        // $months= hoadon::select(DB::raw("Month(created_at) as month"))
        //         ->whereYear("created_at", date('Y'))
        //         ->groupBy(DB::raw("Month(created_at)"))
        //         ->pluck('month');

        // $data1=[0,0,0,0,0,0,0,0,0,0,0,0];
        // foreach($months as $index=>$month){
        //     --$month;
        //     $data1[$month]=$hoadon[$index];

        // }
        return view('admin.dashboard')->with('sanpham',$sanpham)->with('baiviet',$baiviet)
            ->with('donhang',$donhang)->with('doanhsoDV',$doanhsoDV)->with('doanhsoSP',$doanhsoSP)
            ->with('doanhso',$doanhso)->with('khachhang',$khachhang)
            ->with('nhanvien',$nhanvien) ;
    }




    // trang Login -> Dashboard
    public function login_AD(Request $request){

        $Email = $request->Email;
        $MatKhau = md5($request->MatKhau);

        $result = DB::table('admin')->where('Email',$Email)->where('MatKhau',$MatKhau)->first();    // first(): chi lay 1

        if($result){
            Session::put('HoTenAD',$result->HoTenAD);   // lay ten cua admin
            Session::put('id_AD',$result->id_AD);    //lay id admin
            return Redirect::to('/Dashboard');
        }
        else{
            Session::put('message','Mật khẩu hoặc Email chưa đúng, vui lòng kiểm tra lại !');
            return Redirect::to('Admin');

        }



    }

     // trang Logout
    public function logout_AD(){
      //  $this->kiemtra_AD();     // kiem tra co dang nhap k
         Session::put('HoTenAD',null);   // lay ten cua admin
        Session::put('id_AD',null);    //lay id admin
         return Redirect::to('Admin');
    }

     public function show_taiKhoan(){

        $taikhoan = DB::table('admin')->where('id_AD',Session::get('id_AD'))->get();

         return view('admin.Roles.thongtin_TK')->with('taikhoan',$taikhoan);


    }

     public function sua_taikhoan(){

       // $this->kiemtra_AD();     // kiem tra co dang nhap k
     $taikhoan = DB::table('admin')->where('id_AD',Session::get('id_AD'))->get();

        return view('admin.Roles.capnhat_TK')->with('taikhoan',$taikhoan);

        // $sua_NhanVien = Auth::user();
        // $quanli = view('admin.Roles.capnhat_TK')->with('sua_NhanVien',$sua_NhanVien)->with('roles',$roles);
        // return view('Admin_index')->with('admin.Roles.capnhat_TK',$quanli);
    }


    // cap nhat nhan vien
    public function capnhat_TaiKhoan(Request $request, $id_AD){

        $data = array();
        $data['HoTenAD'] = $request->HoTenAD;
        $data['Email'] = $request->Email;
        $data['DiaChi']= $request->DiaChi;
        $data['SoDT']= $request->SoDT;

        // insert vao csdl
        DB:: table ('admin')->where('id_AD',$id_AD)->update($data);
        Toastr::success('Cập nhật taif khoan thành công', 'Success',);
        //tra ve
        return Redirect::to('/admin-tai-khoan-cua-toi');

    }

    public function doimatkhau(){
        return view('admin.Roles.DoiMatKhau_TK');
    }

    public function capnhat_MatKhau(Request $request){
        $data = array();
        $data['MatKhau'] = md5($request->MatKhau);

        DB:: table ('admin')->where('id_AD',Session::get('id_AD'))->update($data);
        Toastr::success('Cập nhật mật khẩu của bạn thành công', 'Success',);
        //tra ve
         return Redirect::to('Dashboard');
    }


    // ham kiem tra nhap vao
    public function validation($request){

        return $this->validate($request,['HoTenAD' => 'required|max:255',
                                        'Email' => 'required|email|min:1',
                                        'SoDT' => 'required|min:1',
                                        'DiaChi' => 'required|min:1',
                                        'MatKhau' => 'required|min:1',

                             ]);
    }


    public function dothi(){
        $post=DB::table('hoadon')->get('*')->toArray();
        foreach($post as $row){
            $data[]=array
            (
                'label'=>$row->id_SanPham,
                'y'=>$row->TongHoaDon
            );
        }
        return view('Dashboard', ['data'=> $data]);

    }


}
