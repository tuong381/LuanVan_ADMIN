
@extends('welcome')
@section('content')


<div class="page-title-breadcrumbs">
    <div class="breadcrumbs-container container">
        <div class="breadcrumbs_wrapper">
            <div class="page-title-container">
                <h1 class="text-center">Market Online</h1>
            </div>
            <div class="breadcrumbs-container text-center">
                <ul class="breadcrumbs primary-font">
                    <li><a href="{{URL::to('/trang-chu')}}"><span style="font-family: 'FontAwesome';">Trang chủ</span></a>
                    </li>
                    <li class="breadcrumb-sep">/</li>
                    <li><span style="font-family: 'FontAwesome';">Giỏ hàng của bạn</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="product-cart">
    <div class="all">
        <div class="cart-wrapper">
            <div class="container">
                <div class="cart-section">
                    <div class="cart-form">


                            <div class="table-responsive">

                                <?php $content= Cart::content(); ?>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="product" colspan="2">Sản phẩm</th>
                                            <th class="price">Giá</th>
                                            <th class="qty">Số lượng</th>
                                            <th class="total">Tổng tiền</th>
                                            <th class="remove">Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>




                                        @foreach($content as $giohang)
                                        <tr>
                                            <td class="image">
                                                <div class="product-image">
                                                    <img src="{{URL::to('public/upload/sanpham/'.$giohang->options->image)}}" alt="Bacon Smoked">

                                                </div>
                                            </td>
                                            <td class="image-info">
                                                <div class="product-name"><span class="title-black">{{$giohang->name}}</span>
                                                </div>
                                            </td>
                                            <td class="price"><span class="money">{{number_format($giohang->price)}} vnđ</span>
                                            </td>
                                            <td class="qty" style="width: 250px; ">

                                                <div class="quantity-wrapper clearfix" style="margin: 20px">
                                                    <div class="wrapper d-flex">

                                                        <div class="item-quantity">
                                                             <form action="{{URL::to('/cap-nhat-gio-hang')}}" method="POST">

                                                                {{csrf_field()}}

                                                             <input type="number" min="1" max="20"
                                                             name="cart_quantity" value="{{$giohang->qty}}" style="width: 50px; background-color: #f9f9f9; height: 39px;text-align: center;color: #666; border:0px solid #ddd;">

                                                             <input type="hidden" value="{{ $giohang->rowId}}" name="rowId_cart" class="form-control" >

                                                             <input type="submit" value="Cập nhật" name="capnhat_SL" class="btn btn-default btn-sm"
                                                             style="height: 39px; border: 0; background: #91ad41;font-weight: 500; color: white;"  >

                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>

                                            </td>
                                            <td class="total title-1"><span class="money">
                                                    <?php
                                                        $subtotal = $giohang->price * $giohang->qty;
                                                        echo number_format($subtotal).' '.'vnđ';
                                                    ?>
                                                     </span>
                                            </td>
                                            <td class="remove"><a onclick="return confirm('Bạn có muốn xóa sản phẩm này không?')" href="{{URL::to('/xoa-gio-hang/'.$giohang->rowId)}}" class="cart"><span class="cs-icon icon-close"></span></a>
                                            </td>

                                         @endforeach

                                       {{--   @endif --}}

                                        <tr class="cart-actions">
                                            <td colspan="3" class="back-to-shop text-left"><span><a href="{{URL::to('/cua-hang')}}" class="btn view button-main"><i class="flaticon-arrows"></i>Trở về cửa hàng</a></span>
                                            </td>

                                             <td colspan="3" class="cart-process text-right"><a
                                            onclick="return confirm('Bạn có muốn xóa tất cả giỏ hàng không?')" class="gsf-link clear-cart btn view button-main" href="{{URL::to('/xoa-tat-ca-gio-hang')}}"><i class="cs-icon icon-close"></i><span>Xóa tất cả</span></a>
                                                </td>

                                        </tr>

                                        {{--   @endforeach --}}

                                         {{--  @else

                                           <tr>
                                               <td>fngfh</td>
                                           </tr>

                                         @endif --}}


                                    </tbody>
                                </table>



                            </div>
                            <div class="row">

                                <div class="col-lg-7 col-md-12 cart-collaterals mg-top-50">
                                    <div class="layout-cart-right">
                                        <div class="cart-totals clearfix">
                                            <div>
                                                <h4 class="woocommerce-block-title mg-top-0">Tổng số lượng</h4>
                                                <table class="shop-table">
                                                    <tbody>
                                                        <tr class="cart-subtotal">
                                                            <th>Tổng tiền</th>
                                                            <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>{{Cart::subtotal(0).' '.'vnđ'}} </span>
                                                            </td>
                                                        </tr>
                                                        <tr class="cart-subtotal cart-item">
                                                            <th>Phí vận chuyển</th>
                                                            <td data-title="Subtotal">
                                                                <div class="check-box">
                                                                    <label class="check">
                                                                        <input type="checkbox" checked><span class="checkmark"></span>
                                                                    </label><a href="#"><span>Free ship</span></a>
                                                                </div>


                                                            </td>
                                                        </tr>

                                                        <tr class="order-total">
                                                            <th>Tổng thanh toán</th>
                                                            <td data-title="Total"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span> {{Cart::subtotal(0).' '.'vnđ'}}</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                {{-- <div class="to-checkout"><a href="{{URL::to('/login')}}" class="checkout-button  btn view button-main">Đặt hàng</a>
                                                </div> --}}

                                                <?php
                                                        $id_KH = Session::get('id_KH');
                                                        if($id_KH != NULL){


                                                        ?>
                                                         <div class="to-checkout"><a href="{{URL::to('/kiem-tra-san-pham')}}" class="checkout-button  btn view button-main">Tiến hành thanh toán</a>
                                                        </div>



                                                        <?php
                                                        }else{
                                                        ?>

                                                        <div class="to-checkout"><a href="{{URL::to('/login')}}" class="checkout-button  btn view button-main">Tiến hành thanh toán</a>
                                                        </div>

                                                        <?php
                                                        }
                                                        ?>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
