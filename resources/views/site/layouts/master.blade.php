<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    @include('site.partials.head')
    @yield('css')
</head>

<body ng-app="App">


<div id="main">
    <!-- progress-bar  -->
    <div class="progress-bar-wrap">
        <div class="progress-bar color-bg"></div>
    </div>
    <div id="translate_select"></div>

    @include('site.partials.header')

    <div id="wrapper">
        @yield('content')

        @include('site.partials.footer')

    </div>



    <!-- cookie-info-bar end -->
    <!--register form -->
    <div class="main-register-container" ng-controller="registerForm">
        <div class="reg-overlay close-reg-form"></div>
        <div class="main-register-holder">
            <div class="main-register-wrap fl-wrap">
                <div class="main-register_bg">
                    <div class="bg-wrap">
                        <div class="bg par-elem "  data-bg="/site/images/bg/1.jpg"></div>
                        <div class="overlay"></div>
                    </div>
                    <div class="mg_logo"><img src="/site/images/logo2.png" alt=""></div>
                </div>
                <div class="main-register tabs-act fl-wrap">
                    <ul class="tabs-menu">
                        <li class="current"><a href="#tab-1"><i class="fal fa-sign-in-alt"></i> Đăng nhập</a></li>
                        <li><a href="#tab-2"><i class="fal fa-user-plus"></i> Đăng ký</a></li>
                    </ul>
                    <div class="close-modal close-reg-form"><i class="fal fa-times"></i></div>
                    <!--tabs -->
                    <div id="tabs-container">
                        <div class="tab">
                            <!--tab -->
                            <div id="tab-1" class="tab-content first-tab">
                                <div class="custom-form">
                                    <form name="registerform" id="form-login">
                                        <label>Email<span>*</span> </label>
                                        <input name="email" type="text" onClick="this.select()" value="">
                                        <div class="invalid-feedback d-block error" role="alert">
                                                            <span ng-if="errorsLogin && errorsLogin['email']">
                                                                <% errorsLogin['email'][0] %>
                                                            </span>
                                        </div>

                                        <label>Mật khẩu <span>*</span> </label>
                                        <input name="password" type="password" onClick="this.select()" value="">
                                        <div class="invalid-feedback d-block error" role="alert">
                                                            <span ng-if="errorsLogin && errorsLogin['password']">
                                                                <% errorsLogin['password'][0] %>
                                                            </span>
                                        </div>

                                        <div class="filter-tags">
                                            <input id="check-a" type="checkbox" name="check" checked>
                                            <label for="check-a">Nhớ tài khoản</label>
                                        </div>
{{--                                        <div class="lost_password">--}}
{{--                                            <a href="#">Lost Your Password?</a>--}}
{{--                                        </div>--}}
                                        <div class="clearfix"></div>
                                        <button type="button" class="log-submit-btn color-bg" ng-click="submitLogin()"><span>Đăng nhập</span></button>
                                    </form>
                                </div>
                            </div>
                            <!--tab end -->
                            <!--tab -->
                            <div class="tab">
                                <div id="tab-2" class="tab-content">
                                    <div class="custom-form">
                                        <form name="registerform" id="form-register" class="main-register-form" id="main-register-form2">
                                            <label>Họ tên <span>*</span> </label>
                                            <input name="fullname" type="text" onClick="this.select()" value="">
                                            <div class="invalid-feedback d-block error" role="alert">
                                                            <span ng-if="errors && errors['fullname']">
                                                                <% errors['fullname'][0] %>
                                                            </span>
                                            </div>

                                            <label>Email <span>*</span></label>
                                            <input name="email" type="text" onClick="this.select()" value="">
                                            <div class="invalid-feedback d-block error" role="alert">
                                                            <span ng-if="errors && errors['email']">
                                                                <% errors['email'][0] %>
                                                            </span>
                                            </div>

                                            <label>Mật khẩu  <span>*</span></label>
                                            <input name="password" type="password" onClick="this.select()" value="">
                                            <div class="invalid-feedback d-block error" role="alert">
                                                            <span ng-if="errors && errors['password']">
                                                                <% errors['password'][0] %>
                                                            </span>
                                            </div>

                                            <label>Nhập lại mật khẩu  <span>*</span></label>
                                            <input name="password-rep" type="password" onClick="this.select()" value="">
                                            <div class="invalid-feedback d-block error" role="alert">
                                                            <span ng-if="errors && errors['password-rep']">
                                                                <% errors['password-rep'][0] %>
                                                            </span>
                                            </div>

                                            <button type="button" class="log-submit-btn color-bg" ng-click="registerSubmit()"><span>Đăng ký</span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--tab end -->
                        </div>
                        <!--tabs end -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    :root{
        /* kích thước nút: tự co theo viewport nhưng không nhỏ quá */
        --fab-size: clamp(48px, 8vw, 64px);
        --fab-shadow: 0 8px 24px rgba(0,0,0,.18);
        --fab-bg: #27408B;
        --fab-bg-hover: #0e2567;
        --fab-ink: #fff;
        --fab-z: 2147483000; /* cao hơn hầu hết layer */
    }
    .contrib-fab{
        position: fixed;
        width: var(--fab-size);
        height: var(--fab-size);
        bottom: max(16px, env(safe-area-inset-bottom));
        right:  max(16px, env(safe-area-inset-right));
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 999px;
        background: var(--fab-bg);
        color: var(--fab-ink);
        text-decoration: none;
        box-shadow: var(--fab-shadow);
        z-index: var(--fab-z);
        user-select: none;
        -webkit-tap-highlight-color: transparent;
        touch-action: none; /* quan trọng để kéo mượt trên mobile */
        transition: transform .15s ease, background .15s ease, box-shadow .15s ease;
    }
    .contrib-fab:hover{ background: var(--fab-bg-hover); transform: translateY(-1px); }
    .contrib-fab:active{ transform: scale(.98); }
    .contrib-fab i{ font-size: calc(var(--fab-size) * .45); line-height: 1; }

    /* viền mảnh khi tab vào bằng bàn phím */
    .contrib-fab:focus-visible{
        outline: 3px solid rgba(95,39,205,.35);
        outline-offset: 2px;
    }

    /* Trên mobile màn nhỏ, bù thêm khoảng cách cho ngón tay */
    @media (max-width: 480px){
        .contrib-fab{
            bottom: max(12px, env(safe-area-inset-bottom));
            right:  max(12px, env(safe-area-inset-right));
        }
    }
