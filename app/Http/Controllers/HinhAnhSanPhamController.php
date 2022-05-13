<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;  //Redirect :tra ve

use App\Models\thuvienhinhanh;
use Auth;
session_start();
use Toastr;


class HinhAnhSanPhamController extends Controller
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

    public function them_HinhAnh($id_SanPham){
        $this->kiemtra_AD();     // kiem tra co dang nhap k
        $id_SP = $id_SanPham;
        // $danhmuc_SP=DB::table('danhmucsanpham')->orderby('id_DanhMuc','asc')->get();
         return view('admin.HinhAnhSanPham.them_ThuVienAnh')->with(compact('id_SP'));
    }

    public function lietke_HinhAnh(Request $request){

        $id_SanPham =  $request->id_SP;

        $hinhanh = thuvienhinhanh::where('id_SanPham',$id_SanPham)->get();

        $count_hinhanh = $hinhanh->count();

        $output = '
                        <table class="table table-bordered">
                                  <thead>
                                    <tr style="color: #4e73df; text-align: center">
                                      <th>STT</th>
                                      <th>Hình ảnh</th>
                                      <th>Quản lý</th>

                                    </tr>
                                  </thead>
                                   <tfoot>
                                         <tr style="color: #4e73df; text-align: center">
                                              <th>STT</th>
                                              <th>Hình ảnh</th>
                                              <th>Quản lý</th>

                                        </tr>
                                    </tfoot>
                                  <tbody>

        ';

        if($count_hinhanh>0){
            $i=0;
            foreach ($hinhanh as $key => $anh) {
                $i++;
                $output.= '
                    <tr style="text-align: center">
                                      <td>'.$i.'</td>
                                      <td><img src="'.url('/public/upload/thuvienanh/'.$anh->FileHinhAnh).'"
                                      class="img-thumbnail"  style="width: 100px;height: 100px;"></td>

                                      <td style="text-align: center;">
                                        <button   data-anh_id="'.$anh->id_HinhAnh.'" class="btn btn-xs btn-danger delete-anh">Xóa</button>

                                        </td>


                     </tr>

                ';
            }
        }

        else {

                $output.= '
                            <tr>
                                <td colspan="3" style="text-align:center ; color:black; font-size: 20px;">
                                    Sản phẩm này chưa có thư viện ảnh</td>


                            </tr>
                ';

            }

            $output.= '
                        </tbody>
                        </table>

                ';


         echo $output;

        // return view('admin.HinhAnhSanPham.lietke_ThuVienAnh')->with('hinhanh',$hinhanh);
    }


    // insert_HinhAnh

    public function insert_HinhAnh(Request $request,$id_SP){

        $get_image = $request->file('FileHinhAnh');
        if($get_image){
            foreach ($get_image as $key => $image) {
                 $lay_ten_hinhanh=$image->getClientOriginalName();
                $ten_hinhanh = current(explode('.', $lay_ten_hinhanh));
                $hinhanh = $ten_hinhanh.'.'.$image->getClientOriginalExtension();
                // getClientOriginalExtension(): lay duoi cua hinh anh

                $image->move('public/upload/thuvienanh',$hinhanh);
                $thuvienanh = new thuvienhinhanh();

                $thuvienanh->FileHinhAnh =$hinhanh;
                $thuvienanh->id_SanPham =$id_SP;
                $thuvienanh->save();

            }
        }

        Toastr::success('Thêm thư viện ảnh thành công', 'Success');
      //  Session::put('message','Thêm thư viện ảnh thành công');
        //tra ve
        return Redirect()->back();
    }


    // xoa hinh anh
    public function xoa_HinhAnh(Request $request){

        $anh_id = $request->anh_id;
        $tim_anh = thuvienhinhanh::find($anh_id);
        unlink('public/upload/thuvienanh/'.$tim_anh->FileHinhAnh);
        $tim_anh->delete();
        Toastr::success(' xóa ảnh thành công', 'Success');
     //    Session::put('message',' xóa ảnh thành công');
         return Redirect()->back();
    }
}
