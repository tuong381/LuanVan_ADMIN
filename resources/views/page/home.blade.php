
@extends('welcome')
@section('content')



<div class="section tiva-slideshow-wrapper">
    <div id="tiva-slideshow" class="nivoSlider">
        <a href="#" title="Slideshow image"><img class="img-fluid" src="{{asset('public/frontend/img/slideshow/banner.jpg')}}" title="#caption1" alt="Slideshow image" >
        </a>
        <a href="#" title="Slideshow image"><img class="img-fluid" src="{{asset('public/frontend/img/slideshow/banner1.jpg')}}" title="#caption2" alt="Slideshow image">
        </a>
    </div>
     <div id="caption1" class="nivo-html-caption hidden-sm hidden-xs d-none col-lg-block">
        <div class="tiva-caption m-left">
            <div class="left-right hidden-xs"><span class="font-stre ">Cửa hàng của chúng tôi</span>
            </div> -
            <div class="right-left hidden-xs normal very_large_60">
                <h3 style="color: white;">Market Online</h3>
                <p style="color: white">Chuyên cung cấp thực phẩm tươi ngon, an toàn, chất lượng uy tính, giá cả hợp lý.</p>
            </div>
            <div class="Praesent"></div>
            {{--
            <div class="right-left hidden-xs slow disciver-now"><a class="btn button btn-green button-main" href="blog-list-right-sidebar.html" title="Shop now">learn more</a>
            </div> --}}
            <div class="right-left hidden-xs slow disciver-now"><a class="btn button button-main" href="blog-list-right-sidebar.html" title="Shop now">Mua ngay</a>
            </div>
        </div>
    </div>

</div>