</style>

<a id="contrib-fab"
   class="contrib-fab"
   href="{{ route('front.sendPost') }}"
   aria-label="Đóng góp bài viết"
   title="Đóng góp bài viết">
    <i class="fas fa-feather-alt" style="color: #fff !important;"></i>
</a>

<script src="/site/js/jquery.min.js"></script>
<script src="/site/js/plugins.js"></script>
<script src="/site/js/scripts.js"></script>

    <script>
        var CSRF_TOKEN = "{{ csrf_token() }}";
        window.USER_AVATAR_URL = "{{ $customer->avatar->path ?? '/site/img/user.png' }}";
    </script>

    @include('site.partials.angular_mix')


    <script>
        app.controller('registerForm', function ($rootScope, $scope, $interval) {
            $scope.errors = [];
            $scope.errorsLogin = [];
            $scope.registerSubmit = function () {
                var url = "{{route('front.submitRegister')}}";
                var data = jQuery('#form-register').serialize();
                $scope.loading = true;
                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: data,
                    success: function (response) {
                        if (response.success) {
                            toastr.success(response.message);
                            jQuery('#form-register')[0].reset();
                            window.location.href = response.redirect_url;
                            $scope.errors = [];
                        } else {
                            $scope.errors = response.errors;
                            toastr.error(response.message);
                        }
                    },
                    error: function () {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.loading = false;
                        $scope.$apply();
                    }
                });
            }

            $scope.submitLogin = function () {
                var url = "{{route('front.submitLogin')}}";
                var data = jQuery('#form-login').serialize();
                $scope.loading = true;
                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: data,
                    success: function (response) {
                        if (response.success) {
                            toastr.success(response.message);
                            window.location.href = response.redirect_url;
                            $scope.errorsLogin = [];
                        } else {
                            $scope.errorsLogin = response.errors;
                            toastr.warning(response.message);
                        }
                    },
                    error: function () {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.loading = false;
                        $scope.$apply();
                    }
                });
            }

        })
    </script>

    <script>
        app.controller('headerPartial', function ($rootScope, $scope, $interval, $window) {
            $scope.avatarPreviewUrl = window.USER_AVATAR_URL;

            $scope.search = function () {
                if (!$scope.keywords || !$scope.keywords.trim()) {
                    alert('Vui lòng nhập từ khóa tìm kiếm!');
                    return;
                }

                // Xây URL cơ bản
                var url = '/tim-kiem?keywords=' + encodeURIComponent($scope.keywords.trim());

                // Điều hướng
                $window.location.href = url;
            };

            $('.btn-logout').on('click', function(e){
                e.preventDefault();

                $.ajax({
                    url: '{{ route("front.logout") }}',
                    type: 'POST',
                    data: {
                        _token: CSRF_TOKEN
                    },
                    success: function() {
                        window.location.href = '{{ route("front.home-page") }}';
                    },
                    error: function() {
                        window.location.href = '{{ route("front.home-page") }}';
                    }
                });
            });


        });




    </script>

    <script>
        function translateheader(lang) {
            var sel = document.querySelector("select.goog-te-combo");
            if (!sel) {
                // Nếu chưa có, thử lại sau 100ms
                return setTimeout(function() {
                    translateheader(lang);
                }, 100);
            }

            // 1) Gán giá trị
            sel.value = lang;

            // 2) Tạo event theo chuẩn cũ (HTMLEvents)
            var evOld = document.createEvent("HTMLEvents");
            evOld.initEvent("change", true, true);
            sel.dispatchEvent(evOld);

            // 3) Tạo event theo chuẩn mới (Event constructor)
            var evNew = new Event("change", { bubbles: true, cancelable: true });
            sel.dispatchEvent(evNew);
        }

    </script>
    <script>
        // Đổi trạng thái active cho nút
        function setActiveLang(lang) {
            document.querySelectorAll('.lang-toggle [data-lang]').forEach(function(btn){
                btn.classList.toggle('on', btn.getAttribute('data-lang') === lang);
            });
        }

        // Ghi đè nhẹ vào hàm bạn đang dùng: sau khi dịch xong thì lưu + set active
        (function(){
            var _origTranslate = translateheader;
            window.translateheader = function(lang){
                _origTranslate(lang);                 // giữ nguyên logic dịch của bạn
                try { localStorage.setItem('site_lang', lang); } catch(e){}
                setActiveLang(lang);                  // cập nhật nút active
            };
        })();

        // Khi load lại trang
        document.addEventListener('DOMContentLoaded', function(){
            var saved = 'vi';
            try {
                var s = localStorage.getItem('site_lang');
                if (s) saved = s;                    // nếu chưa có thì mặc định 'vi'
            } catch(e){}

            setActiveLang(saved);                  // hiển thị nút active đúng
            if (saved !== 'vi') {
                // Nếu lần trước chọn EN thì gọi lại để dịch ngay
                translateheader(saved);
            }
        });
    </script>


