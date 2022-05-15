<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
Route::get('/sent-mail','App\Http\Controllers\HomeController@mail');


//


Route::get('/','App\Http\Controllers\HomeController@index');



// trang admin (backend)
Route::get('Admin','App\Http\Controllers\AdminController@index' );

// admin - dashboard
Route::get('/Dashboard','App\Http\Controllers\AdminController@showDashboard' );

//admin - login
Route::post('/admin-Dashboard','App\Http\Controllers\AdminController@login_AD' );

//admin - logout
Route::get('/admin-Logout','App\Http\Controllers\AdminController@logout_AD' );



// ADMIN - DANH MUC SAN PHAM

// admin_them Danh muc san pham
Route::get('/admin-them-DanhMucTB','App\Http\Controllers\DanhMucThietBi@them_DanhMucTB' );
Route::post('/luu_danhmucTB','App\Http\Controllers\DanhMucThietBi@luu_danhmucTB' );

// admin_ liet ke danh muc san pham
Route::get('/admin-lietke-DanhMucTB','App\Http\Controllers\DanhMucThietBi@lietke_DanhMucTB' );

// admin - sua danh muc san pham
Route::get('/admin-sua-DanhMucTB/{id_DanhMuc}','App\Http\Controllers\DanhMucThietBi@sua_danhmucTB' );

// admin - xoa danh muc san pham
Route::get('/admin-xoa-DanhMucTB/{id_DanhMuc}','App\Http\Controllers\DanhMucThietBi@xoa_danhmucTB' );

// admin - cap nhat danh muc san pham
Route::post('/admin-capnhat-danhmucTB/{id_DanhMuc}','App\Http\Controllers\DanhMucThietBi@capnhat_danhmucTB' );

// ADMIN SAN PHAM

// admin_them  san pham
Route::get('/admin-them-SanPham','App\Http\Controllers\SanPhamController@them_SanPham' );

// kiem tra dl nhap
Route::post('/luu_SanPham','App\Http\Controllers\SanPhamController@kiemtra_dulieuSanPham' );



Route::post('/luu_SanPham','App\Http\Controllers\SanPhamController@luu_SanPham' );

// admin - sua  san pham
Route::get('/admin-sua-SanPham/{id_SanPham}','App\Http\Controllers\SanPhamController@sua_SanPham' );

// admin - xoa  san pham
Route::get('/admin-xoa-SanPham/{id_DanhMuc}','App\Http\Controllers\SanPhamController@xoa_SanPham' );

// admin_ liet ke  san pham
Route::get('/admin-lietke-SanPham','App\Http\Controllers\SanPhamController@lietke_SanPham' );


// admin - cap nhat san pham
Route::post('/admin-capnhat-SanPham/{id_DanhMuc}','App\Http\Controllers\SanPhamController@capnhat_SanPham' );



// ADMIN DICH VU

// admin_them  dich vu
Route::get('/admin-them-DichVu','App\Http\Controllers\DichVuController@them_DichVu' );

// kiem tra dl nhap
//Route::post('/luu_DichVu','App\Http\Controllers\DichVuController@kiemtra_dulieuSanPham' );

// admin - xoa  dich vu
Route::get('/admin-xoa-DichVu/{id_NhanVien}','App\Http\Controllers\DichVuController@xoa_DichVu' );

Route::post('/luu_DichVu','App\Http\Controllers\DichVuController@luu_DichVu' );

// admin - sua  dich vu
Route::get('/admin-sua-DichVu/{id_DichVu}','App\Http\Controllers\DichVuController@sua_DichVu' );



// admin_ liet ke  dich vu
Route::get('/admin-lietke-DichVu','App\Http\Controllers\DichVuController@lietke_DichVu' );


// admin - cap nhat dich vu
Route::post('/admin-capnhat-DichVu/{id_NhanVien}','App\Http\Controllers\DichVuController@capnhat_DichVu' );



// ADMIN ĐON HANG

// Admin -liet ke don hang
Route::get('admin-lietke-DonHang','App\Http\Controllers\DatHangController@donHang' );

// admin - xem don hang
Route::get('admin-xem-DonHang/{id_HD}','App\Http\Controllers\DatHangController@xem_donHang' );

// admin - xoa  bai viet
Route::get('/admin-xoa-DonHang/{id_HD}','App\Http\Controllers\DatHangController@xoa_donHang' );

// admin - cap nhat so luong dat hang
Route::post('/admin-capnhat-soluong-DonHang','App\Http\Controllers\HoaDonController@capnhatSL_donhang' );


// ADMIN - DANH MUC BAI VIET

// admin_them Danh muc san pham
Route::get('/admin-them-DanhMucBaiViet','App\Http\Controllers\BaiVietController@them_DanhMucBaiViet' );
Route::post('/luu_danhmucBaiViet','App\Http\Controllers\BaiVietController@luu_danhmucBaiViet' );

// admin_ liet ke danh muc san pham
Route::get('/admin-lietke-DanhMucBaiViet','App\Http\Controllers\BaiVietController@lietke_DanhMucBaiViet' );

// admin - sua danh muc san pham
Route::get('/admin-sua-DanhMucBaiViet/{id_DanhMuc}','App\Http\Controllers\BaiVietController@sua_danhmucBaiViet' );

// admin - xoa danh muc san pham
Route::get('/admin-xoa-DanhMucBaiViet/{id_DanhMuc}','App\Http\Controllers\BaiVietController@xoa_danhmucBaiViet' );

