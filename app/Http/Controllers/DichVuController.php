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

class DichVuController extends Controller
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
     public function them_DichVu(){

 //       $this->kiemtra_AD();     // kiem tra co dang nhap k
        $danhmuc_DV=DB::table('dichvu')->orderby('id_DichVu','asc')->get();
        return view('admin.DichVu.them_DichVu')->with('danhmuc_DV',$danhmuc_DV);
    }



    public function lietke_DichVu(){

    //    $this->kiemtra_AD();     // kiem tra co dang nhap k
        // $lietke_DichVu = DB:: table('dichvu')
        //     ->join('nhanvien','nhanvien.id_NhanVien','=','dichvu.id_NhanVien')
        //     ->orderby('id_DichVu','desc')->paginate(5);

        // $quanli_dichvu= view('admin.DichVu.lietke_DichVu')->with('lietke_DichVu',$lietke_DichVu);
        // return view('Admin_index')->with('admin.DichVu.lietke_DichVu',$quanli_dichvu);


         $lietke_DichVu= DB:: table('dichvu')
            // ->join('nhanvien','nhanvien.id_DichVu','=','dichvu.id_DichVu')
            ->orderby('id_DichVu','desc')->paginate(5);

        $quanli_dichvu = view('admin.DichVu.lietke_DichVu')->with('lietke_DichVu',$lietke_DichVu);
        return view('Admin_index')->with('admin.DichVu.lietke_DichVu',$quanli_dichvu);
    }



    public function luu_DichVu(Request $request){
        $data = array();



        $data['TenDichVu'] = $request->TenDichVu;
        $data['Gia'] = $request->Gia;
      //  $data['id_NhanVien'] = $request->danhmuc_DV;
        $data['HinhAnh_DV'] = $request->HinhAnh_DV;

        // lấy hinhg anh
        //  $get_image = $request->file('HinhAnh_DV');
        // if($get_image){
        //     $lay_ten_hinhanh=$get_image->getClientOriginalName();
        //     $ten_hinhanh = current(explode('.', $lay_ten_hinhanh));
        //     $hinhanh = $ten_hinhanh.'.'.$get_image->getClientOriginalExtension();
        //     // getClientOriginalExtension(): lay duoi cua hinh anh

        //     $get_image->move('public/upload/dichvu',$hinhanh);
        //     $data['HinhAnh_DV']= $hinhanh;

        //      // insert vao csdl
        //     DB:: table ('dichvu')->insert($data);
        //      Toastr::success('Thêm dịch vụ '.$request->TenDichVu.'thành công', 'Success');
        //     //tra ve
        //     return Redirect::to('admin-lietke-DichVu');
        // }
        //  $data['HinhAnh_DV']= '';
        // insert vao csdl
        DB:: table ('dichvu')->insert($data);

         Toastr::success('Thêm dịch vụ '.$request->TenSanPham.'thành công', 'Success');
        //tra ve
        return Redirect::to('admin-lietke-DichVu');

    }


    public function sua_DichVu($id_DichVu){

   //     $this->kiemtra_AD();     // kiem tra co dang nhap k
         $danhmuc_DV=DB::table('nhanvien')->orderby('id_NhanVien','asc')->get();


        $sua_DichVu = DB:: table('dichvu')->where('id_DichVu',$id_DichVu)->get();
        $quanli_danhmuc = view('admin.DichVu.sua_DichVu')->with('sua_DichVu',$sua_DichVu)->with('danhmuc_DV',$danhmuc_DV);
        return view('Admin_index')->with('admin.SanPham.sua_SanPham',$quanli_danhmuc);
    }

    public function capnhat_DichVu(Request $request, $id_DichVu){

        $data = array();
        $data['TenDichVu'] = $request->TenDichVu;
        $data['Gia'] = $request->Gia;
        $data['id_NhanVien'] = $request->danhmuc_DV;
        $data['HinhAnh_DV'] = $request->HinhAnh_DV;
        //  $get_image = $request->file('HinhAnh_DV');
        // // insert vao csdl
        //  if($get_image){
        //     $lay_ten_hinhanh=$get_image->getClientOriginalName();
        //     $ten_hinhanh = current(explode('.', $lay_ten_hinhanh));
        //     $hinhanh = $ten_hinhanh.'.'.$get_image->getClientOriginalExtension();
        //     // getClientOriginalExtension(): lay duoi cua hinh anh

        //     $get_image->move('public/upload/dichvu',$hinhanh);
        //     $data['HinhAnh_DV']= $hinhanh;

        //      // insert vao csdl
        //     DB:: table ('dichvu')->where('id_DichVu',$id_DichVu)->update($data);
        //     Toastr::success('Cập nhật dichuj vụ '.$request->TenDichVu.' thành công', 'Success',);
        //     //tra ve
        //     return Redirect::to('admin-lietke-DichVu');
        // }
        DB:: table ('dichvu')->where('id_DichVu',$id_DichVu)->update($data);
         Toastr::success('Cập nhật dịch vụ '.$request->TenDichVu.' thành công', 'Success',);
        //tra ve
        return Redirect::to('admin-lietke-DichVu');
    }

    public function xoa_DichVu( $id_DichVu){

        // insert vao csdl

        DB:: table ('dichvu')->where('id_DichVu',$id_DichVu)->delete();
        Toastr::success('Xóa dịch vụ thành công', 'Success',);
        //tra ve
        return Redirect::to('admin-lietke-DichVu');
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


 }

