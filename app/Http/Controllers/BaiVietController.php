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

class BaiVietController extends Controller
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


    // DANH MUC BAI VIET

    public function them_DanhMucBaiViet(){
       //  $this->kiemtra_AD();     // kiem tra co dang nhap k
        return view('admin.DanhMucBaiViet.them_danhmucBaiViet');
    }

    public function luu_danhmucBaiViet(Request $request){
        $data = array();
        $data['TenDanhMuc'] = $request->TenDanhMuc;


        // insert vao csdl
        DB:: table ('danhmucbaiviet')->insert($data);
        Toastr::success('Thêm danh mục bài viết thành công', 'Success',);
        //tra ve
        return Redirect::to('admin-lietke-DanhMucBaiViet');
    }

     public function lietke_DanhMucBaiViet(){
      //   $this->kiemtra_AD();     // kiem tra co dang nhap k
        $lietke_danhmucBaiViet= DB:: table('danhmucbaiviet')->orderby('id_DanhMuc','desc')->paginate(5);
        $quanli_danhmuc = view('admin.DanhMucBaiViet.lietke_danhmucBaiViet')->with('lietke_danhmucBaiViet',$lietke_danhmucBaiViet);
        return view('Admin_index')->with('admin.DanhMucBaiViet.lietke_danhmucBaiViet',$quanli_danhmuc);
    }

    public function sua_danhmucBaiViet($id_DanhMuc){
       // $this->kiemtra_AD();
        $sua_danhmucBaiViet = DB:: table('danhmucbaiviet')->where('id_DanhMuc',$id_DanhMuc)->get();
        $quanli_danhmuc = view('admin.DanhMucBaiViet.sua_danhmucBaiViet')->with('sua_danhmucBaiViet',$sua_danhmucBaiViet);
        return view('Admin_index')->with('admin.DanhMucBaiViet.sua_danhmucBaiViet',$quanli_danhmuc);
    }

    public function capnhat_danhmucBaiViet(Request $request, $id_DanhMuc){

        $data = array();
        $data['TenDanhMuc'] = $request->TenDanhMuc;

        // insert vao csdl
        DB:: table ('danhmucbaiviet')->where('id_DanhMuc',$id_DanhMuc)->update($data);
    //    Session::put('message','Cập nhật danh mục bài viết '.$request->TenDanhMucBaiViet.' thành công');
        Toastr::success('Cập danh mục bài viết '.$request->TenDanhMuc.' thành công', 'Success',);
        //tra ve
        return Redirect::to('admin-lietke-DanhMucBaiViet');
    }

    public function xoa_danhmucBaiViet( $id_DanhMuc){

        // insert vao csdl
        DB:: table ('danhmucbaiviet')->where('id_DanhMuc',$id_DanhMuc)->delete();
      //  Session::put('message','Xóa danh mục bài viết thành công');
        //tra ve
        Toastr::success('Xóa danh mục bài viết thành công', 'Success',);
        return Redirect::to('admin-lietke-DanhMucBaiViet');
    }



    // BAI VIET

    public function them_BaiViet(){

      //  $this->kiemtra_AD();     // kiem tra co dang nhap k
         $danhmuc_BaiViet=DB::table('danhmucbaiviet')->orderby('id_DanhMuc','asc')->get();

        return view('admin.BaiViet.them_BaiViet')->with('danhmuc_BaiViet',$danhmuc_BaiViet);
    }

     public function luu_BaiViet(Request $request){
        $data = array();

        $data = $request->validate(
            [
            'NoiDungBaiViet'=>'required'

            ],

            [
                'Vui lòng điền thông tin về nội dung bài viết'
            ]
    );

        $data['TenBaiViet'] = $request->TenBaiViet;
        $data['NoiDungBaiViet'] = $request->NoiDungBaiViet;

       // date_default_timezone_set('Asia/Ho_Chi_Minh');

     //   $data['created_at'] = now();
         $data['id_DanhMuc'] = $request->danhmuc_BaiViet;
        $get_image = $request->file('HinhAnh');
        if($get_image){
            $lay_ten_hinhanh=$get_image->getClientOriginalName();
            $ten_hinhanh = current(explode('.', $lay_ten_hinhanh));
            $hinhanh = $ten_hinhanh.'.'.$get_image->getClientOriginalExtension();
            // getClientOriginalExtension(): lay duoi cua hinh anh

            $get_image->move('public/upload/baiviet',$hinhanh);
            $data['HinhAnh']= $hinhanh;

             // insert vao csdl
            DB:: table ('baiviet')->insert($data);
        Toastr::success('Thêm bài viết '.$request->TenBaiViet.' thành công', 'Success',);
        //tra ve
        return Redirect::to('admin-lietke-BaiViet');
        }
         $data['HinhAnh_SP']= '';

        DB:: table ('baiviet')->insert($data);
        Toastr::success('Thêm bài viết '.$request->TenBaiViet.' thành công', 'Success',);
        //tra ve
        return Redirect::to('admin-lietke-BaiViet');

    }


    public function lietke_BaiViet(){
      //   $this->kiemtra_AD();     // kiem tra co dang nhap k
        $lietke_BaiViet = DB:: table('baiviet')
            ->join('danhmucbaiviet','danhmucbaiviet.id_DanhMuc','=','baiviet.id_DanhMuc')
            ->select('baiviet.*','danhmucbaiviet.TenDanhMuc')
            ->orderby('id_BaiViet','desc')->paginate(5);
        $quanli_baiviet = view('admin.BaiViet.lietke_BaiViet')->with('lietke_BaiViet',$lietke_BaiViet);
        return view('Admin_index')->with('admin.BaiViet.lietke_BaiViet',$quanli_baiviet);
    }


    public function sua_BaiViet($id_BaiViet){

       // $this->kiemtra_AD();     // kiem tra co dang nhap k
        $danhmuc_BaiViet=DB::table('danhmucbaiviet')->orderby('id_DanhMuc','asc')->get();

        $sua_BaiViet = DB:: table('baiviet')->where('id_BaiViet',$id_BaiViet)->get();
        $quanli_baiviet = view('admin.BaiViet.sua_BaiViet')->with('sua_BaiViet',$sua_BaiViet)
            ->with('danhmuc_BaiViet',$danhmuc_BaiViet);
        return view('Admin_index')->with('admin.BaiViet.sua_BaiViet',$quanli_baiviet);
    }


    public function xoa_BaiViet( $id_BaiViet){

        // insert vao csdl
        DB:: table ('baiviet')->where('id_BaiViet',$id_BaiViet)->delete();
         Toastr::success('Xóa bài viết thành công', 'Success',);
        //tra ve
        return Redirect::to('admin-lietke-BaiViet');
    }


     public function capnhat_BaiViet(Request $request, $id_BaiViet){

        $data = array();
        $data['TenBaiViet'] = $request->TenBaiViet;
        $data['NoiDungBaiViet'] = $request->NoiDungBaiViet;
         $data['id_DanhMuc'] = $request->danhmuc_BaiViet;
    //    $data['HinhAnh'] = $request->HinhAnh;

         $get_image = $request->file('HinhAnh');
        // insert vao csdl
         if($get_image){
            $lay_ten_hinhanh=$get_image->getClientOriginalName();
            $ten_hinhanh = current(explode('.', $lay_ten_hinhanh));
            $hinhanh = $ten_hinhanh.'.'.$get_image->getClientOriginalExtension();
            // getClientOriginalExtension(): lay duoi cua hinh anh

            $get_image->move('public/upload/baiviet',$hinhanh);
            $data['HinhAnh']= $hinhanh;

             // insert vao csdl
            DB:: table ('baiviet')->where('id_BaiViet',$id_BaiViet)->update($data);

            Toastr::success('Cập nhật bài viết '.$request->TenBaiViet.' thành công', 'Success',);
            //tra ve
            return Redirect::to('admin-lietke-BaiViet');
        }
        DB:: table ('baiviet')->where('id_BaiViet',$id_BaiViet)->update($data);
       // Session::put('message','Cập nhật bài viết '.$request->TenBaiViet.' thành công');
        //tra ve
         Toastr::success('Cập nhật bài viết '.$request->TenBaiViet.' thành công', 'Success',);
        return Redirect::to('admin-lietke-BaiViet');
    }




    // KHÁCH HÀNG



}
