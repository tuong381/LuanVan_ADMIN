<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;  //Redirect :tra ve

use Illuminate\Support\Facades\Route;
use Session;
session_start();

use App\Models\admin;
use App\Models\roles;
use Auth;
use Toastr;

class UsersController extends Controller
{
    //
    //kiem tra dang nhap admin
    public function kiemtra_AD(){
        $id_AD =  Auth::id();
        if($id_AD){
             Redirect::to('Dashboard');
        }else{
            return Redirect::to('Admin')->send();
        }
    }

    // liet ke nhan vien
    public function index(){

     //  $admin = admin::with('roles')->orderby('id_AD','DESC')->paginate(10);
        //  $admin=DB::table('nhanvien')
        //      ->join('chucvu','chucvu.id_ChucVu','=','nhanvien.id_ChucVu')
        //     ->orderby('id_NhanVien','asc')->paginate(10);
        //  $lietke_SanPham = DB:: table('sanpham')
        //     ->join('danhmucsanpham','danhmucsanpham.id_DanhMuc','=','sanpham.id_DanhMuc')
        //     ->orderby('id_SanPham','desc')->paginate(5);
        // return view('admin.Roles.lietke_user')->with(compact('admin'));


        $lietke_NhanVien = DB::table('nhanvien')
            ->orderby('id_NhanVien','desc')->paginate(10);

        $quanli_nhanvien = view('admin.Roles.lietke_user')->with('lietke_NhanVien',$lietke_NhanVien);
        return view('Admin_index')->with('admin.Roles.lietke_user',$quanli_nhanvien);
    }

    // them nhan vien
    public function them_NhanVien(){

   //     $this->kiemtra_AD();     // kiem tra co dang nhap k
        return view('admin.Roles.them_NhanVien');
    }

    // luu nhan vien
    public function luu_NhanVien(Request $request){


         $data = array();
        $data['TenNV'] = $request->TenNV;
        $data['Email'] = $request->Email;
         $data['SoDienThoai'] = $request->SoDienThoai;
        $data['DiaChi'] = $request->DiaChi;
        $data['MatKhau'] = $request->MatKhau;
        $data['AnhDaiDien'] = NULL;
        $data['NgaySinh'] = $request->NgaySinh;
        $data['GioiTinh'] = $request->GioiTinh;
          $data['KinhNghiem'] = $request->KinhNghiem;

       //   $get_image = $request->file('AnhDaiDien');
       //  // insert vao csdl
       //   if($get_image){
       //      $lay_ten_hinhanh=$get_image->getClientOriginalName();
       //      $ten_hinhanh = current(explode('.', $lay_ten_hinhanh));
       //      $hinhanh = $ten_hinhanh.'.'.$get_image->getClientOriginalExtension();
       //      // getClientOriginalExtension(): lay duoi cua hinh anh

       //      $get_image->move('public/upload/nhanvien',$hinhanh);
       //      $data['AnhDaiDien']= $hinhanh;

       //      DB:: table ('nhanvien')->insert($data);

       //   Toastr::success('Thêm dịch vụ '.$request->TenNV.'thành công', 'Success');
       //  //tra ve

       // return Redirect::to('lietke-user');
       //  }

        DB:: table ('nhanvien')->insert($data);

         Toastr::success('Thêm dịch vụ '.$request->TenNV.'thành công', 'Success');
        //tra ve

       return Redirect::to('lietke-user');


    }


    // sua nhan vien

    public function sua_NhanVien($id_NhanVien){

     //   $this->kiemtra_AD();     // kiem tra co dang nhap k
     //    $admin = admin::where('Email',$data['Email'])->first();
        //  $roles=roles::orderby('id_Roles','asc')->get();

        // $sua_NhanVien = admin::find($id_AD);
        // $quanli = view('admin.Roles.sua_user')->with('sua_NhanVien',$sua_NhanVien)->with('roles',$roles);
        // return view('Admin_index')->with('admin.Roles.sua_user',$quanli);



        // $chucvu=DB::table('chucvu')->orderby('id_ChucVu','asc')->get();
        $sua_NhanVien = DB:: table('nhanvien')->where('id_NhanVien',$id_NhanVien)->get();
        $quanli_nhanvien = view('admin.Roles.sua_user')->with('sua_NhanVien',$sua_NhanVien);
                // ->with('chucvu',$chucvu);
        return view('Admin_index')->with('admin.Roles.sua_user',$quanli_nhanvien);
    }


    // cap nhat nhan vien
    public function capnhat_NhanVien(Request $request, $id_NhanVien){


         $data = array();

        $data['TenNV'] = $request->TenNV;
        $data['Email'] = $request->Email;
        $data['DiaChi'] = $request->DiaChi;
        $data['SoDienThoai'] = $request->SoDienThoai;
        $data['MatKhau'] = $request->MatKhau;
        $data['AnhDaiDien'] =NULL;
        $data['NgaySinh'] = $request->NgaySinh;
        $data['GioiTinh'] = $request->GioiTinh;
        $data['KinhNghiem'] = $request->KinhNghiem;

        // $get_image = $request->file('AnhDaiDien');
        // // insert vao csdl
        //  if($get_image){
        //     $lay_ten_hinhanh=$get_image->getClientOriginalName();
        //     $ten_hinhanh = current(explode('.', $lay_ten_hinhanh));
        //     $hinhanh = $ten_hinhanh.'.'.$get_image->getClientOriginalExtension();
        //     // getClientOriginalExtension(): lay duoi cua hinh anh

        //     $get_image->move('public/upload/nhanvien',$hinhanh);
        //     $data['AnhDaiDien']= $hinhanh;

        //      // insert vao csdl
        //     DB:: table ('nhanvien')->where('id_NhanVien',$id_NhanVien)->update($data);
        //     Toastr::success('Cập nhật danh mục nhân viên '.$request->TenNV.' thành công', 'Success',);
        //     //tra ve
        //     return Redirect('/lietke-user');
        // }

         // insert vao csdl
        DB:: table ('nhanvien')->where('id_NhanVien',$id_NhanVien)->update($data);
        Toastr::success('Cập nhật danh mục nhân viên '.$request->TenNV.' thành công', 'Success',);
        //tra ve
        return Redirect('/lietke-user');

    }


    // xoa nhan vien
    public function xoa_NhanVien($id_NhanVien){

        // insert vao csdl
        DB:: table ('nhanvien')->where('id_NhanVien',$id_NhanVien)->delete();
        Toastr::success('Xóa danh mục nhân viên thành công', 'Success',);
        //tra ve
        return Redirect()->back();

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

    public function timkiem(Request $request){

        $tu_timkiem = $request->tu_timkiem;

         $timkiem_NhanVien = DB::table('nhanvien')
                ->where('TenNV','like','%'.$tu_timkiem.'%')->get();

        $quanli_lichhen = view('admin.Roles.timkiem_NhanVien')
            ->with('timkiem_NhanVien',$timkiem_NhanVien);
        return view('Admin_index')->with('admin.Roles.timkiem_NhanVien',$quanli_lichhen);

    }

}