<script>
    (function(){
        var fab = document.getElementById('contrib-fab');
        if (!fab) return;

        var storageKey = 'contrib_fab_pos_v1';
        var state = {
            dragging: false,
            startX: 0, startY: 0,
            elX: 0, elY: 0,
            moved: false,
            suppressNextClick: false
        };

        // Khôi phục vị trí đã lưu
        try {
            var saved = JSON.parse(localStorage.getItem(storageKey) || 'null');
            if (saved && typeof saved.x === 'number' && typeof saved.y === 'number') {
                setFabPosition(saved.x, saved.y);
            }
        } catch(e){}

        // CHẶN CLICK nếu vừa kéo
        fab.addEventListener('click', function(e){
            if (state.suppressNextClick) {
                e.preventDefault();
                e.stopPropagation();
                state.suppressNextClick = false; // reset
            }
            // nếu không suppress -> để mặc định <a> tự điều hướng
        }, true); // capture sớm để chặn chắc

        // Chuột & cảm ứng
        fab.addEventListener('mousedown', onStart);
        fab.addEventListener('touchstart', onStart, {passive:false});

        window.addEventListener('mousemove', onMove, {passive:false});
        window.addEventListener('touchmove', onMove, {passive:false});

        window.addEventListener('mouseup', onEnd);
        window.addEventListener('touchend', onEnd);
        window.addEventListener('touchcancel', onEnd);

        fab.addEventListener('dragstart', function(e){ e.preventDefault(); }, false);

        function onStart(e){
            state.dragging = true;
            state.moved = false;

            var p = getPoint(e);
            state.startX = p.x;
            state.startY = p.y;

            var rect = fab.getBoundingClientRect();
            state.elX = rect.left;
            state.elY = rect.top;

            // Đừng preventDefault ở đây cho chuột; với cảm ứng ta sẽ chặn trong onMove
        }

        function onMove(e){
            if (!state.dragging) return;

            var p = getPoint(e);
            var dx = p.x - state.startX;
            var dy = p.y - state.startY;

            // Ngưỡng lớn hơn để tránh “tap lệch tay”
            var THRESH = 8;
            if (Math.abs(dx) > THRESH || Math.abs(dy) > THRESH) state.moved = true;

            if (state.moved) {
                // Khi đã kéo, chặn cuộn trang (đặc biệt mobile)
                e.preventDefault();

                var bounds = getBounds();
                var newX = clamp(state.elX + dx, bounds.minX, bounds.maxX);
                var newY = clamp(state.elY + dy, bounds.minY, bounds.maxY);
                setFabPosition(newX, newY);
            }
        }

        function onEnd(e){
            if (!state.dragging) return;
            state.dragging = false;

            if (state.moved) {
                // Lưu vị trí & chặn click ngay sau khi kéo
                var rect = fab.getBoundingClientRect();
                savePosition(rect.left, rect.top);
                state.suppressNextClick = true;
                // Không điều hướng
            } else {
                // Không kéo: cho click mặc định của <a> chạy (không đụng window.location)
                state.suppressNextClick = false;
            }
        }

        function setFabPosition(x, y){
            fab.style.left = '0px';
            fab.style.top = '0px';
            fab.style.right = 'auto';
            fab.style.bottom = 'auto';
            fab.style.transform = 'translate3d(' + Math.round(x) + 'px,' + Math.round(y) + 'px,0)';
        }

        function savePosition(x, y){
            try { localStorage.setItem(storageKey, JSON.stringify({ x: Math.round(x), y: Math.round(y) })); } catch(e){}
        }

        function getBounds(){
            var vw = window.innerWidth, vh = window.innerHeight;
            var size = parseFloat(getComputedStyle(fab).width) || 56;
            var margin = 8;
            return {
                minX: margin,
                minY: margin,
                maxX: vw - size - margin,
                maxY: vh - size - margin
            };
        }

        function getPoint(e){
            if (e.touches && e.touches[0]) return { x: e.touches[0].clientX, y: e.touches[0].clientY };
            return { x: e.clientX, y: e.clientY };
        }

        function clamp(v, a, b){ return Math.min(b, Math.max(a, v)); }

        // Giữ nút trong khung khi resize
        window.addEventListener('resize', function(){
            var rect = fab.getBoundingClientRect();
            var b = getBounds();
            var x = clamp(rect.left, b.minX, b.maxX);
            var y = clamp(rect.top,  b.minY, b.maxY);
            setFabPosition(x, y);
            savePosition(x, y);
        });
    })();
</script>

<script type="text/javascript"
            src="/site/js/elementa0d8.js?cb=googleTranslateElementInit">
    </script>
    @stack('scripts')
</body>

</html>