// admin - cap nhat danh muc san pham
Route::post('/admin-capnhat-danhmucBaiViet/{id_DanhMucBaiViet}','App\Http\Controllers\BaiVietController@capnhat_danhmucBaiViet' );




// ADMIN BAI VIET

// admin - them bai viet
Route::get('/admin-them-BaiViet','App\Http\Controllers\BaiVietController@them_BaiViet' );
Route::post('/luu_BaiViet','App\Http\Controllers\BaiVietController@luu_BaiViet' );

// admin_ liet ke bai viet
Route::get('/admin-lietke-BaiViet','App\Http\Controllers\BaiVietController@lietke_BaiViet' );

// admin - sua  bai viet
Route::get('/admin-sua-BaiViet/{id_BaiViet}','App\Http\Controllers\BaiVietController@sua_BaiViet' );

// admin - xoa  bai viet
Route::get('/admin-xoa-BaiViet/{id_BaiViet}','App\Http\Controllers\BaiVietController@xoa_BaiViet' );

// admin - cap nhat bai viet
Route::post('/admin-capnhat-BaiViet/{id_BaiViet}','App\Http\Controllers\BaiVietController@capnhat_BaiViet' );


// ADMIN - HINH ANH SAN PHAM

// admin - them hinh anh san pham
Route::get('/admin-them-thuvienAnh/{id_SanPham}','App\Http\Controllers\HinhAnhSanPhamController@them_HinhAnh' );

// admin - liet ke thu vien anh
Route::post('/admin-lietke-ThuVienAnh','App\Http\Controllers\HinhAnhSanPhamController@lietke_HinhAnh' );

// admin - insert hinh anh
Route::post('/admin-them-anh/{id_SP}','App\Http\Controllers\HinhAnhSanPhamController@insert_HinhAnh' );

// admin - xóa hinh anh
Route::post('/admin-xoa-Anh','App\Http\Controllers\HinhAnhSanPhamController@xoa_HinhAnh' );




//QTV - liêt ke nhan vien
Route::get('/lietke-user','App\Http\Controllers\UsersController@index' );

// QTV - them nhan vien

Route::get('/admin-them-NhanVien','App\Http\Controllers\UsersController@them_NhanVien' );

Route::post('/luu_NhanVien','App\Http\Controllers\UsersController@luu_NhanVien' );

// QTV - XOA NHAN VIEN
 Route::get('/admin-xoa-NhanVien/{id_NhanVien}','App\Http\Controllers\UsersController@xoa_NhanVien');

// QTV - SUA NHAN VIEN
Route::get('/admin-sua-NhanVien/{id_NhanVien}','App\Http\Controllers\UsersController@sua_NhanVien' );
Route::post('/admin-capnhat-NhanVien/{id_NhanVien}','App\Http\Controllers\UsersController@capnhat_NhanVien' );

// THONG TIN TAI KHOAN
Route::get('/admin-tai-khoan-cua-toi','App\Http\Controllers\AdminController@show_taiKhoan' );

// CAP NHAT THONG TIN TAI KHOAN
Route::get('/admin-sua-taikhoan','App\Http\Controllers\AdminController@sua_taikhoan' );
Route::get('/admin-doi-mat-khau','App\Http\Controllers\AdminController@doimatkhau' );
Route::post('capnhat_MatKhau','App\Http\Controllers\AdminController@capnhat_MatKhau' );
// admin - cap nhat bai viet
Route::post('/admin-capnhat-TaiKhoanAD/{id_AD}','App\Http\Controllers\AdminController@capnhat_TaiKhoan' );


// admin - thong bao don hang
Route::get('/show-so-luong-don-hang','App\Http\Controllers\DatHangController@soluong_DH' );



/// ADMIN - Khach hang
Route::get('/admin-lietke-KhachHang','App\Http\Controllers\KhachHangController@lietke_KhachHang' );
Route::get('/admin-them-KhachHang','App\Http\Controllers\KhachHangController@them_KhachHang' );
Route::post('/luu_KhachHang','App\Http\Controllers\KhachHangController@luu_KhachHang' );



// admin - xoa  dich vu
Route::get('/admin-xoa-KhachHang/{id_KhachHang}','App\Http\Controllers\KhachHangController@xoa_KhachHang' );


//ADMIN - LIET KE HOA DON
Route::get('/admin-lietke-HoaDon','App\Http\Controllers\HoaDonController@lietke_HoaDon' );
Route::get('admin-xem-HoaDon/{id_HD}','App\Http\Controllers\HoaDonController@xem_HoaDon' );


// LỊCH HEN
Route::get('/admin-lietke-LichHen','App\Http\Controllers\LichHenController@lietke_LichHen' );
Route::get('/admin-them-LichHen','App\Http\Controllers\LichHenController@them_LichHen' );
Route::get('/admin-xoa-LichHen/{id_LichHen}','App\Http\Controllers\LichHenController@xoa_LichHen' );
Route::post('/luu_LichHen','App\Http\Controllers\LichHenController@luu_LichHen' );


// tim kiem
Route::post('/tim-kiem-hoa-don','App\Http\Controllers\HoaDonController@timkiem' );
Route::post('/tim-kiem-khach-hang','App\Http\Controllers\KhachHangController@timkiem' );
Route::post('/tim-kiem-nhan-vien','App\Http\Controllers\UsersController@timkiem' );
Route::post('/tim-kiem-san-pham','App\Http\Controllers\SanPhamController@timkiem' );



// admin - cap nhat so luong dat hang
Route::post('/admin-capnhat-DonHang-dichvu','App\Http\Controllers\HoaDonController@capnhat_hoadon_DV' );
