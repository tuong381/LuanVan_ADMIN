<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;  //Redirect :tra ve

use App\Models\hoadon;
use App\Models\chitiethoadon;
use App\Models\sanpham;
use App\Models\khachhang;
use App\Models\lichhen;
use App\Models\nhanvien;

session_start();
use Auth;
use Mail;

class HoaDonController extends Controller
{
    //



    //kiem tra dang nhap admin
    public function kiemtra_AD(){
        $id_AD =   Auth::id();
        if($id_AD){
             Redirect::to('Dashboard');
        }else{
            return Redirect::to('Admin')->send();
        }
    }

    // liet ke don hang

    public function lietke_HoaDon(){

      //   $this->kiemtra_AD();     // kiem tra co dang nhap k
        $lietke_HoaDon= DB:: table('hoadon')
            ->join('khachhang','khachhang.id_KhachHang','=','hoadon.id_KhachHang')
            ->select('hoadon.*','khachhang.TenKH')     // bangr hoa don lay tat ca. bang khach hang chi lay ten khach hang
            ->orderby('id_HD','desc')->paginate(10);

        $quanli_hoadon = view('admin.HoaDon.lietke_HoaDon')->with('lietke_HoaDon',$lietke_HoaDon);
        return view('Admin_index')->with('admin.HoaDon.lietke_HoaDon',$quanli_hoadon);
      //  return view('admin.HoaDon.lietke_HoaDon');
    }

    // xem don hang
    public function xem_HoaDon($id_HD){
     //   $this->kiemtra_AD();     // kiem tra co dang nhap k
        $xem_HoaDon = DB:: table('hoadon')

            ->join('khachhang','khachhang.id_KhachHang','=','hoadon.id_KhachHang')

            // ->join('sanpham','sanpham.id_SanPham','=','hoadon.id_SanPham')

            //  ->join('lichhen','lichhen.id_LichHen','=','hoadon.id_LichHen')

            ->where('hoadon.id_HD',$id_HD)->get();     // bangr hoa don lay tat ca. bang


        // $xem_DichVu = DB:: table('hoadon')
        //      ->join('lichhen','lichhen.id_LichHen','=','hoadon.id_LichHen')
        //     ->where('hoadon.id_HD',$id_HD)->get();

         $xem_DichVu = DB:: table('lichhen')
             ->join('nhanvien','nhanvien.id_NhanVien','=','lichhen.id_NhanVien')
             ->join('hoadon','hoadon.id_LichHen','=','lichhen.id_LichHen')
            ->where('hoadon.id_HD',$id_HD)->get();


        $xem_SanPham = DB:: table('hoadon')

            ->join('sanpham','sanpham.id_SanPham','=','hoadon.id_SanPham')

            ->where('hoadon.id_HD',$id_HD)->get();




            // echo "</pre>";
            // print_r($xem_DonHang);
            // echo "</pre>";

        $quanli_hoadon_xem = view('admin.HoaDon.xem_HoaDon')->with('xem_HoaDon',$xem_HoaDon)
        ->with('xem_DichVu',$xem_DichVu)->with('xem_SanPham',$xem_SanPham);
        return view('Admin_index')->with('admin.Hoadon.xem_HoaDon',$quanli_hoadon_xem);


        }


        // xoa don hang

        public function xoa_donHang($id_HD){

             DB:: table ('hoadon')->where('id_HD',$id_HD)->delete();
            Session::put('message','Xóa sản phẩm thành công');
            //tra ve
            return Redirect::to('admin-lietke-DonHang');
        }