<section>
    <div class="section about">
        <div class="container">
            <div class="title text-center">
                <div class="page-title color">
                    <h3 class="title-main">Market Online</h3>
                    <div class="title title-icon">
                        <h2 class="title-h2">Danh mục sản phẩm</h2>
                        <br>
                    </div>
                </div>
            </div>


            <div class="section wrap-product-categories">
                {{-- <div class="container"> --}}
                    <div class="row">
                     @foreach($danhmuc_SP as $key=>$danhmuc)

                        <div class="col-lg-4 col-md-6 col-sm-12 m-bottom-30">
                            <div class="banner-content-inner"><img src="{{URL::to('public/upload/danhmucsanpham/'.$danhmuc->HinhAnh_DanhMuc)}}" alt="img" class="w-100" style="height: 15rem;">
                                <div class="group-caption">
                                    <p class="categories-title"><a href="{{URL::to('danh-muc-san-pham/'.$danhmuc->id_DanhMuc)}}">{{$danhmuc->TenDanhMuc}}</a>
                                    </p>
                                  {{--   <p class="categories-caption">{{count($danhmuc_SP)}}</p> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
             </div>


        </div>
    </div>
</section>


<section>
    <div class="section feature-products">
        <div class="container">
            <div class="title text-center m-bottom-2">
                <div class="page-title color">
                    <h3 class="title-main">Market Online</h3>
                    <div class="title title-icon">
                        <h2 class="title-h2">Sản phẩm mới nhất</h2>
                    </div>
                </div>
            </div>
            <div class="product-tab">

                <div class="tab-content m-top">
                    <!-- All -->
                    <div id="all" class="tab-pane active">
                        <div class="product">
                            <div class="row">
                                @foreach($sanpham as $key=>$sp)
                               {{--  <a href="{{URL::to('chi-tiet-san-pham/'.$sp->id_SanPham)}}"> --}}

                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart">

                                    <form action="{{URL::to('/them-gio-hang')}}" method="POST">

                                         {{csrf_field()}}
                                         <input  type="hidden" name="idSP_hidden" value="{{$sp->id_SanPham}}">
                                          <input type="hidden" name="soluong" value="1">


                                        <div class="product-thumb">

                                            <div class="product-container item-img"><a href="{{URL::to('chi-tiet-san-pham/'.$sp->id_SanPham)}}">
                                                <div class="product-img-link"  title=""><img class="img-fluid" src="{{URL::to('public/upload/sanpham/'.$sp->HinhAnh)}}" alt="img" style="height: 200px">
                                                </div></a>
                                            </div>


                                            <div class="product-cart-icon d-flex justify-content-around" style="width: 140px; background-color: #91ad41;">

                                                 <button type="Submit"  class="btn btn-default add-to-cart" style="background-color: #91ad41; color: white; border: none; padding: .25rem .60rem;" name="them-gio-hang" >Thêm vào giỏ</button>

                                             </div>


                                        </div>

                                        <div class="product-label">
                                            <span class="product-flash">Hot</span>

                                        </div>
                                        <div class="product-info text-center" style="height: 6rem">
                                            <h4 class="product-name"><a href="{{URL::to('chi-tiet-san-pham/'.$sp->id_SanPham)}}">
                                                            {{$sp->TenSanPham}}</a></h4>
                                            <div class="price"><span>{{number_format($sp->Gia)}}  vnđ</span>
                                            </div>
                                        </div>

                                    </form>

                                    </div>
                                </div>


                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Smoothie -->
                    <div id="smoothie" class="tab-pane fade">
                        <div class="product">
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-12.jpg" alt="img"><img class="img-fluid img-hover" src="img/products/product-13.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span><span class="product-flash sale">Sale</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a href="product-detail.html">Fresh
                                                                Tomatoes</a></h4>
                                            <div class="price"><span>$23.00</span><del>$25.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-14.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a href="product-detail.html">Fresh Ly
                                                                Son Garlic</a></h4>
                                            <div class="price"><span>$21.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-15.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a href="product-detail.html">Organic
                                                                Mushroom</a></h4>
                                            <div class="price"><span>$41.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-16.jpg" alt="img"><img class="img-fluid img-hover" src="img/products/product-17.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a
                                                                href="product-detail.html">Pomegranate Juice</a></h4>
                                            <div class="price"><span>$16.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart m-bottom-0">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-18.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a href="product-detail.html">Purple
                                                                Cabbage</a></h4>
                                            <div class="price"><span>$18.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart m-bottom-0">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-19.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a
                                                                href="product-detail.html">Aubergine</a></h4>
                                            <div class="price"><span>$22.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart m-bottom-0">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-20.jpg" alt="img"><img class="img-fluid img-hover" src="img/products/product-21.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span><span class="product-flash sale">Sale</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a href="product-detail.html">Banana
                                                                Blossoms</a></h4>
                                            <div class="price"><span>$21.00</span><del>$25.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart m-bottom-0">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-22.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span><span class="product-flash sale">Sale</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a href="product-detail.html">Green
                                                                Detox Drink</a></h4>
                                            <div class="price"><span>$23.00</span><del>$25.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Juices -->
                    <div id="juices" class="tab-pane fade">
                        <div class="product">
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-17.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span><span class="product-flash sale">Sale</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a href="product-detail.html">Fresh
                                                                Tomatoes</a></h4>
                                            <div class="price"><span>$23.00</span><del>$25.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-18.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a href="product-detail.html">Fresh Ly
                                                                Son Garlic</a></h4>
                                            <div class="price"><span>$21.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-19.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a href="product-detail.html">Organic
                                                                Mushroom</a></h4>
                                            <div class="price"><span>$41.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-20.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a
                                                                href="product-detail.html">Pomegranate Juice</a></h4>
                                            <div class="price"><span>$16.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart m-bottom-0">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-21.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash sale">Sale</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a href="product-detail.html">Purple
                                                                Cabbage</a></h4>
                                            <div class="price"><span>$18.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart m-bottom-0">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-22.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a
                                                                href="product-detail.html">Aubergine</a></h4>
                                            <div class="price"><span>$22.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart m-bottom-0">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-3.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span><span class="product-flash sale">Sale</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a href="product-detail.html">Banana
                                                                Blossoms</a></h4>
                                            <div class="price"><span>$21.00</span><del>$25.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart m-bottom-0">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-14.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span><span class="product-flash sale">Sale</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a href="product-detail.html">Green
                                                                Detox Drink</a></h4>
                                            <div class="price"><span>$23.00</span><del>$25.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Vegetables -->
                    <div id="vegetables" class="tab-pane fade">
                        <div class="product">
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-6.jpg" alt="img"><img class="img-fluid img-hover" src="img/products/product-7.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span><span class="product-flash sale">Sale</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a href="product-detail.html">Fresh
                                                                Tomatoes</a></h4>
                                            <div class="price"><span>$23.00</span><del>$25.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-8.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a href="product-detail.html">Fresh Ly
                                                                Son Garlic</a></h4>
                                            <div class="price"><span>$21.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-9.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a href="product-detail.html">Organic
                                                                Mushroom</a></h4>
                                            <div class="price"><span>$41.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-10.jpg" alt="img"><img class="img-fluid img-hover" src="img/products/product-11.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a
                                                                href="product-detail.html">Pomegranate Juice</a></h4>
                                            <div class="price"><span>$16.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart m-bottom-0">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-12.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a href="product-detail.html">Purple
                                                                Cabbage</a></h4>
                                            <div class="price"><span>$18.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart m-bottom-0">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-13.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a
                                                                href="product-detail.html">Aubergine</a></h4>
                                            <div class="price"><span>$22.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart m-bottom-0">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-14.jpg" alt="img"><img class="img-fluid img-hover" src="img/products/product-15.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span><span class="product-flash sale">Sale</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a href="product-detail.html">Banana
                                                                Blossoms</a></h4>
                                            <div class="price"><span>$21.00</span><del>$25.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart m-bottom-0">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-16.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span><span class="product-flash sale">Sale</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a href="product-detail.html">Green
                                                                Detox Drink</a></h4>
                                            <div class="price"><span>$23.00</span><del>$25.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tea -->
                    <div id="tea" class="tab-pane fade">
                        <div class="product">
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-17.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span><span class="product-flash sale">Sale</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a href="product-detail.html">Fresh
                                                                Tomatoes</a></h4>
                                            <div class="price"><span>$23.00</span><del>$25.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-18.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a href="product-detail.html">Fresh Ly
                                                                Son Garlic</a></h4>
                                            <div class="price"><span>$21.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-19.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a href="product-detail.html">Organic
                                                                Mushroom</a></h4>
                                            <div class="price"><span>$41.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-20.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a
                                                                href="product-detail.html">Pomegranate Juice</a></h4>
                                            <div class="price"><span>$16.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart m-bottom-0">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-21.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash sale">Sale</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a href="product-detail.html">Purple
                                                                Cabbage</a></h4>
                                            <div class="price"><span>$18.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart m-bottom-0">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-22.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a
                                                                href="product-detail.html">Aubergine</a></h4>
                                            <div class="price"><span>$22.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart m-bottom-0">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-3.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span><span class="product-flash sale">Sale</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a href="product-detail.html">Banana
                                                                Blossoms</a></h4>
                                            <div class="price"><span>$21.00</span><del>$25.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart m-bottom-0">
                                        <div class="product-thumb">
                                            <div class="product-container item-img">
                                                <div class="product-image-container">
                                                    <a class="product-img-link" href="product-detail.html" title=""><img class="img-fluid" src="img/products/product-14.jpg" alt="img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-cart-icon d-flex justify-content-around">
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-cs-cart"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-search"></i></a>
                                                </div>
                                                <div class="product-actions"><a href="#"><i
                                                                        class="cs-icon icon-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-label"><span class="product-flash">Hot</span><span class="product-flash sale">Sale</span>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-name"><a href="product-detail.html">Green
                                                                Detox Drink</a></h4>
                                            <div class="price"><span>$23.00</span><del>$25.00</del>
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
</section>



{{-- <section>
    <div class="section testimonials">
        <div class="container">
            <div class="title text-center">
                <div class="page-title color">
                    <h3 class="title-main">Testimonials</h3>
                    <div class="title title-icon">
                        <h2 class="title-h2">What Our Customer Saying?</h2>
                        <p class="description">Cras mattis consectetur purus sit amet fermentum. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
                    </div>
                </div>
            </div>
            <div class="row m-top">
                <div class="col-sm-6">
                    <div class="item clearfix d-flex align-items-center">
                        <div class="item-img hover-change"><img class="w-100" src="img/testimonial1.jpg" alt="img">
                        </div>
                        <div class="item-content">
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                            <div class="user-info">
                                <h4 class="user-name title-black"> Michael Walker</h4><span class="job">Social Marketing</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="item clearfix d-flex align-items-center">
                        <div class="item-img hover-change"><img class="w-100" src="img/testimonial2.jpg" alt="img">
                        </div>
                        <div class="item-content">
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                            <div class="user-info">
                                <h4 class="user-name title-black"> Michael Walker</h4><span class="job">Social Marketing</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 ">
                    <div class="item clearfix d-flex align-items-center">
                        <div class="item-img hover-change"><img class="w-100" src="img/testimonial3.jpg" alt="img">
                        </div>
                        <div class="item-content">
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                            <div class="user-info">
                                <h4 class="user-name title-black"> Michael Walker</h4><span class="job">Social Marketing</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="item clearfix d-flex align-items-center">
                        <div class="item-img hover-change"><img class="w-100" src="img/testimonial4.jpg" alt="img">
                        </div>
                        <div class="item-content">
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                            <div class="user-info">
                                <h4 class="user-name title-black"> Michael Walker</h4><span class="job">Social Marketing</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="home-brand-logo m-top">
            <div class="container">
                <div class="home-brand-inner">
                    <div class="home-brand-content owl-carousel owl-theme">
                        <div class="brand-item brand-item-two fadeInUp animated" data-animate="fadeInUp" data-delay="100">
                            <a href="#"><img class="img-fluid" src="img/partner1.png" alt="img"><img class="logo-hover img-fluid" src="img/partner1-active.png" alt="img">
                            </a>
                        </div>
                        <div class="brand-item brand-item-two fadeInUp animated" data-animate="fadeInUp" data-delay="200">
                            <a href="#"><img class="img-fluid" src="img/partner2.png" alt="img"><img class="img-fluid logo-hover" src="img/partner2-active.png" alt="img">
                            </a>
                        </div>
                        <div class="brand-item brand-item-two fadeInUp animated" data-animate="fadeInUp" data-delay="300">
                            <a href="#"><img class="img-fluid" src="img/partner3.png" alt="img"><img class="img-fluid logo-hover" src="img/partner3-active.png" alt="img">
                            </a>
                        </div>
                        <div class="brand-item brand-item-two fadeInUp animated" data-animate="fadeInUp" data-delay="400">
                            <a href="#"><img class="img-fluid" src="img/partner4.png" alt="img"><img class="img-fluid logo-hover" src="img/partner4-active.png" alt="img">
                            </a>
                        </div>
                        <div class="brand-item brand-item-two fadeInUp animated" data-animate="fadeInUp" data-delay="500">
                            <a href="#"><img class="img-fluid" src="img/partner5.png" alt="img"><img class="img-fluid logo-hover" src="img/partner5-active.png" alt="img">
                            </a>
                        </div>
                        <div class="brand-item brand-item-two fadeInUp animated" data-animate="fadeInUp" data-delay="600">
                            <a href="#"><img class="img-fluid" src="img/partner6.png" alt="img"><img class="img-fluid logo-hover" src="img/partner6-active.png" alt="img">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="section blog-news">
        <div class="container">
            <div class="title text-center">
                <div class="page-title color">
                    <h3 class="title-main">Our Blog News</h3>
                    <div class="title title-icon">
                        <h2 class="title-h2">Latest News From Blog</h2>
                        <p class="description">Cras mattis consectetur purus sit amet fermentum. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
                    </div>
                </div>
            </div>
            <div class="block-content m-top">
                <div class="row">
                    <div class="col-md-4">
                        <div class="product-container gallery-wrap">
                            <div class="left-block item-img">
                                <div class="product-image-container ">
                                    <a class="product-img-link" href="blog-detail.html" title=""><img src="img/blog/blog1.png" alt="img" class="w-100 image-effect">
                                    </a>
                                </div>
                                <div class="gallery-action" data-toggle="modal" data-target="#myModal"><i class="fa fa-picture-o"></i>
                                </div>
                            </div>
                            <div class="right-block">
                                <div class="product-box text-center">
                                    <div class="meta-cat"><span><a
                                                            href="blog-category-grid-sidebar.html">Smoothie</a></span>
                                    </div>
                                    <h4 class="name-blog"><a href="blog-detail.html"
                                                        class="title-black">Broad bean and goats’ cheese</a></h4>
                                    <ul class="article-info">
                                        <li><a href="#">July 24, 2017</a>
                                        </li>
                                        <li><a href="#">0 Comments</a>
                                        </li>
                                        <li><a href="#">Share</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="modal fadeIn zoomIn animated" id="myModal" data-animate="zoomIn" data-delay="50">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="close text-center" data-dismiss="modal"><i class="float-right" aria-hidden="true">×</i>
                                        </div>
                                        <div class="modal-body fadeInDownBig"><img src="img/blog/blog1.png" alt="" class="w-100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="product-container gallery-wrap">
                            <div class="left-block item-img">
                                <div class="product-image-container">
                                    <a class="product-img-link" href="blog-detail.html" title=""><img src="img/blog/blog2.png" alt="img" class="w-100 image-effect">
                                    </a>
                                </div>
                                <div class="gallery-action" data-toggle="modal" data-target="#myModal1"><i class="fa fa-picture-o"></i>
                                </div>
                            </div>
                            <div class="right-block">
                                <div class="product-box text-center">
                                    <div class="meta-cat"><span><a
                                                            href="blog-category-grid-sidebar.html">Smoothie</a></span>
                                    </div>
                                    <h4 class="name-blog"><a href="blog-detail.html"
                                                        class="title-black">Tomato: Nature’s Sweet Summer Treat</a></h4>
                                    <ul class="article-info">
                                        <li><a href="#">July 24, 2017</a>
                                        </li>
                                        <li><a href="#">0 Comments</a>
                                        </li>
                                        <li><a href="#">Share</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="modal fadeIn zoomIn animated" id="myModal1" data-animate="zoomIn" data-delay="50">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="close text-center" data-dismiss="modal"><i class="float-right" aria-hidden="true">×</i>
                                        </div>
                                        <div class="modal-body fadeInDownBig"><img src="img/blog/blog2.png" alt="" class="w-100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="blog-carousel owl-carousel navigation">
                            <div class="item">
                                <div class="product-container">
                                    <div class="left-block item-img">
                                        <div class="product-image-container">
                                            <a class="product-img-link" href="blog-detail.html" title=""><img src="img/blog/blog3.png" alt="img" class="w-100 image-effect">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="right-block">
                                        <div class="product-box text-center">
                                            <div class="meta-cat"><span><a
                                                                    href="blog-category-grid-sidebar.html">Smoothie</a></span>
                                            </div>
                                            <h4 class="name-blog"><a href="blog-detail.html"
                                                                class="title-black">A Better Way to Get Vitamin C</a>
                                                        </h4>
                                            <ul class="article-info">
                                                <li><a href="#">July 24, 2017</a>
                                                </li>
                                                <li><a href="#">0 Comments</a>
                                                </li>
                                                <li><a href="#">Share</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-container">
                                    <div class="left-block item-img">
                                        <div class="product-image-container">
                                            <a class="product-img-link" href="product-detail.html" title=""><img src="img/blog/blog4.png" alt="img" class="w-100 image-effect">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="right-block">
                                        <div class="product-box text-center">
                                            <div class="meta-cat"><span><a
                                                                    href="blog-category-grid-sidebar.html">Smoothie</a></span>
                                            </div>
                                            <h4 class="name-blog"><a href="blog-detail.html" title=""> A
                                                                Better Way to Get Vitamin C</a></h4>
                                            <ul class="article-info">
                                                <li><a href="#">July 24, 2017</a>
                                                </li>
                                                <li><a href="#">0 Comments</a>
                                                </li>
                                                <li><a href="#">Share</a>
                                                </li>
                                            </ul>
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
</section>
<section>
    <div class="store">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-sm-12 justify-content-end">
                    <div class="item-img position-img">
                        <a class="product-img-link" href="product-detail.html" title=""><img src="img/intro-banner.png" alt="img" class="image-effect">
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-12">
                    <div class="inner">
                        <div class="title item-content clearfix">
                            <div class=" page-title color">
                                <h3 class="title-main">What is Oars Store?</h3>
                                <div class="title-icon text-left">
                                    <h2 class="title-h2 background-position-left">Why we are the best</h2>
                                    <p class="description">Cras mattis consectetur purus sit amet fermentum. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="item-toggle">
                            <div class="panel panel-default click1">
                                <div class="show-description d-flex align-items-center"><i class="fa fa-angle-right"></i>
                                    <p class="title-black">Get creative with courgettes</p>
                                </div>
                                <div class="show1 display-none">
                                    <p>Ut fermentum massa justo sit amet risus tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
                                </div>
                            </div>
                            <div class="panel panel-default click1">
                                <div class="show-description d-flex align-items-center"><i class="fa fa-angle-right"></i>
                                    <p class="title-black">Italian style meatballs with courgette ‘tagliatelle’
                                    </p>
                                </div>
                                <div class="show1 display-none">
                                    <p>Aenean lacinia bibendum nulla sed consectetur. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus.</p>
                                </div>
                            </div>
                            <div class="panel panel-default click1">
                                <div class="show-description d-flex align-items-center"><i class="fa fa-angle-right"></i>
                                    <p class="title-black">How to fillet round fish (mackerel, trout, etc.)
                                    </p>
                                </div>
                                <div class="show1 display-none">
                                    <p>Ut fermentum massa justo sit amet risus tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
                                </div>
                            </div>
                            <div class="panel panel-default click1">
                                <div class="show-description d-flex align-items-center"><i class="fa fa-angle-right"></i>
                                    <p class="title-black">Irish fish chowder with soda bread</p>
                                </div>
                                <div class="show1 display-none">
                                    <p>Ut fermentum massa justo sit amet risus tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
                                </div>
                            </div>
                            <div class="panel panel-default click1 border-none">
                                <div class="show-description d-flex align-items-center"><i class="fa fa-angle-right"></i>
                                    <p class="title-black">Equipment you will need for this technique</p>
                                </div>
                                <div class="show1 display-none">
                                    <p>Ut fermentum massa justo sit amet risus tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

@endsection
