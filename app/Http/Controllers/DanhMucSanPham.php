<?php

// controller DANH MUC SAN PHAM
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;  //Redirect :tra ve
session_start();
use Toastr;
use Auth;

class DanhMucSanPham extends Controller
{

    //kiem tra dang nhap admin
    public function kiemtra_AD(){
        $id_AD =   Auth::id();
        if($id_AD){
             Redirect::to('Dashboard');
        }else{
            return Redirect::to('Admin')->send();
        }
    }

    //
    public function them_DanhMucSP(){
         $this->kiemtra_AD();     // kiem tra co dang nhap k

     //    $danhmuc_SP=DB::table('danhmucsanpham')->orderby('id_DanhMuc','asc')->get();
        return view('admin.DanhMucSanPham.them_danhmucSP');
    }

    public function lietke_DanhMucSP(){
         $this->kiemtra_AD();     // kiem tra co dang nhap k
        $lietke_danhmucSP = DB:: table('danhmucsanpham')->orderby('id_DanhMuc','desc')->paginate(5);
        $quanli_danhmuc = view('admin.DanhMucSanPham.lietke_danhmucSP')->with('lietke_danhmucSP',$lietke_danhmucSP);
        return view('Admin_index')->with('admin.DanhMucSanPham.lietke_danhmucSP',$quanli_danhmuc);
    }

    public function luu_danhmucSP(Request $request){
        $data = array();
        $data['TenDanhMuc'] = $request->TenDanhMuc;
        $data['MoTa'] = $request->MoTa;
    //    $data['TrangThai'] = $request->TrangThai;

         $get_image = $request->file('HinhAnh_DanhMuc');
        // insert vao csdl
         if($get_image){
            $lay_ten_hinhanh=$get_image->getClientOriginalName();
            $ten_hinhanh = current(explode('.', $lay_ten_hinhanh));
            $hinhanh = $ten_hinhanh.'.'.$get_image->getClientOriginalExtension();
            // getClientOriginalExtension(): lay duoi cua hinh anh

            $get_image->move('public/upload/danhmucsanpham',$hinhanh);
            $data['HinhAnh_DanhMuc']= $hinhanh;

             // insert vao csdl
            DB:: table ('danhmucsanpham')->insert($data);
        Toastr::success('Thêm danh mục sản phẩm '.$request->TenDanhMuc.' thành công', 'Success',);
            //tra ve
            return Redirect::to('admin-lietke-DanhMucSP');
        }

        // insert vao csdl
        DB:: table ('danhmucsanpham')->insert($data);
       Toastr::success('Thêm danh mục sản phẩm  '.$request->TenDanhMuc.' thành công', 'Success',);
        //tra ve
        return Redirect::to('admin-lietke-DanhMucSP');

    }


    public function sua_danhmucSP($id_DanhMuc){
        $this->kiemtra_AD();
        $sua_danhmucSP = DB:: table('danhmucsanpham')->where('id_DanhMuc',$id_DanhMuc)->get();
        $quanli_danhmuc = view('admin.DanhMucSanPham.sua_danhmucSP')->with('sua_danhmucSP',$sua_danhmucSP);
        return view('Admin_index')->with('admin.DanhMucSanPham.sua_danhmucSP',$quanli_danhmuc);
    }

    public function capnhat_danhmucSP(Request $request, $id_DanhMuc){

        $data = array();
        $data['TenDanhMuc'] = $request->TenDanhMuc;
        $data['MoTa'] = $request->MoTa;

         $get_image = $request->file('HinhAnh_DanhMuc');
        // insert vao csdl
         if($get_image){
            $lay_ten_hinhanh=$get_image->getClientOriginalName();
            $ten_hinhanh = current(explode('.', $lay_ten_hinhanh));
            $hinhanh = $ten_hinhanh.'.'.$get_image->getClientOriginalExtension();
            // getClientOriginalExtension(): lay duoi cua hinh anh

            $get_image->move('public/upload/danhmucsanpham',$hinhanh);
            $data['HinhAnh_DanhMuc']= $hinhanh;

             // insert vao csdl
            DB:: table ('danhmucsanpham')->where('id_DanhMuc',$id_DanhMuc)->update($data);
            Toastr::success('Cập nhật danh mục sản phẩm '.$request->TenDanhMuc.' thành công', 'Success',);
            //tra ve
            return Redirect::to('admin-lietke-DanhMucSP');
        }


        // insert vao csdl
        DB:: table ('danhmucsanpham')->where('id_DanhMuc',$id_DanhMuc)->update($data);
        Toastr::success('Cập nhật danh mục sản phẩm '.$request->TenDanhMuc.' thành công', 'Success',);
        //tra ve
        return Redirect::to('admin-lietke-DanhMucSP');
    }

    public function xoa_danhmucSP( $id_DanhMuc){

        // insert vao csdl
        DB:: table ('danhmucsanpham')->where('id_DanhMuc',$id_DanhMuc)->delete();
        Toastr::success('Xóa danh mục sản phẩm thành công', 'Success',);
        //tra ve
        return Redirect::to('admin-lietke-DanhMucSP');
    }

    // trang khach hang

    public function show_DanhMucHome( $id_DanhMuc){
        $danhmuc_BaiViet=DB::table('danhmucbaiviet')->orderby('id_DanhMucBaiViet','asc')->get();

        $danhmuc_SP=DB::table('danhmucsanpham')->orderby('id_DanhMuc','asc')->get();
        $danhmuc_id = DB::table('sanpham')->join('danhmucsanpham','danhmucsanpham.id_DanhMuc','=',
            'sanpham.id_DanhMuc')->where('danhmucsanpham.id_DanhMuc',$id_DanhMuc)->paginate(9);
        $danhmuc_ten = DB::table('sanpham')->join('danhmucsanpham','danhmucsanpham.id_DanhMuc','=',
            'sanpham.id_DanhMuc')->where('danhmucsanpham.id_DanhMuc',$id_DanhMuc)->limit(1)->get();

          $sanpham = DB::table('sanpham')->orderby('id_SanPham','desc')->limit(5)->get();
        return view('page.DanhMucSP.show_danhmucSP')->with('danhmuc_SP',$danhmuc_SP)->with('danhmuc_id',$danhmuc_id)->with('danhmuc_ten',$danhmuc_ten) ->with('sanpham',$sanpham)->with('danhmuc_BaiViet',$danhmuc_BaiViet);
    }
}


