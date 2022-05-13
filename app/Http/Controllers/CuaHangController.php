<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;



  //Redirect :tra ve
session_start();

class CuaHangController extends Controller
{
    //
    // cua hang
    // trang chu
    public function index_CuaHang(){

       // $sanpham_id = DB::table('sanpham')->orderby('id_SanPham','asc')->get();
        $danhmuc_SP=DB::table('danhmucsanpham')->orderby('id_DanhMuc','asc')->get();
         $danhmuc_BaiViet=DB::table('danhmucbaiviet')->orderby('id_DanhMucBaiViet','asc')->get();

        // $lietke_SanPham = DB:: table('sanpham')
        //     ->join('danhmucsanpham','danhmucsanpham.id_DanhMuc','=','sanpham.id_DanhMuc')
        //     ->orderby('id_SanPham','asc')->get();

        $sanpham_id = DB::table('sanpham')->orderby('id_SanPham','desc')->paginate(9);

        // hien thi trang sibar
        $sanpham = DB::table('sanpham')->orderby('id_SanPham','desc')->limit(5)->get();
        return view('page.cuahang',['sanpham_id'=>$sanpham_id])->with('danhmuc_SP',$danhmuc_SP)->with('sanpham_id',$sanpham_id)->with('sanpham',$sanpham)->with('danhmuc_BaiViet',$danhmuc_BaiViet);
    }


}
