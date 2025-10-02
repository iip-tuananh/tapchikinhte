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
                left: -8px !important; /* ISSN */
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

    </style>
    <!-- top bar -->
    <div class="top-bar fl-wrap">
        <div class="top-bar-container">
            <div class="logo-header">
                <!-- logo holder  -->
{{--                <a href="" class="logo-holder"><img src="/site/images/logo1.png" alt=""></a>--}}
                <a href="{{ route('front.home-page') }}" class="logo-holder"><img src="{{ $config->image->path ?? '' }}" alt=""></a>
{{--                <div class="left-header-sub-iso">--}}
{{--                    ISSN: 0868 - 3808--}}
{{--                </div>--}}
            </div>
            <div class="left-header text-center">
                <div class="left-header-title">
                    TRUNG TÂM KINH TẾ CHÂU Á - <br>THÁI BÌNH DƯƠNG <br>

                </div>
                <div class="left-header-title">
                    Vietnam Asia-Pacific Economic Center
                </div>

                <!-- <div class="left-header-sub-iso">
                   ISSN: 0868 - 3808
                </div> -->
            </div>
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
                left: -18px;
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
