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

class LichHenController extends Controller
{
    //
    public function lietke_LichHen(){

    //    $this->kiemtra_AD();     // kiem tra co dang nhap k
        $lietke_LichHen = DB:: table('lichhen')
            ->join('khachhang','khachhang.id_KhachHang','=','lichhen.id_KhachHang')
            ->join('nhanvien','nhanvien.id_NhanVien','=','lichhen.id_NhanVien')
            ->join('dichvu','dichvu.id_DichVu','=','lichhen.id_DichVu')
            ->orderby('id_LichHen','desc')->paginate(10);

        $quanli_lichhen = view('admin.LichHen.lietke_LichHen')->with('lietke_LichHen',$lietke_LichHen);
        return view('Admin_index')->with('admin.LichHen.lietke_LichHen',$quanli_lichhen);
    }

    public function them_LichHen(){

 //       $this->kiemtra_AD();     // kiem tra co dang nhap k
        $khachhang=DB::table('khachhang')->orderby('id_KhachHang','asc')->get();
        $nhanvien=DB::table('nhanvien')->orderby('id_NhanVien','asc')->get();
        $dichvu=DB::table('dichvu')->orderby('id_DichVu','asc')->get();
        return view('admin.LichHen.them_LichHen')->with('nhanvien',$nhanvien)->with('dichvu', $dichvu)
                ->with('khachhang', $khachhang);
    }

    public function luu_LichHen(Request $request){
        $data = array();
        $data['id_KhachHang'] = $request->khachhang;
        $data['id_NhanVien'] = $request->nhanvien;
        $data['id_DichVu'] = $request->dichvu;
        $data['NgayDK'] = $request->NgayDK;

       $data['GioDK'] = $request->GioDK;
         $data['TrangThaiLichHen'] = 1;

         if($request->dichvu==1){
            $data['TongTien'] = 30000;
         }
         else if($request->dichvu==2){
            $data['TongTien'] = 180000;
         }
         else if($request->dichvu==3){
            $data['TongTien'] = 780000;
         }
        // insert vao csdl
        DB:: table ('lichhen')->insert($data);



          $data1 = array();
         $id_LichHen= DB::table('lichhen')
                    ->max('id_LichHen');




       $data1['id_KhachHang'] = $request->khachhang;
       $data1['id_SanPham']=0;
        $data1['id_LichHen'] = $id_LichHen;
        $data1['TenSanPham']='NULL';
      //$data1['TenVe'] = $TenVe;

        if($request->dichvu ==1){
             $data1['TenVe'] ='Vé ngày';
        }
        elseif($request->dichvu ==2 ){
             $data1['TenVe'] ='Vé tuần';
        }
        elseif($request->dichvu ==3){
             $data1['TenVe'] ='Vé tháng';
        }



        if($request->dichvu==1){
            $data1['TongHoaDon'] = 30000;
         }
         else if($request->dichvu==2){
            $data1['TongHoaDon'] = 180000;
         }
         else if($request->dichvu==3){
            $data1['TongHoaDon'] = 780000;
         }

        $data1['Ngay']= now();
        $data1['TrangThaiHoaDon']=0;
        $data1['created_at'] = now();


        DB:: table ('hoadon')->insert($data1);


        return Redirect::to('admin-lietke-LichHen');

    }

    public function xoa_LichHen( $id_LichHen){

        // insert vao csdl

        DB:: table ('lichhen')->where('id_LichHen',$id_LichHen)->delete();
        Toastr::success('Xóa lịch hẹn thành công', 'Success',);
        //tra ve
        return Redirect::to('admin-lietke-LichHen');
    }


}
