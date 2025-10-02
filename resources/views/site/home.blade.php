@extends('site.layouts.master')
@section('title'){{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->image->path ?? ''}}@endsection

@section('css')

@endsection

@section('content')
    <div class="content">
        <section class="home-page">
            <div class="container">
                <div class="row home-page-row">
                    <div class="col-md-2 order-1 order-md-3">
                        <!-- sidebar   -->
                        <div class="left-sidebar">
                            <!-- box-widget -->
                            <div class="box-widget fl-wrap">
                                <div class="box-widget-content">
                                    <!-- content-tabs-wrap -->
                                    @foreach($banners1->galleries as $gallery)
                                        <img src="{{ $gallery->image->path ?? '' }}" alt="" style="width: 100%; height: 300px; margin-bottom: 50px; border-radius: 4px;">
                                    @endforeach
                                    <!-- content-tabs-wrap end -->
                                </div>
                            </div>
                            <!-- box-widget  end -->
                        </div>
                        <style>
                            .left-sidebar .box-widget {
                                padding-left: 0;
                            }
                        </style>
                        <!-- sidebar  end -->
                    </div>
                    <div class="col-md-6 order-2 order-md-1">
                        <div class="main-container fl-wrap fix-container-init">
                            <div class="section-title">
                                <h2 style="text-transform: uppercase;">Nội dung số mới nhất</h2>
                                <!-- <h4>Don't miss daily news</h4> -->

                            </div>
                            <div class="ajax-wrapper fl-wrap">
                                <div class="ajax-loader"><img src="https://gmag.kwst.net/images/loading.gif" alt=""/></div>
                                <div id="ajax-content" class="fl-wrap">
                                    <div class="list-post-wrap">

                                        @foreach($postsRecent as $postRecent)
                                            <div class="list-post fl-wrap">
                                                <div class="list-post-media">
                                                    <a href="/{{ $postRecent->slug }}">
                                                        <div class="bg-wrap">
                                                            <div class="bg" data-bg="{{ $postRecent->image->path ?? '' }}"
                                                                 style="background-image: url({{ $postRecent->image->path ?? '' }}) "
                                                            ></div>
                                                        </div>
                                                    </a>


                                                    <span class="post-media_title">© Image Copyrights Title</span>
                                                </div>

                                                <div class="list-post-content">
                                                    <a class="post-category-marker" href="#">
                                                        {{ $postRecent->category->name ?? '' }}
                                                    </a>

                                                    <h3 class="post-title">
                                                        <a href="/{{ $postRecent->slug }}">{{ $postRecent->name }}</a>

                                                        <!-- Badge chỉ xuất hiện khi is_hot = 1 -->
                                                        @if($postRecent->is_hot == 1)
                                                            <span class="hot-badge"
                                                                  ng-if="post.is_hot == 1"
                                                                  title="Bài viết nổi bật">
                                                          <span class="hot-badge__icon" aria-hidden="true">🔥</span>
                                                          <span class="hot-badge__text">Tin hot</span>
                                                         </span>
                                                        @endif

                                                    </h3>

                                                    <span class="post-date">
    <i class="far fa-clock"></i>
    {{ \Illuminate\Support\Carbon::parse($postRecent->created_at)->format('d/m/Y') }}
  </span>


                                                    <p>{{ $postRecent->intro }}</p>
                                                </div>

                                            </div>

                                        @endforeach


                                    </div>

                                </div>
                            </div>


                            @foreach($categories as $category)
                                <div class="clearfix"></div>
                                <div class="section-title">
                                    <h2 style="text-transform: uppercase;">{{ $category->name }}</h2>
                                    <div class="ajax-nav">

                                    </div>
                                </div>
                                @if($category->posts->count())
                                        @php
                                            $firstPost = $category->posts->first();
                                            $posts = $category->posts->slice(1)->values();
                                        @endphp

                                    <div class="grid-post-wrap">
                                        <div class="more-post-wrap  fl-wrap">
                                            <div class="list-post-wrap list-post-wrap_column fl-wrap">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <!--list-post-->
                                                        <div class="list-post fl-wrap">
                                                            <!-- <a class="post-category-marker" href="category.html">Sports</a> -->
                                                            <div class="list-post-media">
                                                                <a href="/{{ $firstPost->slug }}">
                                                                    <div class="bg-wrap">
                                                                        <div class="bg" data-bg="{{ $firstPost->image->path ?? '' }}"></div>
                                                                    </div>
                                                                </a>
                                                                <span class="post-media_title">&copy; Image Copyrights Title</span>
                                                            </div>
                                                            <div class="list-post-content">
                                                                <h3><a href="/{{ $firstPost->slug }}">{{ $firstPost->name }}</a></h3>
                                                                <span class="post-date"><i class="far fa-clock"></i>
                                                                    {{ \Carbon\Carbon::parse($firstPost->created_at)->format('d/m/Y') }}
                                                                </span>
                                                                <p>
                                                                    {{ $firstPost->intro }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <!--list-post end-->
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="post-widget-container fl-wrap">
                                                            @foreach($posts as $post)
                                                                <div class="post-widget-item fl-wrap">
                                                                    <div class="post-widget-item-media">
                                                                        <a href="/{{ $post->slug }}"><img src="{{ $post->image->path ?? '' }}"  alt=""></a>
                                                                    </div>
                                                                    <div class="post-widget-item-content">
                                                                        <h4><a href="/{{ $post->slug }}">{{ $post->name }}</a></h4>
                                                                        <ul class="pwic_opt">
                                                                            <li><span><i class="far fa-clock"></i>{{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}</span></li>

                                                                        </ul>
                                                                        <p style="padding-bottom: 0;">
                                                                            {{ $post->intro }}
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-4 order-3 order-md-2">
                        <!-- sidebar   -->
                        <div class="sidebar-content fl-wrap fix-bar">
                            <!-- box-widget -->
                            <div class="box-widget fl-wrap" style="margin-bottom: 0;">
                                <div class="box-widget-content">
                                    <div class="content-tabs fl-wrap" style="background-color: #27408b; color: #fff; font-size: 16px; padding: 10px; border-top-left-radius: 4px; border-top-right-radius: 4px; text-transform: uppercase;">
                                        Ảnh bìa tạp chí số mới nhất
                                    </div>
                                </div>
                            </div>

                            <div class="box-widget fl-wrap">
                                <div class="box-widget-content">
                                    <div class="single-grid-slider slider_widget">
                                        <div class="swiper-container">
                                            <div class="swiper-wrapper">
                                                <!-- swiper-slide-->
                                                @foreach($banners2->galleries as $gallery)
                                                    <div class="swiper-slide">
                                                        <div class="grid-post-item     fl-wrap">
                                                            <div class="grid-post-media gpm_sing">
                                                                <div class="bg-wrap">
                                                                    <div class="bg" data-bg="{{ $gallery->image->path ?? '' }}"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="sgs-pagination sgs_hor "></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- box-widget  end -->

                            <!-- box-widget -->
                            <div class="box-widget fl-wrap">
                                <div class="widget-title">Theo dõi chúng tôi</div>
                                <div class="box-widget-content">
                                    <div class="social-widget">
                                        <a href="{{ $config->facebook }}" target="_blank" class="facebook-soc">
                                            <i class="fab fa-facebook-f"></i>
                                            <span class="soc-widget-title">Likes</span>
                                            <span class="soc-widget_counter"></span>
                                        </a>
                                        <a href="{{ $config->twitter }}" target="_blank" class="twitter-soc">
                                            <i class="fab fa-twitter"></i>
                                            <span class="soc-widget-title">Followers</span>
                                            <span class="soc-widget_counter"></span>
                                        </a>
                                        <a href="{{ $config->youtube }}" target="_blank" class="youtube-soc">
                                            <i class="fab fa-youtube"></i>
                                            <span class="soc-widget-title">Followers</span>
                                            <span class="soc-widget_counter"></span>
                                        </a>
                                        <a href="{{ $config->instagram }}" target="_blank" class="instagram-soc">
                                            <i class="fab fa-instagram"></i>
                                            <span class="soc-widget-title">Followers</span>
                                            <span class="soc-widget_counter"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- box-widget  end -->
                            <!-- box-widget -->
                            <!-- <div class="box-widget fl-wrap">
                               <div class="widget-title">Popular Tags</div>
                               <div class="box-widget-content">
                                  <div class="tags-widget">
                                     <a href="#">Science</a>
                                     <a href="#">Politics</a>
                                     <a href="#">Technology</a>
                                     <a href="#">Business</a>
                                     <a href="#">Sports</a>
                                     <a href="#">Food</a>
                                  </div>
                               </div>
                            </div> -->
                            <!-- box-widget  end -->
                            <!-- box-widget -->
                            @if($popularCate->show_home_page)
                                <div class="box-widget fl-wrap">
                                    <div class="box-widget-content">
                                        <div class="single-grid-slider slider_widget">
                                            <div class="slider_widget_title">{{ $popularCate->name }}</div>
                                            <div class="swiper-container">
                                                <div class="swiper-wrapper">
                                                    <!-- swiper-slide-->

                                                    @foreach($popularPosts as $popularPost)
                                                        <div class="swiper-slide">
                                                            <div class="grid-post-item     fl-wrap">
                                                                <div class="grid-post-media gpm_sing">
                                                                    <div class="bg-wrap">
                                                                        <div class="bg" data-bg="{{ $popularPost->image->path ?? '' }}"></div>
                                                                        <div class="overlay"></div>
                                                                    </div>
                                                                    <div class="grid-post-media_title">
                                                                        <a class="post-category-marker" href="">{{ $popularPost->category->name ?? '' }}</a>
                                                                        <h4><a href="/{{ $popularPost->slug }}">{{ $popularPost->name }}</a></h4>
                                                                        <span class="video-date"><i class="far fa-clock"></i>
                                                                       {{ \Illuminate\Support\Carbon::parse($popularPost->created_at)->format('d/m/Y') }}
                                                                    </span>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                    <!-- swiper-slide end-->
                                                </div>
                                                <div class="sgs-pagination sgs_hor "></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- box-widget  end -->

                            <!-- video-links-wrap   -->
                            <div class="box-widget fl-wrap" style="position: relative; min-height: 500px;">
                                <div class="video-links-wrap">
                                    @foreach($highlightPosts as $highlightPost)
                                        <div class="video-item  fl-wrap image-popup">
                                            <div class="video-item-img fl-wrap">
                                                <img src="{{ $highlightPost->image->path ?? '' }}" class="respimg" alt="">
                                            </div>
                                            <div class="video-item-title">
                                                <a href="/{{ $highlightPost->slug }}">  <h4 >{{ $highlightPost->name }}</h4></a>

                                                <span class="video-date"><i class="far fa-clock"></i> <strong>
                                                       {{ \Illuminate\Support\Carbon::parse($highlightPost->created_at)->format('d/m/Y') }}
                                                    </strong></span>
                                            </div>
                                            <a class="post-category-marker" href="">{{ $highlightPost->category->name ?? '' }}</a>
                                        </div>

                                    @endforeach


                                </div>
                            </div>
                            <!-- video-links-wrap end   -->
                            <style>
                                .box-widget .video-links-wrap .ps__thumb-y {
                                    height: 235px !important;
                                }
                            </style>
                        </div>
                        <!-- sidebar  end -->
                    </div>
                </div>
                <div class="limit-box fl-wrap"></div>
            </div>
            <style>
                .home-page {
                    margin-top: 50px;
                }

                .home-page .home-page-row {
                    display: flex;
                }

                @media (max-width: 991px) {
                    .home-page {
                        margin-top: 50px;
                        padding: 50px 0 !important;
                    }

                    .home-page .home-page-row {
                        flex-flow: column;
                    }
                }

                @media (max-width: 768px) {
                    .home-page {
                        margin-top: 0;
                        padding: 50px 0 !important;
                    }

                    .home-page .home-page-row {
                        flex-flow: column;
                    }
                }
            </style>
        </section>
        <!-- section end -->
    </div>
@endsection

@push('scripts')
    <script src="https://unpkg.com/swiper@9/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            new Swiper('.fb2__swiper', {
                speed: 600,
                grabCursor: true,
                keyboard: { enabled: true },
                pagination: { el: '#feedback-swiper .swiper-pagination', clickable: true },
                navigation: {
                    nextEl: '#feedback-swiper .swiper-button-next',
                    prevEl: '#feedback-swiper .swiper-button-prev'
                },
                // Mặc định mobile 1 card và căn giữa
                slidesPerView: 1,
                spaceBetween: 18,
                centeredSlides: true,
                centeredSlidesBounds: true,   // không lố ở 2 mép
                watchOverflow: true,

                breakpoints: {
                    // >= 640px: đúng 2 card, căn giữa, không tràn
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 24,
                        centeredSlides: true,
                        centeredSlidesBounds: true
                    },
                    // >= 1200px: vẫn 2 card, khoảng cách rộng hơn
                    1200:{
                        slidesPerView: 2,
                        spaceBetween: 32,
                        centeredSlides: true,
                        centeredSlidesBounds: true
                    }
                }
            });
        });
    </script>



    <script>
        // Chạy sau khi DOM sẵn sàng
        $(function () {
            function openLoginModal() {
                $(".main-register-container").fadeIn(1);
                $(".main-register-wrap").addClass("vis_mr");
                // (tuỳ chọn) khoá scroll nền:
                // $("html").addClass("no-scroll");
            }

            function checkHashAndOpen() {
                var h = (window.location.hash || "").toLowerCase();
                if (h === "#login") {
                    openLoginModal();
                    // (tuỳ chọn) xoá #login khỏi URL để tránh mở lại khi back/refresh:
                    // history.replaceState(null, "", window.location.pathname + window.location.search);
                }
            }

            // 1) Kiểm tra ngay khi load trang
            checkHashAndOpen();

            // 2) Nếu hash thay đổi trong khi đang ở trang (SPA/anchor link)
            $(window).on("hashchange", checkHashAndOpen);

            // 3) Bắt các link có href kết thúc bằng #login để mở modal ngay, không cuộn trang
            $(document).on("click", 'a[href$="#login"]', function (e) {
                e.preventDefault();
                // đặt hash -> sẽ kích hoạt checkHashAndOpen qua sự kiện hashchange
                if (window.location.hash !== "#login") {
                    window.location.hash = "login";
                } else {
                    // nếu đã là #login thì mở luôn
                    openLoginModal();
                }
            });
        });
    </script>

    <script>
        (function(){
            const counters = document.querySelectorAll('#kpi-counters .kpi__num');
            if (!counters.length) return;

            function animate(el){
                if (el.dataset.done) return;           // tránh chạy lại
                const end = parseInt(el.dataset.target || '0', 10);
                const dur = parseInt(el.dataset.duration || '1200', 10);
                const start = 0;
                const startTime = performance.now();

                function tick(now){
                    const p = Math.min((now - startTime) / dur, 1);
                    const eased = 1 - Math.pow(1 - p, 3);        // easeOutCubic
                    const val = Math.round(start + (end - start) * eased);
                    // format theo vi-VN
                    el.textContent = val.toLocaleString('vi-VN');
                    if (p < 1) requestAnimationFrame(tick);
                    else el.dataset.done = "1";
                }
                requestAnimationFrame(tick);
            }

            // Trigger khi thấy trong viewport
            if ('IntersectionObserver' in window){
                const io = new IntersectionObserver((entries)=>{
                    entries.forEach(entry=>{
                        if (entry.isIntersecting) {
                            animate(entry.target);
                            io.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.4 });
                counters.forEach(el=>io.observe(el));
            } else {
                // Fallback cũ: chạy luôn
                counters.forEach(animate);
            }
        })();
    </script>



    <script>
        app.controller('homePage', function ($rootScope, $scope, cartItemSync, $interval) {

            $scope.formartDate = function (date) {
                return new Date(date.replace(' ', 'T'));
            }

        })
    </script>

@endpush
