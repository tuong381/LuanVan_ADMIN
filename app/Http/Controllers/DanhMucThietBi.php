<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;  //Redirect :tra ve
session_start();
use Toastr;
use Auth;

class DanhMucThietBi extends Controller
{
    //
     public function them_DanhMucTB(){
    //     $this->kiemtra_AD();     // kiem tra co dang nhap k

     //    $danhmuc_SP=DB::table('danhmucsanpham')->orderby('id_DanhMuc','asc')->get();
        return view('admin.DanhMucThietBi.them_danhmucTB');
    }

    public function lietke_danhmucTB(){
       //  $this->kiemtra_AD();     // kiem tra co dang nhap k
        $lietke_danhmucTB = DB:: table('danhmucsanpham')->orderby('id_DanhMuc','desc')->paginate(5);
        $quanli_danhmuc = view('admin.DanhMucThietBi.lietke_danhmucTB')->with('lietke_danhmucTB',$lietke_danhmucTB);
        return view('Admin_index')->with('admin.DanhMucThietBi.lietke_danhmucTB',$quanli_danhmuc);
    }

    public function luu_danhmucTB(Request $request){
        $data = array();
        $data['TenDanhMuc'] = $request->TenDanhMuc;
    //     $data['MoTa'] = $request->MoTa;
       // $data['HinhAnh'] = $request->HinhAnh;

          $get_image = $request->file('HinhAnh');
        // insert vao csdl
         if($get_image){
            $lay_ten_hinhanh=$get_image->getClientOriginalName();
            $ten_hinhanh = current(explode('.', $lay_ten_hinhanh));
            $hinhanh = $ten_hinhanh.'.'.$get_image->getClientOriginalExtension();
            // getClientOriginalExtension(): lay duoi cua hinh anh

            $get_image->move('public/upload/danhmucsanpham/',$hinhanh);
            $data['HinhAnh']= $hinhanh;

             // insert vao csdl
            DB:: table ('danhmucsanpham')->insert($data);
        Toastr::success('Thêm danh mục sản phẩm '.$request->TenDanhMuc.' thành công', 'Success',);
            //tra ve
            return Redirect::to('admin-lietke-DanhMucTB');
        }

            DB:: table ('danhmucsanpham')->insert($data);
        Toastr::success('Thêm danh mục sản phẩm '.$request->TenLoaiTB.' thành công', 'Success',);
            //tra ve
            return Redirect::to('admin-lietke-DanhMucTB');
        }

       public function sua_danhmucTB($id_DanhMuc){
    //    $this->kiemtra_AD();
        $sua_danhmucTB = DB:: table('danhmucsanpham')->where('id_DanhMuc',$id_DanhMuc)->get();
        $quanli_danhmuc = view('admin.DanhMucThietBi.sua_danhmucTB')->with('sua_danhmucTB',$sua_danhmucTB);
        return view('Admin_index')->with('admin.DanhMucThietBi.sua_danhmucTB',$quanli_danhmuc);
    }

    public function capnhat_danhmucTB(Request $request, $id_DanhMuc){

        $data = array();
        $data['TenDanhMuc'] = $request->TenDanhMuc;
      //  $data['HinhAnh'] = $request->HinhAnh;

         $get_image = $request->file('HinhAnh');
        // insert vao csdl
         if($get_image){
            $lay_ten_hinhanh=$get_image->getClientOriginalName();
            $ten_hinhanh = current(explode('.', $lay_ten_hinhanh));
            $hinhanh = $ten_hinhanh.'.'.$get_image->getClientOriginalExtension();
            // getClientOriginalExtension(): lay duoi cua hinh anh

            $get_image->move('public/upload/danhmucsanpham/',$hinhanh);
            $data['HinhAnh']= $hinhanh;

             // insert vao csdl
            DB:: table ('danhmucsanpham')->where('id_DanhMuc',$id_DanhMuc)->update($data);
        Toastr::success('Thêm danh mục sản phẩm '.$request->TenDanhMuc.' thành công', 'Success',);
            //tra ve
            return Redirect::to('admin-lietke-DanhMucTB');
        }
            DB:: table ('danhmucsanpham')->where('id_DanhMuc',$id_DanhMuc)->update($data);
         Toastr::success('Cập nhật danh mục thiết bị '.$request->TenDanhMuc.' thành công', 'Success',);
            //tra ve
            return Redirect::to('admin-lietke-DanhMucTB');

        }

        public function xoa_danhmucTB( $id_DanhMuc){

        // insert vao csdl
        DB:: table ('danhmucsanpham')->where('id_DanhMuc',$id_DanhMuc)->delete();
        Toastr::success('Xóa danh mục thiết bị thành công', 'Success',);
        //tra ve
        return Redirect::to('admin-lietke-DanhMucTB');
    }



}
