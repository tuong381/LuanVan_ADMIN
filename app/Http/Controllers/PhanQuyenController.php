<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;  //Redirect :tra ve
session_start();

use App\Models\admin;
use App\Models\roles;

use Auth;


class PhanQuyenController extends Controller
{
    //
    public function dangkyTK(){
        return view('admin.Roles.dangky');
    }

    public function dangky(Request $request){

        $this->validation($request);
        $data = $request->all();

        $admin = new admin();
        $admin->HoTenAD = $data['HoTenAD'];
        $admin->Email = $data['Email'];
        $admin->DiaChi = $data['DiaChi'];
        $admin->SoDT = $data['SoDT'];
        $admin->MatKhau = md5($data['MatKhau']);

        $admin->save();

        return Redirect('/admin-dang-ky-tai-khoan')->with('message','Đăng ký thành công');

    }

    // ham kiem tra nhap vao
    public function validation($request){

        return $this->validate($request,['HoTenAD' => 'required|max:255',
                                        'Email' => 'required|email|min:1',
                                        'SoDT' => 'required|min:1',
                                        'DiaChi' => 'required|min:1',
                                        'MatKhau' => 'required|min:1',

                             ]);
    }

    public function login_QTV(){
        return view('admin.Roles.login_QTV');
    }

    public function login(Request $request){
        // $this->validate($request,['Email' => 'required|email',
        //                           'MatKhau' => 'required',

        //                      ]);

        // $data = $request->all();
        // if(Auth::attempt(['Email'=>$request->Email , 'MatKhau'=>$request->MatKhau ])){

        // }

        $Email = $request->Email;
        $MatKhau = md5($request->MatKhau);



        if(Auth::attempt([
            'Email'=>$Email ,
            'MatKhau'=>$MatKhau])){

            // echo Auth::attempt([
            // 'Email'=>$Email ,
            // 'MatKhau'=>$MatKhau]);
            return Redirect::to('/Dashboard');

         }else{
            return Redirect::to('/admin-login-QTV')->with('message','loi dang nhap');
         }


    }


    // public function logout_QTV(){
    //     Auth::logout();
    //     return Redirect::to('/admin-login-QTV')->with('message','dang xuat thanh cong');
    // }


}
