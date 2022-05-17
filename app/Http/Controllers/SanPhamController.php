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

class SanPhamController extends Controller
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
     public function them_SanPham(){

 //       $this->kiemtra_AD();     // kiem tra co dang nhap k
        $danhmuc_SP=DB::table('danhmucsanpham')->orderby('id_DanhMuc','asc')->get();
        return view('admin.SanPham.them_SanPham')->with('danhmuc_SP',$danhmuc_SP);
    }

    // kiem tra dl nhap
    public function kiemtra_dulieuSanPham(Request $request){


         $this->validation($request,[
            // 'title'=>'required|max:50',
            'MoTaSanPham'=>'required'
        ]);
    }

    public function lietke_SanPham(){

    //    $this->kiemtra_AD();     // kiem tra co dang nhap k
        $lietke_SanPham = DB:: table('sanpham')
            ->join('danhmucsanpham','danhmucsanpham.id_DanhMuc','=','sanpham.id_DanhMuc')
            ->orderby('id_SanPham','desc')->paginate(5);

        $quanli_sanpham = view('admin.SanPham.lietke_SanPham')->with('lietke_SanPham',$lietke_SanPham);
        return view('Admin_index')->with('admin.SanPham.lietke_SanPham',$quanli_sanpham);
    }



    public function luu_SanPham(Request $request){
        $data = array();

        $data = $request->validate(
            [
            'MoTaSanPham'=>'required'

            ],

            [
                'Vui lòng điền thông tin về mô tả sản phẩm'
            ]
    );

        $data['TenSanPham'] = $request->TenSanPham;
        $data['Gia'] = $request->Gia;
         $data['SoLuong_SP'] = $request->SoLuong_SP;
         $data['SoLuong_SPDaBan'] =0;
        $data['MoTaSanPham'] = $request->MoTaSanPham;
        $data['id_DanhMuc'] = $request->danhmuc_SP;
       // $data['HinhAnh_SP'] = $request->HinhAnh_SP;
        //$data['SoLuong_SPDaBan'] = $request->SoLuong_SPDaBan;
     //   $data['TrangThai_SP'] = $request->TrangThai_SP;

       //  lấy hinhg anh
         $get_image = $request->file('HinhAnh_SP');
        if($get_image){
            $lay_ten_hinhanh=$get_image->getClientOriginalName();
            $ten_hinhanh = current(explode('.', $lay_ten_hinhanh));
            $hinhanh = $ten_hinhanh.'.'.$get_image->getClientOriginalExtension();
            // getClientOriginalExtension(): lay duoi cua hinh anh

            $get_image->move('public/upload/sanpham',$hinhanh);
            $data['HinhAnh_SP']= $hinhanh;

             // insert vao csdl
            DB:: table ('sanpham')->insert($data);
            Toastr::success('Thêm sản phẩm '.$request->TenSanPham.'thành công', 'Success');
            //tra ve
            return Redirect::to('admin-lietke-SanPham');
        }
         $data['HinhAnh_SP']= '';
        // insert vao csdl
        DB:: table ('sanpham')->insert($data);

         Toastr::success('Thêm dịch vụ '.$request->TenSanPham.'thành công', 'Success');
        //tra ve



        return Redirect::to('admin-lietke-SanPham');

    }


    public function sua_SanPham($id_SanPham){

   //     $this->kiemtra_AD();     // kiem tra co dang nhap k
         $danhmuc_SP=DB::table('danhmucsanpham')->orderby('id_DanhMuc','asc')->get();


        $sua_SanPham = DB:: table('sanpham')->where('id_SanPham',$id_SanPham)->get();
        $quanli_danhmuc = view('admin.SanPham.sua_SanPham')->with('sua_SanPham',$sua_SanPham)->with('danhmuc_SP',$danhmuc_SP);
        return view('Admin_index')->with('admin.SanPham.sua_SanPham',$quanli_danhmuc);
    }

    public function capnhat_SanPham(Request $request, $id_SanPham){

        $data = array();
        $data['TenSanPham'] = $request->TenSanPham;
        $data['Gia'] = $request->Gia;
         $data['SoLuong_SP'] = $request->SoLuong_SP;
        $data['MoTaSanPham'] = $request->MoTaSanPham;
        $data['id_DanhMuc'] = $request->danhmuc_SP;
        //$data['HinhAnh_SP'] = $request->HinhAnh_SP;
         $get_image = $request->file('HinhAnh_SP');
        // insert vao csdl
         if($get_image){
            $lay_ten_hinhanh=$get_image->getClientOriginalName();
            $ten_hinhanh = current(explode('.', $lay_ten_hinhanh));
            $hinhanh = $ten_hinhanh.'.'.$get_image->getClientOriginalExtension();
            // getClientOriginalExtension(): lay duoi cua hinh anh

            $get_image->move('public/upload/sanpham',$hinhanh);
            $data['HinhAnh_SP']= $hinhanh;

             // insert vao csdl
            DB:: table ('sanpham')->where('id_SanPham',$id_SanPham)->update($data);
            Toastr::success('Cập nhật sản phẩm '.$request->TenSanPham.' thành công', 'Success',);
            //tra ve
            return Redirect::to('admin-lietke-SanPham');
        }
        DB:: table ('sanpham')->where('id_SanPham',$id_SanPham)->update($data);
         Toastr::success('Cập nhật sản phẩm '.$request->TenSanPham.' thành công', 'Success',);
        //tra ve
        return Redirect::to('admin-lietke-SanPham');
    }

    public function xoa_SanPham( $id_SanPham){

        // insert vao csdl

        DB:: table ('sanpham')->where('id_SanPham',$id_SanPham)->delete();
        Toastr::success('Xóa sản phẩm thành công', 'Success',);
        //tra ve
        return Redirect::to('admin-lietke-SanPham');
    }

    // trang khach hang - chi tiet san pham
    public function show_ChiTietSP( $id_SanPham){

        // insert vao csdl
        $danhmuc_SP=DB::table('danhmucsanpham')->orderby('id_DanhMuc','asc')->get();
         $danhmuc_BaiViet=DB::table('danhmucbaiviet')->orderby('id_DanhMucBaiViet','asc')->get();
        $chitiet_SP = DB:: table('sanpham')
            ->join('danhmucsanpham','danhmucsanpham.id_DanhMuc','=','sanpham.id_DanhMuc')
             ->where('sanpham.id_SanPham',$id_SanPham)->get();

        $hinhanh = DB:: table('sanpham')
             ->join('thuvienhinhanh','thuvienhinhanh.id_SanPham','=','sanpham.id_SanPham')
              ->where('sanpham.id_SanPham',$id_SanPham)->limit(4)->get();

            // san pham lien quan
        foreach($chitiet_SP as $key => $value){
            $id_DanhMuc = $value->id_DanhMuc;
        }

        $SP_lienquan = DB:: table('sanpham')
            ->join('danhmucsanpham','danhmucsanpham.id_DanhMuc','=','sanpham.id_DanhMuc')
            ->where('danhmucsanpham.id_DanhMuc',$id_DanhMuc)->whereNotIn('sanpham.id_SanPham',[$id_SanPham])
                ->limit(8)->get();

         $danhmuc_ten = DB::table('sanpham')->join('danhmucsanpham','danhmucsanpham.id_DanhMuc','=',
            'sanpham.id_DanhMuc')->where('danhmucsanpham.id_DanhMuc',$id_DanhMuc)->limit(1)->get();

       return view('page.SanPham.show_ChiTietSP')->with('danhmuc_SP',$danhmuc_SP)->with('chitiet_SP',$chitiet_SP)
            ->with('SP_lienquan',$SP_lienquan)->with('danhmuc_ten',$danhmuc_ten)->with('hinhanh',$hinhanh)
            ->with('danhmuc_BaiViet',$danhmuc_BaiViet);
    }


    public function timkiem(Request $request){

        $tu_timkiem = $request->tu_timkiem;

        // $lietke_SanPham = DB:: table('sanpham')
        //     ->join('danhmucsanpham','danhmucsanpham.id_DanhMuc','=','sanpham.id_DanhMuc')
        //     ->orderby('id_SanPham','desc')->get();

         $timkiem_SP = DB::table('sanpham')
                ->join('danhmucsanpham','danhmucsanpham.id_DanhMuc','=','sanpham.id_DanhMuc')
                ->where('sanpham.TenSanPham','like','%'.$tu_timkiem.'%')->get();

        $quanli_lichhen = view('admin.SanPham.timkiem_SanPham')
            ->with('timkiem_SP',$timkiem_SP);
        return view('Admin_index')->with('admin.SanPham.timkiem_SanPham',$quanli_lichhen);

    }



 }

