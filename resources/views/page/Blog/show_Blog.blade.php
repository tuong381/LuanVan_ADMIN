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
                    <li><span style="font-family: 'FontAwesome';">Blog</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 sidebar">

                <!-- Categories -->
                <div class="sidebar-block">
                    <div class="sub-title">
                        <h4>Danh mục bài viết</h4>
                    </div>

                    <div class="block-content">
                         @foreach($danhmuc_BaiViet as $key=>$danhmuc_baiviet)
                        <ul class="list-block">
                             <li style="border-bottom: 1px solid #f5f6fb; padding: 10px 0; position: relative;">
                                <a href="{{URL::to('danh-muc-bai-viet/'.$danhmuc_baiviet->id_DanhMucBaiViet)}}">{{$danhmuc_baiviet->TenDanhMucBaiViet}}</a>
                                    </li>


                        </ul>
                        @endforeach
                    </div>


                </div>


                <div class="sidebar-block blogs-recent">
                                    <div class="sub-title">
                                        <h4>Các bài viết khác</h4>
                                    </div>
                                    <div class="recent-article">
                                        <div class="ra-item-inner">
                                             @foreach($blog as $key=>$blog)

                                             <input type="hidden" name="idBaiViet_hidden" value="{{$blog->id_BaiViet}}">

                                            <div class="article-item clearfix d-flex">

                                                <div class="article-image">
                                                    <a href="{{URL::to('/show-chi-tiet-Blog/'.$blog->id_BaiViet)}}"><img class="img-fluid" src="{{URL::to('public/upload/baiviet/'.$blog->HinhAnh_BaiViet)}}" alt="">
                                                    </a>
                                                </div>

                                                <div class="articleinfo-group">

                                                    <div class="article-title">
                                                        <h2 class="article-name"><a href="{{URL::to('/show-chi-tiet-Blog/'.$blog->id_BaiViet)}}">{{$blog->TenBaiViet}}</a></h2>
                                                    </div>
                                                    <ul class="article-info list-inline">
                                                        <li class="article-date">{{$blog->created_at}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach

                                        </div>
                                    </div>
                                </div>

            </div>
            <div class="col-lg-9 col-md-12 product-default-item">

                <div class="feature-products tab-content">
                    <!-- Grid -->


                    <div id="grid" class="tab-pane active">
                        <div class="product">
                            <div class="row">
                                @foreach($blogs as $key=>$blog)

                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <div class="item item-hover-view-cart">

                                          <input type="hidden" name="idBaiViet_hidden" value="{{$blog->id_BaiViet}}">

                                            <div class="product-thumb">
                                                <div class="product-container item-img">
                                                    <div class="product-image-container"><a class="product-img-link" href="{{URL::to('/show-chi-tiet-Blog/'.$blog->id_BaiViet)}}" title=""><img class="img-fluid" src="{{URL::to('public/upload/baiviet/'.$blog->HinhAnh_BaiViet)}}" alt="img" style="height: 200px"><img class="img-fluid img-hover" src="{{URL::to('public/upload/baiviet/'.$blog->HinhAnh_BaiViet)}}" alt="img" style="height: 230px">
                                                                </a>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="product-info text-center" style="height: 8rem">
                                                <h4 class="product-name"><a href="{{URL::to('/show-chi-tiet-Blog/'.$blog->id_BaiViet)}}">{{$blog->TenBaiViet}}</a></h4>
                                                <div class="article-info">{{$blog->created_at}}
                                                </div>
                                            </div>

                                    </div>
                                </div>

                                 @endforeach
                            </div>
                        </div>
                    </div>

                </div>

            </div>

              <div style="margin-left: 41rem">
                   {{ $blogs->links("pagination::bootstrap-4") }}


                </div>


        </div>
    </div>
</div>


@endsection
