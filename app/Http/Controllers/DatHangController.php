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
use App\Models\dathang;

session_start();
use Auth;
use Mail;

class DatHangController extends Controller
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

    public function donHang(){

         $this->kiemtra_AD();     // kiem tra co dang nhap k
        $lietke_DonHang = DB:: table('hoadon')
            ->join('khachhang','khachhang.id_KH','=','hoadon.id_KH')
            ->select('hoadon.*','khachhang.HoTenKH')     // bangr hoa don lay tat ca. bang khach hang chi lay ten khach hang
            ->orderby('id_HD','desc')->paginate(10);

        $quanli_donhang = view('admin.DonHang.quanLy_DonHang')->with('lietke_DonHang',$lietke_DonHang);
        return view('Admin_index')->with('admin.DonHang.quanLy_DonHang',$quanli_donhang);
    }

    // xem don hang
    public function xem_donHang($id_HD){
        $this->kiemtra_AD();     // kiem tra co dang nhap k
        $xem_DonHang = DB:: table('hoadon')

            ->join('khachhang','khachhang.id_KH','=','hoadon.id_KH')
            ->join('chitiethoadon','chitiethoadon.id_HD','=','hoadon.id_HD')

            ->join('sanpham','chitiethoadon.id_SanPham','=','sanpham.id_SanPham')

            ->where('hoadon.id_HD',$id_HD)->get();     // bangr hoa don lay tat ca. bang

        $xem1_DonHang = DB:: table('hoadon')
            ->join('dathang','dathang.id_DH','=','hoadon.id_DH')
             ->join('thanhtoan','thanhtoan.id_TT','=','hoadon.id_TT')
            ->where('hoadon.id_HD',$id_HD)->get();


            // echo "</pre>";
            // print_r($xem_DonHang);
            // echo "</pre>";

        $quanli_donhang_xem = view('admin.DonHang.xem_DonHang')->with('xem_DonHang',$xem_DonHang)->with('xem1_DonHang',$xem1_DonHang);
        return view('Admin_index')->with('admin.DonHang.xem_DonHang',$quanli_donhang_xem);


        }


        // xoa don hang

        public function xoa_donHang($id_HD){

             DB:: table ('hoadon')->where('id_HD',$id_HD)->delete();
            Session::put('message','Xóa sản phẩm thành công');
            //tra ve
            return Redirect::to('admin-lietke-DonHang');
        }


        public function capnhatSL_donhang(Request $request){
            // cap nhat trang thai hoa don

            $data = $request->all();

            $order = hoadon::find($data['id_HD']);
            $order->TrangThaiHoaDon = $data['TrangThaiHoaDon'];
            $order->save();

            //
            if($order->TrangThaiHoaDon ==2 ){
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
            $title_mail="Cửa hàng MarketOnline - Thông báo thời gian giao hàng";
            $khachhang= khachhang::where('id_KH',$order->id_KH)->first();
            $data['email'][]=$khachhang->Email_KH;

                $tenKH=$khachhang->HoTenKH;

                $maHD=$order->id_HD;
                $ngayDH=$order->Ngay_DH;
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
                $dathang=dathang::where('id_DH',$order->id_DH)->first();
                $tenDH=$dathang->TenDatHang;
                $sdt=$dathang->SoDienThoai_DH;
                $diachi=$dathang->DiaChi_DH;

                 Mail::send('admin.Mail.GuiMail',compact('tenKH','maHD','ngayDH','tongHD','cart_array','tenDH','sdt','diachi'), function($message) use ($title_mail,$data){
                                $message->to($data['email'])->subject($title_mail);
                           //     $message->from($data['email'],$title_mail);
                            });


            }


            if($order->TrangThaiHoaDon ==4 ){

                // gui mail
            $title_mail="Cửa hàng MarketOnline - Xác nhận có hàng";
            $khachhang= khachhang::where('id_KH',$order->id_KH)->first();
            $data['email'][]=$khachhang->Email_KH;

                $tenKH=$khachhang->HoTenKH;

                $maHD=$order->id_HD;
                $ngayDH=$order->Ngay_DH;
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
                $dathang=dathang::where('id_DH',$order->id_DH)->first();
                $tenDH=$dathang->TenDatHang;
                $sdt=$dathang->SoDienThoai_DH;
                $diachi=$dathang->DiaChi_DH;

                 Mail::send('admin.Mail.MailXacNhan',compact('tenKH','maHD','ngayDH','tongHD','cart_array','tenDH','sdt','diachi'), function($message) use ($title_mail,$data){
                                $message->to($data['email'])->subject($title_mail);
                           //     $message->from($data['email'],$title_mail);
                            });


       //     }


}

            // else if($order->TrangThaiHoaDon ==3 ){
            //     foreach ($data['order_idsp'] as $key => $id_SanPham) {
            //         $sanpham = sanpham::find($id_SanPham);
            //         $SoLuong_SP = $sanpham->SoLuong_SP;
            //         $SoLuong_SPDaBan = $sanpham->SoLuong_SPDaBan;
            //         foreach ($data['soluong'] as $key2 => $soluong) {
            //             if($key == $key2){
            //                 $sl_conlai = $SoLuong_SP + $soluong;
            //                 $sanpham->SoLuong_SP = $sl_conlai;
            //                 $sanpham->SoLuong_SPDaBan = $SoLuong_SPDaBan - $soluong;
            //                 $sanpham->save();
            //             }

            //         }
            //     }
            // }


        }


        // khach hang - danh sach don hang

        public function show_dsDonHang(Request $request){
            $danhmuc_SP=DB::table('danhmucsanpham')->orderby('id_DanhMuc','asc')->get();
        // danh muc bai viet
         $danhmuc_BaiViet=DB::table('danhmucbaiviet')->orderby('id_DanhMucBaiViet','asc')->get();

         $id_kh = DB::table('hoadon')->where('id_KH',Session::get('id_KH'))->orderby('id_HD','desc')->get();

         return view('page.DonHang.show_DonHang')->with('danhmuc_SP',$danhmuc_SP)
         ->with('danhmuc_BaiViet',$danhmuc_BaiViet)->with(compact('id_kh'));
        }


        public function show_chitietDonHang($id_HD){

            $danhmuc_SP=DB::table('danhmucsanpham')->orderby('id_DanhMuc','asc')->get();
        // danh muc bai viet
         $danhmuc_BaiViet=DB::table('danhmucbaiviet')->orderby('id_DanhMucBaiViet','asc')->get();

         $show_chitietDH = DB:: table('hoadon')
            ->join('chitiethoadon','chitiethoadon.id_HD','=','hoadon.id_HD')
            ->join('dathang','dathang.id_DH','=','hoadon.id_DH')
           ->where('hoadon.id_HD',$id_HD)->get();

        $show_DH = DB:: table('hoadon')
            ->join('dathang','dathang.id_DH','=','hoadon.id_DH')
            ->where('hoadon.id_HD',$id_HD)->get();

        $show_chiphi = DB:: table('hoadon')
            ->join('thanhtoan','thanhtoan.id_TT','=','hoadon.id_TT')
            ->where('hoadon.id_HD',$id_HD)->get();

         return view('page.DonHang.show_chitietDonHang')->with('danhmuc_SP',$danhmuc_SP)
         ->with('danhmuc_BaiViet',$danhmuc_BaiViet)->with('show_chitietDH',$show_chitietDH)->with('show_DH',$show_DH)
         ->with('show_chiphi',$show_chiphi);
        }


        public function show_dsDonHangChoXN(){
            $danhmuc_SP=DB::table('danhmucsanpham')->orderby('id_DanhMuc','asc')->get();
        // danh muc bai viet
         $danhmuc_BaiViet=DB::table('danhmucbaiviet')->orderby('id_DanhMucBaiViet','asc')->get();

        $id_kh = DB::table('hoadon')->where('id_KH',Session::get('id_KH'))->where('TrangThaiHoaDon',1)->orderby('id_HD','desc')->get();

         return view('page.DonHang.show_choXacNhan')->with('danhmuc_SP',$danhmuc_SP)
         ->with('danhmuc_BaiViet',$danhmuc_BaiViet)->with(compact('id_kh'));
        }


        public function show_DangGiao(){
            $danhmuc_SP=DB::table('danhmucsanpham')->orderby('id_DanhMuc','asc')->get();
        // danh muc bai viet
         $danhmuc_BaiViet=DB::table('danhmucbaiviet')->orderby('id_DanhMucBaiViet','asc')->get();

        $id_kh = DB::table('hoadon')->where('id_KH',Session::get('id_KH'))->where('TrangThaiHoaDon',2)->orderby('id_HD','desc')->get();

         return view('page.DonHang.show_dangGiao')->with('danhmuc_SP',$danhmuc_SP)
         ->with('danhmuc_BaiViet',$danhmuc_BaiViet)->with(compact('id_kh'));
        }


         public function show_dsDonHangDaXN(){
            $danhmuc_SP=DB::table('danhmucsanpham')->orderby('id_DanhMuc','asc')->get();
        // danh muc bai viet
         $danhmuc_BaiViet=DB::table('danhmucbaiviet')->orderby('id_DanhMucBaiViet','asc')->get();

        $id_kh = DB::table('hoadon')->where('id_KH',Session::get('id_KH'))->where('TrangThaiHoaDon',4)->orderby('id_HD','desc')->get();

         return view('page.DonHang.show_daXacNhan')->with('danhmuc_SP',$danhmuc_SP)
         ->with('danhmuc_BaiViet',$danhmuc_BaiViet)->with(compact('id_kh'));
        }


         public function show_dsDonHangDaHuy(){
            $danhmuc_SP=DB::table('danhmucsanpham')->orderby('id_DanhMuc','asc')->get();
        // danh muc bai viet
         $danhmuc_BaiViet=DB::table('danhmucbaiviet')->orderby('id_DanhMucBaiViet','asc')->get();

        $id_kh = DB::table('hoadon')->where('id_KH',Session::get('id_KH'))->where('TrangThaiHoaDon',3 )
            ->orderby('id_HD','desc')->get();

         return view('page.DonHang.show_daHuy')->with('danhmuc_SP',$danhmuc_SP)
         ->with('danhmuc_BaiViet',$danhmuc_BaiViet)->with(compact('id_kh'));
        }


        public function HuyDonHang(Request $request){
            $data=$request->all();
            $hoadon = hoadon::where('id_HD',$data['id_HD'])->first();
            $hoadon->LyDoHuyDon=$data['LyDoHuyDon'];
            $hoadon->TrangThaiHoaDon=3;
            $hoadon->save();

        }

        public function soluong_DH(){
            $output='';
            $output.='
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>

                     ';
            echo $output;
        }
}
