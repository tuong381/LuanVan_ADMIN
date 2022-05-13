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

<div class="blog-default">
<div class="all">

<section>
    <div class="section blog-news">
        <div class="container">
            <div class="block-content m-top">

                <div class="row">
                    @foreach($blogs as $key=>$blog)
                    <div class="col-lg-4 col-md-6 col-sm-12 card-container">

                        <input type="hidden" name="idBaiViet_hidden" value="{{$blog->id_BaiViet}}">

                        <div class="product-container" >
                            <div class="left-block item-img">
                                <div class="product-image-container ">
                                    <a class="product-img-link" href="{{URL::to('/show-chi-tiet-Blog/'.$blog->id_BaiViet)}}" title=""><img src="{{URL::to('public/upload/baiviet/'.$blog->HinhAnh_BaiViet)}}" alt="img" class="w-100 image-effect"
                                         style="height: 240px;">
                                    </a>
                                </div>
                            </div>
                            <div class="right-block" style="height: 120px; background: #f5f6fb">
                                <div class="product-box text-center">

                                    <h4 class="name-blog"><a href="blog-detail.html" class="title-black">{{$blog->TenBaiViet}}</a></h4>
                                    <ul class="article-info">
                                        <li><a href="#">{{$blog->created_at}}</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>

                     @endforeach
                </div>

            </div>

            <div style="margin-left: 31rem">
                   {{ $blogs->links("pagination::bootstrap-4") }}


             </div>

        </div>
    </div>
</section>

</div>
</div>


@endsection
