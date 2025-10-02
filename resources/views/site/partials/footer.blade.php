<footer class="fl-wrap main-footer">
    <div class="container">
        <!-- footer-widget-wrap -->
        <div class="footer-widget-wrap fl-wrap">
            <div class="row">
                <!-- footer-widget -->
                <div class="col-md-6">
                    <div class="footer-widget">
                        <div class="footer-widget-content">
                            <!-- <a href="" class="footer-logo"><img src="https://gmag.kwst.net/images/logo2.png" alt=""></a> -->
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eaque ipsa quae ab illo inventore veritatis et quasi architecto. </p>
                            <div class="footer-social fl-wrap">
                               <ul>
                                  <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                  <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                  <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                  <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                  <li><a href="#" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
                               </ul>
                            </div> -->
                            <p style="font-size: 20px; text-transform: uppercase; margin-bottom: 3px; margin-top: 28px;">{{ $config->web_title }}</p>
                            <p style="font-size: 16px; margin-bottom: 3px; padding-bottom: 3px;">Giấy phép xuất bản: {{ $config->gpxb }}</p>
                            <p style="font-size: 16px; margin-bottom: 3px; padding-bottom: 3px;">Chủ tịch Hội đồng biên tập, Tổng biên tập: {{ $config->nguoidaidien }}</p>
                            <p style="font-size: 16px; margin-bottom: 3px; padding-bottom: 3px;">Địa chỉ: {{ $config->address_company }}</p>
                            <p style="font-size: 16px; margin-bottom: 3px; padding-bottom: 3px;">Điện thoại: {{ $config->hotline }}</p>
                            <p style="font-size: 16px; margin-bottom: 3px; padding-bottom: 3px;">Email: {{ $config->email }}</p>
                        </div>
                    </div>
                </div>
                <!-- footer-widget  end-->

                <!-- footer-widget -->
                <div class="col-md-2">
                    <!-- <div class="footer-widget">
                       <div class="footer-widget-title">Links</div>
                       <div class="footer-widget-content">
                          <div class="footer-list footer-box fl-wrap">
                             <ul>
                                <li> <a href="#">Home</a></li>
                                <li> <a href="#">About</a></li>
                                <li> <a href="#">Contacts</a></li>
                                <li> <a href="#">News</a></li>
                                <li> <a href="#">Shop</a></li>
                             </ul>
                          </div>
                       </div>
                    </div> -->
                </div>
                <style>
                    .footer-widget-title{
                        display:flex;
                        align-items:center;
                        justify-content:center;
                    }

                    /* nền đỏ bo tròn quanh logo */
                    .footer-logo-badge{
                        display:inline-flex;
                        align-items:center;
                        justify-content:center;
                        background:#d62828;           /* đỏ */
                        color:#fff;
                        padding:8px 12px;              /* khoảng trắng quanh logo */
                        border-radius:14px;            /* bo tròn */
                        line-height:0;                 /* bỏ khoảng thừa dưới img */
                        box-shadow:0 2px 8px rgba(0,0,0,.08);
                        text-decoration:none;
                    }

                    /* ảnh bên trong */
                    .footer-logo-badge img{
                        display:block;
                        max-height:102px;               /* chỉnh theo footer của bạn */
                        width:auto;
                    }

                    /* Mobile nhỏ hơn */
                    @media (max-width:576px){
                        .footer-logo-badge{ padding:6px 10px; border-radius:12px; }
                        .footer-logo-badge img{ max-height:48px; }
                    }
                </style>
                <!-- footer-widget  end-->
                <!-- footer-widget -->
                <div class="col-md-4">
                    <div class="footer-widget text-center">
                        <div class="footer-widget-title" >
                            <a href="" class="footer-logo-badge"><img src="{{ $config->image->path ?? '' }}" alt="" style="width: 100%;"></a>
                        </div>
                        <div class="footer-widget-content">
                           <div class="footer-widget-sub-iso">
                               ISSN: 0868 - 3808
                            </div>
                        </div>
                        <style>
                            .footer-widget .footer-widget-content .footer-widget-sub-iso {
                                text-transform: uppercase;
                                font-family: "STIX Two Text", serif;
                                font-optical-sizing: auto;
                                font-weight: 600;
                                font-style: normal;
                                font-size: 20px;
                                padding: 6px 15px;
                                color: #fff;
                                /*background-color: #fff;*/
                                display: inline-block;
                                margin-top: 10px;
                            }
                        </style>
                    </div>
                </div>
                <!-- footer-widget  end-->
            </div>
        </div>
        <!-- footer-widget-wrap end-->
    </div>
    <div class="footer-bottom fl-wrap text-center">
        <div class="container">
            <div class="copyright text-center">COPYRIGHT &#169; BẢN QUYỀN THUỘC <span style="text-transform: uppercase; color: #fff">{{ $config->web_title }}.</span></div>
        </div>
    </div>
</footer>