        public function capnhatSL_donhang(Request $request){


             $data = $request->all();

            $order = hoadon::find($data['id_HD']);
            $order->TrangThaiHoaDon = $data['TrangThaiHoaDon'];
            $order->save();


            //
            if($order->TrangThaiHoaDon ==1 ){
                foreach ($data['order_idsp'] as $key => $id_SanPham) {
                    $sanpham = sanpham::find($id_SanPham);
                    $SoLuong_SP = $sanpham->SoLuong_SP;
                    $SoLuong_SPDaBan = $sanpham->SoLuong_SPDaBan;
                    foreach ($data['soluong'] as $key2 => $soluong) {
                        if($key == $key2){
                            $sl_conlai = $SoLuong_SP - $soluong;
                            $sanpham->SoLuong_SP = $sl_conlai;
                            $sanpham->SoLuong_SPDaBan = $SoLuong_SPDaBan + $soluong;
                            $sanpham->save();
                        }

                    }
                }

                // gui mail
                $title_mail="Phòng gym BodyFit Fitness";
                $khachhang= khachhang::where('id_KhachHang',$order->id_KhachHang)->first();
                $data['email'][]=$khachhang->Email;

                    $tenKH=$khachhang->TenKH;

                    $maHD=$order->id_HD;
                    $ngayDH=$order->Ngay;
                    $tongHD=$order->TongHoaDon;

                    foreach ($data['order_idsp'] as $key => $id_SanPham) {
                        $sanpham = sanpham::find($id_SanPham);

                        foreach ($data['soluong'] as $key2 => $soluong) {
                            if($key == $key2){
                                $cart_array[]=array(
                                    'TenSanPham'=>$sanpham['TenSanPham'],
                                    'Gia'=>$sanpham['Gia'],
                                    'SoLuongMua'=>$soluong

                                );
                            }

                        }
                    }

                     Mail::send('admin.Mail.GuiMail',compact('tenKH','maHD','ngayDH','tongHD','cart_array'), function($message) use ($title_mail,$data){
                                    $message->to($data['email'])->subject($title_mail);
                               //     $message->from($data['email'],$title_mail);
                                });


            }


            if($order->TrangThaiHoaDon ==2 ){

                // gui mail
                $title_mail="Phòng gym BodyFit Fitness";
                $khachhang= khachhang::where('id_KhachHang',$order->id_KhachHang)->first();
                $data['email'][]=$khachhang->Email;

                    $tenKH=$khachhang->TenKH;

                    $maHD=$order->id_HD;
                    $ngayDH=$order->Ngay;
                    $tongHD=$order->TongHoaDon;

                    foreach ($data['order_idsp'] as $key => $id_SanPham) {
                        $sanpham = sanpham::find($id_SanPham);

                        foreach ($data['soluong'] as $key2 => $soluong) {
                            if($key == $key2){
                                $cart_array[]=array(
                                    'TenSanPham'=>$sanpham['TenSanPham'],
                                    'Gia'=>$sanpham['Gia'],
                                    'SoLuongMua'=>$soluong

                                );
                            }

                        }
                    }

                     Mail::send('admin.Mail.MailXacNhan',compact('tenKH','maHD','ngayDH','tongHD','cart_array'), function($message) use ($title_mail,$data){
                                    $message->to($data['email'])->subject($title_mail);
                               //     $message->from($data['email'],$title_mail);
                                });

                }


        }


        public function capnhat_hoadon_DV(Request $request){


             $data = $request->all();

            $order = hoadon::find($data['id_HD']);
            $order->TrangThaiHoaDon = $data['TrangThaiHoaDon'];
            $order->save();

             // gui mail
            if($order->TrangThaiHoaDon ==1 ){
                $title_mail="Phòng gym BodyFit Fitness";
                $khachhang= khachhang::where('id_KhachHang',$order->id_KhachHang)->first();
                $data['email'][]=$khachhang->Email;

                    $tenKH=$khachhang->TenKH;

                    $maHD=$order->id_HD;
                    $ngayDH=$order->Ngay;
                    $tongHD=$order->TongHoaDon;


                $lichhen=lichhen::where('id_LichHen',$order->id_LichHen)->first();
                $ngaydk=$lichhen->NgayDK;
                $giodk= $lichhen->GioDK;
                $tenve= $order->TenVe;

                $nhanvien=nhanvien::where('id_NhanVien',$lichhen->id_NhanVien)->first();
                $tennv=$nhanvien->TenNV;


                Mail::send('admin.Mail.GuiMailDV',compact('tenKH','maHD','ngayDH','tongHD', 'ngaydk','giodk', 'tenve', 'tennv'), function($message) use ($title_mail,$data){
                                    $message->to($data['email'])->subject($title_mail);
                               //     $message->from($data['email'],$title_mail);
                                });
            }

        }

        public function timkiem(Request $request){

        $tu_timkiem = $request->tu_timkiem;

         $timkiem_SP = DB::table('hoadon')
                ->join('khachhang','khachhang.id_KhachHang','=','hoadon.id_KhachHang')
                ->where('TenKH','like','%'.$tu_timkiem.'%')->get();

        $quanli_lichhen = view('admin.HoaDon.timkiem_HoaDon')
            ->with('timkiem_SP',$timkiem_SP);
        return view('Admin_index')->with('admin.HoaDon.timkiem_HoaDon',$quanli_lichhen);

    }




}
