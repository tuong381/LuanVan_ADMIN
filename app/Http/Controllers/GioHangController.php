<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;  //Redirect :tra ve
session_start();


class GioHangController extends Controller
{
    //
    public function themgiohang(Request $request){

        $id_SanPham = $request->idSP_hidden;
        $soluong = $request->soluong;

        $sanpham=DB::table('sanpham')->where('id_SanPham',$id_SanPham)->first();

    //     Cart::destroy();
     //   Cart::add('293ad', 'Product 1', 1, 9.99, 550);
//    Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        $data['id'] = $sanpham->id_SanPham;
        $data['qty'] = $soluong;
        $data['name'] = $sanpham->TenSanPham;
        $data['price'] = $sanpham->Gia;
        $data['weight'] =$sanpham->Gia;
        $data['options']['image'] = $sanpham->HinhAnh;
        Cart::add($data);
   //     return Redirect::to('/show-GioHang');
        return redirect()->back();


    }



    public function show_GioHang(){

         $danhmuc_SP=DB::table('danhmucsanpham')->orderby('id_DanhMuc','asc')->get();
          $danhmuc_BaiViet=DB::table('danhmucbaiviet')->orderby('id_DanhMucBaiViet','asc')->get();
        return view('page.GioHang.show_GioHang')->with('danhmuc_SP',$danhmuc_SP)
            ->with('danhmuc_BaiViet',$danhmuc_BaiViet);

    }

    public function xoa_GioHang($rowId){

        Cart::update($rowId, 0);
        return Redirect::to('/show-GioHang');

    }

    public function xoatatca_GioHang(){
         Cart::destroy();
          return Redirect::to('/show-GioHang');

    }

    public function capnhat_giohang(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId, $qty);

        return Redirect::to('/show-GioHang');

    }

    public function soluong_giohang(){
        //$cart = count(Session::get('cart'));
         $cart =Cart::content()->count();

         echo $cart;
    }


}
