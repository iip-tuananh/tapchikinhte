<header class="main-header" ng-controller="headerPartial">
    <style>

        /* Mobile */
        @media (max-width: 767.98px){
            .top-bar{
                padding:16px 12px;
                background-image: none !important; /* ẩn ảnh nền trên mobile */
            }

            .top-bar-container{
                flex-direction: column;      /* logo lên trên, text xuống dưới */
                align-items: center;
                text-align: center;
                gap:0px;
            }

            .logo-header{
                display:flex;
                flex-direction: column;
                align-items:center;
            }

            .logo-holder img{
                max-height:48px;             /* chỉnh kích thước logo cho gọn */
                width:auto;
                display:block;
            }

            .left-header-sub-iso{
                left: 0px !important; /* ISSN */
                font-size:12px !important;
                margin-top:6px;
                opacity:.9;
            }

            .left-header-title{
                margin-top:6px;
                font-size:16px;              /* size vừa mắt mobile */
                line-height:1.35;
                font-weight:700;
                letter-spacing:.3px;
                text-transform:uppercase;
            }

            .left-header-title br{         /* bỏ xuống dòng cứng */
                display:none;
            }
        }



        /* Nền đỏ bo tròn quanh logo */
        .logo-badge{
            display:inline-flex;            /* ô bọc khít theo nội dung */
            align-items:center;
            justify-content:center;
            background:#d62828;             /* đỏ */
            color:#fff;
            padding:6px 10px;               /* khoảng trắng quanh ảnh */
            border-radius:12px;             /* bo tròn */
            line-height:0;                  /* loại bỏ khoảng thừa dưới ảnh */
            box-shadow:0 2px 6px rgba(0,0,0,.08);
        }

        /* Ảnh hiển thị gọn trong nền đỏ */
        .logo-badge img{
            display:block;
            max-height:81px;                /* chỉnh tùy header */
            width:auto;
        }

        /* Responsive nhỏ hơn trên mobile */
        @media (max-width: 576px){
            .logo-badge{ padding:4px 8px; border-radius:10px; }
            .logo-badge img{ max-height:40px; }
        }

    </style>
    <style>
        /* Tùy biến nhanh bằng biến CSS */
        :root{
            --logo-h: 44px;          /* chiều cao logo */
            --logo-pad-y: 12px;       /* padding dọc */
            --logo-pad-x: 12px;      /* padding ngang */
            --logo-radius: 12px;     /* độ bo tròn */
            --logo-bg: #d32027;      /* đỏ chủ đạo */
        }

        .apc-left{
            display:flex;
            align-items:center;
        }

        .apc-logo--badge{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            background:var(--logo-bg);
            padding:var(--logo-pad-y) var(--logo-pad-x);
            border-radius:var(--logo-radius);
            line-height:1;
            overflow:hidden;                /* bảo đảm bo tròn “ăn” vào nền */
            box-shadow:0 2px 6px rgba(0,0,0,.08);
            text-decoration:none;
        }

        .apc-logo--badge img{
            display:block;
            height:var(--logo-h);
            width:auto;
        }

        /* Hover/Focus cho đẹp & accessibility */
        .apc-logo--badge:hover{ filter:brightness(1.03); }
        .apc-logo--badge:focus-visible{
            outline:2px solid #1e4fa3;     /* viền xanh nhẹ giống mẫu */
            outline-offset:2px;
        }

        /* Mobile tinh gọn */
        @media (max-width: 575.98px){
            :root{ --logo-h: 34px; --logo-pad-y: 4px; --logo-pad-x: 10px; --logo-radius: 10px; }
        }

    </style>
    <!-- top bar -->
    <div class="top-bar fl-wrap">
        <div class="top-bar-container">
            <div class="top-bar-container apc-header">
                <!-- LEFT: logo + ISSN -->
                <div class="apc-left">
                    <a href="{{ route('front.home-page') }}" class="apc-logo apc-logo--badge">
                        <img src="{{ $config->image->path ?? '' }}" alt="Logo">
                    </a>
                    <div class="apc-issn">ISSN: 0868 - 3808</div>
                </div>

                <!-- CENTER: banner quảng cáo (1 ảnh duy nhất) -->
                @php
                    $bannerAd = @$bannerAd->galleries[0] ?? null;
                @endphp
                <div class="apc-center" aria-label="banner-quang-cao">
                    <a class="apc-ad" href="{{ @$bannerAd->caption ?? '#' }}" target="_blank" rel="noopener">
                        <img class="apc-ad-img"
                             src="{{ @$bannerAd->image->path ?? 'https://placehold.co/1456x180/343a40/FFFFFF?text=Header+Ad+%402x' }}"
                             alt="Quảng cáo header" loading="lazy">
                    </a>
                </div>

                <!-- RIGHT: logo + text -->
                <div class="apc-right">
                    <img class="apc-right-logo" src="/site/img/logo_right.png" alt="VAPEC">
                    <div class="apc-right-text">
                        <div class="apc-title-vi">TRUNG TÂM KINH TẾ <br> CHÂU Á - THÁI BÌNH DƯƠNG</div>
                        <div class="apc-title-en">Vietnam Asia-Pacific Economic Center</div>
                    </div>
                </div>
            </div>

            <style>
                /* ====== Header 3 cột – tất cả prefix apc- để tránh đụng CSS khác ====== */
                .apc-header{
                    width:calc(100% - 100px);
                    margin:0 50px;
                    max-width:100%;
                    display:flex;
                    align-items:center;
                    justify-content:space-between;
                    gap:16px;
                }

                /* LEFT */
                .apc-left{display:flex; flex-direction:column; align-items:center; min-width:180px}
                .apc-logo img{max-height:95px; width:auto; height:auto; display:block}
                .apc-issn{margin-top:8px; font-size:14px; letter-spacing:.3px; color:#fff}

                /* CENTER – 1 ảnh banner, tự co giãn */
                .apc-center{flex:1; display:flex; align-items:center; justify-content:center; min-height:60px}
                .apc-ad{display:block; width:100%; max-width:clamp(320px, 58vw, 728px)}
                .apc-ad-img{
                    display:block; width:100%; height:auto;
                    /*aspect-ratio:728/90;          !* ổn định layout trước khi ảnh tải *!*/
                    object-fit:contain;
                    border-radius:8px;
                    box-shadow:0 2px 8px rgba(0,0,0,.08);
                }

                /* RIGHT */
                .apc-right{display:flex; align-items:center; gap:14px; min-width:280px}
                .apc-right-logo{height:165px; width:auto; display:block}
                .apc-right-text{line-height:1.2; text-align:left}
                .apc-title-vi{
                    font-family:"STIX Two Text", serif;
                    font-weight:500;
                    font-size:20px;
                    color:#fff;
                }
                .apc-title-en{
                    font-family:"STIX Two Text", serif;
                    font-weight:400;
                    font-size:16px;
                    color:#fff;
                    opacity:.95;
                }

                /* ====== Responsive ====== */
                /* Tablet */
                @media (max-width: 1199.98px){
                    .apc-right-logo{height:64px}
                    .apc-title-vi{font-size:18px}
                    .apc-title-en{font-size:14px}
                    .apc-ad{max-width:468px}       /* ~468x60 */
                }
                /* Mobile */
                @media (max-width: 768px){
                    .apc-header{width:calc(100% - 30px); margin:0 15px; flex-wrap:wrap; gap:10px}
                    .apc-left{min-width:auto}
                    .apc-right-logo{height:100px}
                    .apc-title-vi{font-size:16px}
                    .apc-title-en{font-size:12px}
                    .apc-center{order:3; flex:0 0 100%} /* banner xuống hàng dưới */
                    .apc-ad{max-width:320px}            /* ~320x50 */
                }
            </style>
        </div>
        <style>
            .top-bar-container {
                width: calc(100% - 100px);
                max-width: 100%;
                margin: 0 50px;
                display: flex;
                justify-content: space-between;
            }

            .top-bar-container .left-header {
                position: relative;
                top: 30px;
            }

            .top-bar-container .left-header .left-header-title {
                /* text-transform: uppercase; */
                font-family: "STIX Two Text", serif;
                font-optical-sizing: auto;
                font-weight: 400;
                font-style: normal;
                font-size: 21px;
                color: #fff
            }
            .left-header-sub-iso {
                position: relative;
                left: -8px;
                text-transform: uppercase;
                font-family: "STIX Two Text", serif;
                font-optical-sizing: auto;
                font-weight: 500;
                font-style: normal;
                font-size: 15px;
                /* padding: 6px 15px; */
                color: #fff;
                /* background-color: #fff; */
                /* display: inline-block; */
                /* margin-top: 10px; */
            }

            @media only screen and  (max-width: 768px) {
                .top-bar-container {
                    width: calc(100% - 30px);
                    max-width: 100%;
                    margin: 0 15px;
                }

                .top-bar-container .left-header {
                    top: 15px;
                }

                .top-bar-container .left-header .left-header-title {
                    font-size: 16px;
                }

                .top-bar-container .left-header .left-header-sub-iso {
                    font-size: 11px;
                    margin-top: 0;
                }
            }
        </style>
    </div>
    <!-- top bar end -->
    <div class="header-inner fl-wrap">
        <div class="container">
            <style>
                .lang-select{
                    padding:6px 10px; border:1px solid #ddd; border-radius:6px;
                    font-weight:600; background:#fff; min-width:140px;
                }
            </style>
            <!-- logo holder end -->


            <style>
                .language {
                    float: right;
                    margin-right: 12px;
                    margin-top: 20px;
                    margin-bottom: 12px;
                    padding-left: 10px;
                }

                @media (max-width: 767.98px) {
                    .language {
                        float: right;
                        margin-right: 19px;
                        margin-top: 9px;
                        margin-bottom: 12px;
                        padding-left: 10px;
                    }


                }
            </style>


            <div class="search_btn htact show_search-btn"><i class="far fa-search"></i> <span class="">Tìm kiếm</span></div>

            <style>
                :root{
                    --chip-bg:#eef3ff;
                    --chip-text:#0a2540;
                    --chip-border:#cfd8ea;
                    --brand:#5F27CD; /* tím nhạt bạn hay dùng */
                    --shadow:0 8px 24px rgba(10,37,64,.12);
                }

                .header-actions{
                    display:flex; align-items:center; gap:12px;
                }

                /* Pill button */
                .user-greet{ float:right; position: relative }
                .user-chip{
                    margin-top: 11px;
                    margin-right: 10px;
                    display:flex; align-items:center; gap:10px;
                    background:#fff;
                    color:var(--chip-text);
                    border:1px solid var(--chip-border);
                    border-radius:999px;
                    padding:8px 12px;
                    font-weight:600;
                    line-height:1;
                    cursor:pointer;
                    transition:box-shadow .2s, transform .04s;
                }
                .user-chip:hover{ box-shadow:var(--shadow); }
                .user-chip:active{ transform:translateY(1px); }

                .user-chip .avatar{
                    width:28px; height:28px; border-radius:50%;
                    display:inline-grid; place-items:center;
                    font-size:14px; color:#fff;
                    background: linear-gradient(135deg, var(--brand), #7A5AF5);
                    flex:0 0 28px;
                }
                .user-chip .text{ display:flex; flex-direction:column; align-items:flex-start; }
                .user-chip .hello{ font-size:10px; opacity:.8; letter-spacing:.5px; }
                .user-chip .name{ font-size:13px; text-transform:uppercase; }

                /* dropdown */
                .user-dropdown{
                    position:absolute; top:calc(100% + 1px); right:0;
                    background:#fff; border:1px solid #e6e9f2; border-radius:12px;
                    min-width:220px; box-shadow:var(--shadow);
                    padding:8px; display:none; z-index:9999;
                }
                .user-dropdown.show{ display:block; animation:fadeIn .12s ease-out; }

                .dd-item{
                    display:block; padding:10px 12px; border-radius:8px; text-align: left;
                    color:#1f2a44; text-decoration:none; font-weight:600;
                }
                .dd-item:hover{ background:#f6f8fe; color:#111; }
                .dd-form{ padding:0; }
                .dd-form button{
                    width:100%; background:none; border:0; text-align:left;
                    padding:10px 12px; border-radius:8px; font-weight:600; cursor:pointer;
                }
                .dd-form button:hover{ background:#fdf1f1; color:#c62828; }

                .chev{ font-size:12px; opacity:.7; }

                /* Responsive tweaks */
                @media (max-width: 768px){
                    .header-actions{ gap:8px; }
                    .user-chip{ padding:8px 10px; gap:8px; }
                    .user-chip .hello{ display:none; }          /* gọn hơn trên mobile */
                    .user-chip .name{
                        max-width:120px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;
                    }
                }
                @media (max-width: 480px){
                    .user-chip .name{ max-width:90px; }
                }

                @keyframes fadeIn{ from{opacity:0; transform:translateY(-4px)} to{opacity:1; transform:translateY(0)} }

                .sr-only{
                    position:absolute; width:1px; height:1px; padding:0; margin:-1px; overflow:hidden;
                    clip:rect(0,0,0,0); white-space:nowrap; border:0;
                }
                .usericon {
                    display: none;
                }
                @media (max-width: 767.98px){
                    .user-chip{ gap:0; padding:6px; }
                    .user-chip .avatar,
                    .user-chip .text,
                    .user-chip .chev{ display:none; }
                    .usericon{ display:inline-flex; }
                    /* Nếu muốn icon to hơn chút */
                    .usericon i{ font-size:22px; }

                    .user-chip{
                        margin-top: 6px;
                        margin-right: 20px;
                    }

                }

            </style>
            @php
                $isLoggedIn = auth('customer')->check();
                $userName   = $isLoggedIn ? trim(auth('customer')->user()->fullname ?? 'Người dùng') : 'Người dùng';
            @endphp

            <div class="user-greet" id="userMenu" data-name="{{ $userName }}">
                <button class="user-chip" id="userChip" aria-haspopup="true" aria-expanded="false">
                       <span class="usericon" aria-hidden="true">
                             <i class="fa fa-user"></i>
                         </span>

                    <span class="" aria-hidden="true">
                           @if(!empty($customer->avatar->path))
                            <img class="avatar avatar--large" src="{{ $customer->avatar->path }}" alt="{{ $customer->fullname }}">
                        @else
                            <img class="avatar avatar--large" src="/site/img/user.png" alt="#">
                        @endif
                    </span>
                    <span class="text">
        <span class="hello">Chào,</span>
        <span class="name">{{ $userName }}</span>
      </span>
                    <i class="fa fa-chevron-down chev" aria-hidden="true"></i>
                    <span class="sr-only">Tài khoản</span>
                </button>

                <div class="user-dropdown" id="userDropdown" role="menu" aria-label="Tài khoản">
                    @if($isLoggedIn)
                        <a class="dd-item" href="{{ route('front.getProfile') }}">Quản lý tài khoản</a>
                        <form class="dd-item dd-form" method="POST" action="">
                            @csrf
                            <button type="button" class="btn-logout">Đăng xuất</button>
                        </form>
                    @else
                        <a class="dd-item show-reg-form" href="">Đăng nhập</a>
                        <a class="dd-item show-reg-form" href="">Đăng ký</a>
                    @endif
                </div>
            </div>

            <style>
                .lang-toggle{
                    display:inline-flex; gap:4px; padding:4px; border-radius:999px;
                    background:#fff; border:1px solid #D7DCEC; box-shadow:0 3px 10px rgba(10,37,64,.06);
                }
                .lang-toggle button{
                    min-width:38px; padding:6px 8px; border:0; border-radius:999px; cursor:pointer;
                    font-weight:700; letter-spacing:.3px; color:#45526C; background:transparent; line-height:1;
                }
                .lang-toggle button.on{
                    background:#ea1e16; color:#fff;
                }
                .lang-toggle button:focus{ outline:none; box-shadow:0 0 0 3px rgba(95,39,205,.15); }
                @media (max-width:480px){
                    .lang-toggle button{ min-width:34px; padding:5px 7px; font-size:12px; }
                }



            </style>
            <div class="lang-toggle language " role="group" aria-label="Language">
                <button type="button" data-lang="vi" class="on" onclick="translateheader('vi')">VI</button>
                <button type="button" data-lang="en" onclick="translateheader('en')">EN</button>
            </div>



            <div class="header-search-wrap novis_sarch">
                <div class="widget-inner">
                    <form>
                        <input type="text" class="search" name="keyword" placeholder="Nhập từ khóa của bạn..." value="" ng-model="keywords" />
                        <button class="search-submit" id="submit_btn" ng-click="search()"><i class="fa fa-search transition"></i> </button>
                    </form>
                </div>
            </div>

            <div class="nav-button-wrap">
                <div class="nav-button">
                    <span></span><span></span><span></span>
                </div>
            </div>

            <style>
                /* Màu khi hover */
                .nav-holder.main-menu a:hover { color: #fff1f2; }

                /* Gạch chân chạy cho menu cấp 1 */
                .nav-holder.main-menu > nav > ul > li > a{
                    position: relative;
                    text-decoration: none;
                    transition: color .2s ease;
                }
                .nav-holder.main-menu > nav > ul > li > a::after{
                    content:"";
                    position:absolute;
                    left:0; right:0; bottom:-2px;
                    height:2px;                /* chỉ là hiệu ứng, không đổi layout */
                    background: currentColor;  /* cùng màu chữ khi hover */
                    transform: scaleX(0);
                    transform-origin: left;
                    transition: transform .25s ease;
                }
                .nav-holder.main-menu > nav > ul > li:hover > a::after,
                .nav-holder.main-menu > nav > ul > li > a:focus-visible::after{
                    transform: scaleX(1);
                }

                /* Gạch chân cho item trong submenu */
                .nav-holder.main-menu li > ul a{
                    position: relative;
                    text-decoration: none;
                    transition: color .2s ease;
                }
                .nav-holder.main-menu li > ul a:hover{
                    color:#d32027;
                }
                .nav-holder.main-menu li > ul a::after{
                    content:"";
                    position:absolute;
                    left:0; right:0; bottom:-2px;
                    height:2px;
                    background: currentColor;
                    transform: scaleX(0);
                    transform-origin: left;
                    transition: transform .25s ease;
                }
                .nav-holder.main-menu li > ul a:hover::after,
                .nav-holder.main-menu li > ul a:focus-visible::after{
                    transform: scaleX(1);
                }

                /* (Tùy chọn) xoay caret khi hover mục có submenu */
                .nav-holder.main-menu .fa-caret-down{ transition: transform .2s ease; }
                .nav-holder.main-menu li:hover > a .fa-caret-down{ transform: rotate(180deg); }

            </style>
            <!-- nav-button-wrap end-->
            <!--  navigation -->
            <div class="nav-holder main-menu">
                <nav>
                    <ul>
                        <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                        <li>
                            <a href="#" class="act-link">Giới thiệu<i class="fas fa-caret-down"></i></a>
                            <ul>
                                <li><a href="{{ route('front.sumenh') }}">Về cơ quan chủ quản</a></li>
                                <li><a href="{{ route('front.tochuc') }}">Về tạp chí</a></li>
                            </ul>
                        </li>
                        @foreach($postsCategory as $postCategory)
                            @if($postCategory->childs->count())
                                <li>
                                    <a href="{{ route('front.blogs', $postCategory->slug) }}" class="act-link">{{ $postCategory->name }}<i class="fas fa-caret-down"></i></a>
                                    <ul>
                                        @foreach($postCategory->childs as $child)
                                            <li><a href="{{ route('front.blogs', $child->slug) }}">{{ $child->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li><a href="{{ route('front.blogs', $postCategory->slug) }}">{{ $postCategory->name }}</a></li>
                            @endif

                        @endforeach
                        <li><a href="{{ route('front.huongdanguibai') }}">Hướng dẫn nộp bài</a></li>

                    </ul>







                </nav>
            </div>
            <!-- navigation  end -->
        </div>
    </div>


    <script>
        (function(){
            const chip = document.getElementById('userChip');
            const menu = document.getElementById('userDropdown');

            function closeMenu(){
                menu.classList.remove('show');
                chip.setAttribute('aria-expanded','false');
            }
            function openMenu(){
                menu.classList.add('show');
                chip.setAttribute('aria-expanded','true');
            }

            chip.addEventListener('click', function(e){
                e.stopPropagation();
                menu.classList.contains('show') ? closeMenu() : openMenu();
            });

            document.addEventListener('click', function(){ closeMenu(); });
            document.addEventListener('keydown', function(e){
                if(e.key === 'Escape') closeMenu();
            });

            // (Tùy chọn) tạo avatar theo ký tự đầu của tên nếu bạn set data-name
            const wrap = document.getElementById('userMenu');
            if(wrap){
                const name = (wrap.dataset.name || '').trim();
                const first = name ? name[0].toUpperCase() : 'N';
                const av = wrap.querySelector('.avatar');
                if(av && !av.textContent.trim()) av.textContent = first;
            }
        })();
    </script>


</header>
