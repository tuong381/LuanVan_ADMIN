
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
                    <li><span style="font-family: 'FontAwesome';">Liên hệ</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

 <?php
      $message = Session::get('message');
       if($message){
          echo '<span class="text-alert">'.$message.'</span>';
          Session::put('message',null);
        }

   ?>

<div class="section about">
        <div class="container">

            <div class="section main-contact-us">
                <div class="section container">
                    <div class="row">
                        <div class="col-md-7 col-sm-12 m-b-30">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.858228303052!2d105.76883821474253!3d10.028555792831622!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a088239f6f03f9%3A0x2862ae96b70e4905!2zxJAuIDMvMiwgWHXDom4gS2jDoW5oLCBOaW5oIEtp4buBdSwgQ-G6p24gVGjGoSwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1637414215062!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                        <div class="col-md-5 col-sm-12">

                           {{--  @if (session('success'))
                                <div class="alert alert-success">
                                      <p>{{ session('success') }}</p>
                                </div>
                            @endif --}}

                            <div class="page-title color m-bottom-2">
                                <h3 class="title-main">Market Online</h3>
                                <div class="title title-icon">
                                    <h2 class="title-h2">Liên hệ với chúng tôi</h2>
                                     <i class="fas fa-map-marker-alt"></i>
                                </div>
                            </div>

                            <div class="header-contact">

                                <div class="col padding-0">
                                    <div class="item d-flex">
                                        <div class="item-left">
                                            <div class="icon"><i class="fa fa-map-marker"
                                                aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="contact-content">

                                            <p style=" font-size: 20px; font-family: 'Flaticon';">
                                                Đường 3/2, Phường Xuân Khánh, Quận Ninh Kiều, TP.Cần Thơ</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col padding-0">
                                    <div class="item d-flex">
                                        <div class="item-left">
                                            <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i>

                                            </div>
                                        </div>
                                        <div class="item-right">
                                            <p style=" font-size: 20px; font-family: 'Flaticon';">
                                                073 246 2322</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col padding-0">
                                    <div class="item d-flex last">
                                        <div class="item-left">
                                            <div class="icon"><i class="fa fa-paper-plane" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="item-right">
                                            <p style=" font-size: 20px; font-family: 'Flaticon';">
                                                MarketOnline@gmail.com</p>
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
