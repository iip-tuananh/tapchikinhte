@extends('site.layouts.master')
@section('title')Liên hệ - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->image->path ?? ''}}@endsection

@section('css')

    <style>
        .apc-flip-wrap{display:flex;justify-content:center;margin:8px 0}
        .apc-flip{width:100%;max-width:1100px;height:70vh;min-height:420px}
        .apc-pager{display:flex;justify-content:center;gap:12px;margin:8px 0}
        .apc-btn{padding:8px 12px;border-radius:999px;border:1px solid #ddd;background:#fff;cursor:pointer}
        .apc-pill{padding:6px 10px;border-radius:999px;background:#f3f3f3;font-weight:600}
        .apc-hint{text-align:center;color:#666;margin-top:6px}
        @media (max-width:768px){ .apc-flip{height:65vh} }
    </style>

    <style>
        .apc-flip-wrap{display:flex;justify-content:center;margin:8px 0}
        .apc-zoom-viewport{
            width:100%; max-width:1100px; height:70vh; min-height:420px;
            overflow:hidden; position:relative; background:transparent;
            border-radius:8px;
        }
        .apc-zoom-canvas{
            width:100%; height:100%;
            transform-origin: 0 0;           /* scale & translate từ góc trái trên */
            will-change: transform;
            cursor: default;
        }
        .apc-flip{width:100%; height:100%}

        /* Khi đang zoom > 1, đổi cursor để gợi ý kéo */
        .apc-zooming .apc-zoom-canvas{ cursor: grab; }
        .apc-zooming .apc-zoom-canvas.apc-panning{ cursor: grabbing; }

        /* Toolbar */
        .apc-toolbar{display:flex;justify-content:center;align-items:center;gap:12px;margin:10px 0 4px}
        .apc-btn{
            padding:8px 12px;border-radius:999px;border:1px solid #ddd;background:#fff;
            cursor:pointer; line-height:1; font-size:14px
        }
        .apc-btn-ghost{ background:#f8f8f8; border-color:#e3e3e3 }
        .apc-zoom-group{display:flex;align-items:center;gap:8px}
        .apc-zoom-range{ width:160px }
        .apc-zoom-label{font-weight:600; min-width:38px; text-align:right}

        /* Mobile */
        @media (max-width:768px){
            .apc-zoom-viewport{height:65vh}
            .apc-zoom-range{ width:120px }
        }
    </style>

    <style>
        /* Overlay */
        .apc-loader{
            position:absolute; inset:0; z-index:10;
            display:flex; flex-direction:column; align-items:center; justify-content:center;
            background:rgba(0,0,0,.35); backdrop-filter:saturate(140%) blur(1px);
            text-align:center; padding:16px;
        }
        .apc-loader-text{ color:#fff; margin:12px 0 10px; font-size:14px }

        /* Spinner */
        .apc-spinner{
            width:42px; height:42px; border-radius:50%;
            border:3px solid rgba(255,255,255,.35);
            border-top-color:#fff; animation:apc-spin 0.9s linear infinite;
        }
        @keyframes apc-spin{ to { transform: rotate(360deg) } }

        /* Progress bar */
        .apc-progress{
            width:min(520px, 80%); height:8px; border-radius:999px;
            background:rgba(255,255,255,.25); overflow:hidden;
            box-shadow: inset 0 0 0 1px rgba(255,255,255,.25);
        }
        .apc-progress-bar{
            height:100%; width:0%;
            background:linear-gradient(90deg, #7ec8ff, #4aa3ff);
            transition: width .25s ease;
        }
    </style>

    <style>
        /* ——— Khoảng cách tổng thể & container ——— */
        .apc-doc{
            /* tạo “khoảng thở” với lề trên/dưới */
            padding-block: clamp(16px, 4vw, 36px);
        }
        .apc-flip-wrap{
            display:flex; justify-content:center;
            /* thêm khoảng trống riêng cho khối xem */
            margin-block: clamp(8px, 2vw, 20px);
        }

        /* ——— Khung xem (card) rộng & thoáng ——— */
        .apc-zoom-viewport{
            width: min(1400px, 100% - clamp(24px, 6vw, 64px));
            /* cao linh hoạt theo viewport, không quá thấp */
            height: clamp(56vh, 72vh, 80vh);
            min-height: 420px;

            /* card thoáng */
            background: rgba(255,255,255,0.96);
            border-radius: 12px;
            box-shadow: 0 10px 26px rgba(0,0,0,0.08);
            overflow: hidden;               /* giữ sạch viền khi zoom */
            position: relative;             /* cho loader overlay */
            padding: clamp(8px, 1.2vw, 16px);
        }

        /* vùng canvas/flip chiếm hết trong card */
        .apc-zoom-canvas{ width:100%; height:100%; transform-origin:0 0; }

        /* ——— Toolbar thoáng & canh giữa ——— */
        .apc-toolbar{
            display:flex; align-items:center; justify-content:center;
            flex-wrap: wrap;
            gap: 12px clamp(10px, 2vw, 18px);
            margin-block: clamp(12px, 2.5vw, 22px);
        }
        .apc-btn{
            padding: 8px 12px;
            border-radius: 999px;
            border: 1px solid #e5e7eb;      /* xám nhạt */
            background: #fff;
            box-shadow: 0 1px 2px rgba(0,0,0,.04);
        }
        .apc-btn-ghost{
            background:#f8f9fb; border-color:#e9edf1;
        }
        .apc-zoom-group{ display:flex; align-items:center; gap: 8px }
        .apc-zoom-range{ width: clamp(120px, 22vw, 220px) }
        .apc-zoom-label{ font-weight:600; min-width:38px; text-align:right }

        /* ——— Loader overlay ——— */
        .apc-loader{
            position:absolute; inset:0; z-index:10;
            display:flex; flex-direction:column; align-items:center; justify-content:center;
            background: rgba(0,0,0,.35); backdrop-filter: saturate(140%) blur(1px);
            text-align:center; padding:16px;
        }
        .apc-loader-text{ color:#fff; margin:12px 0 10px; font-size:14px }
        .apc-spinner{
            width:42px; height:42px; border-radius:50%;
            border:3px solid rgba(255,255,255,.35);
            border-top-color:#fff; animation: apc-spin .9s linear infinite;
        }
        @keyframes apc-spin{ to{ transform: rotate(360deg) } }
        .apc-progress{
            width:min(520px, 80%); height:8px; border-radius:999px;
            background:rgba(255,255,255,.25); overflow:hidden;
            box-shadow: inset 0 0 0 1px rgba(255,255,255,.25);
        }
        .apc-progress-bar{
            height:100%; width:0%;
            background:linear-gradient(90deg,#7ec8ff,#4aa3ff);
            transition: width .25s ease;
        }

        /* ——— Mobile tinh chỉnh ——— */
        @media (max-width: 768px){
            .apc-zoom-viewport{
                width: calc(100% - 24px);
                height: 65vh;
                padding: 10px;
                border-radius: 10px;
            }
            .apc-toolbar{ gap: 10px 12px; }
            .apc-zoom-range{ width: clamp(120px, 40vw, 160px) }
        }
    </style>
@endsection

@section('content')
    <div class="content apc-doc" ng-controller="AboutPage as vm" style="margin-top: 100px">
        <div class="apc-flip-wrap">
            <div class="apc-zoom-viewport" id="apcZoomViewport">
                <!-- LOADER OVERLAY -->
                <div class="apc-loader" ng-if="vm.loading" aria-live="polite">
                    <div class="apc-spinner" aria-hidden="true"></div>
                    <div class="apc-loader-text">Đang tải tệp tin. Vui lòng đợi… <strong><% vm.progress %>%</strong></div>
                    <div class="apc-progress">
                        <div class="apc-progress-bar" ng-style="{width: (vm.progress || 0) + '%'}"></div>
                    </div>
                </div>

                <div class="apc-zoom-canvas" id="apcZoomCanvas">
                    <div id="flipbook" class="apc-flip"></div>
                </div>
            </div>
        </div>

        <!-- Toolbar -->
        <div class="apc-toolbar" ng-cloak>
            <button class="apc-btn" ng-click="vm.prev()">&larr; Trang trước</button>

            <div class="apc-zoom-group">
                <button class="apc-btn" ng-click="vm.zoomOut()" ng-disabled="vm.zoom<=vm.minZoom">−</button>
                <input class="apc-zoom-range" type="range"
                       min="<% vm.minZoom %>" max="<% vm.maxZoom %>" step="0.05"
                       ng-model="vm.zoom" ng-change="vm.applyZoom()">
                <button class="apc-btn" ng-click="vm.zoomIn()" ng-disabled="vm.zoom>=vm.maxZoom">+</button>
                <button class="apc-btn apc-btn-ghost" ng-click="vm.zoomReset()">Reset</button>
                <span class="apc-zoom-label"><% (vm.zoom * 100) | number:0 %>%</span>

            </div>

            <button class="apc-btn" ng-click="vm.next()">Trang sau &rarr;</button>
        </div>
    </div>

@endsection

@push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/page-flip/dist/js/page-flip.browser.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.10.111/pdf.min.js"></script>


    <script>
        window.pdfjsLib = window['pdfjs-dist/build/pdf'];
        pdfjsLib.GlobalWorkerOptions.workerSrc =
            "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.10.111/pdf.worker.min.js";
    </script>

    <script>

        app.controller('AboutPage', function ($rootScope, $scope, $sce, $interval, $timeout) {
            var vm = this;
            vm.page = 1; vm.total = 1;
            vm.loading = false; vm.progress = 0;
            // tải file PDF về dạng Uint8Array (tự xử lý cookie/redirect)
            async function fetchPdfBytes(url) {
                const res = await fetch(url + (url.includes('?') ? '&' : '?') + 'v=' + Date.now(), {
                    credentials: 'include', cache: 'no-store'
                });
                if (!res.ok) throw new Error('HTTP ' + res.status + ' khi tải PDF');
                const ct = res.headers.get('Content-Type') || '';
                if (!/application\/pdf/i.test(ct)) {
                    const peek = await res.text();
                    throw new Error('Không phải PDF (Content-Type: ' + ct + '). ' + peek.slice(0,120));
                }
                const buf = await res.arrayBuffer();
                if (!buf.byteLength) throw new Error('PDF rỗng (0 bytes)');
                return new Uint8Array(buf);
            }


            // render toàn bộ trang PDF thành dataURL JPEG
            async function pdfToImagesFromBytes(pdfBytes, opts = {}, onProgress) {
                const pdf = await pdfjsLib.getDocument({ data: pdfBytes }).promise;
                const out = [];
                const targetWidth = opts.targetWidth || 1100;
                const quality = opts.quality || 0.9;

                const base = 20; // sau khi mở PDF xong coi như 20%
                onProgress && onProgress(base);

                for (let i = 1; i <= pdf.numPages; i++) {
                    const page = await pdf.getPage(i);
                    const viewport = page.getViewport({ scale: 1 });
                    const scale = targetWidth / viewport.width;
                    const scaled = page.getViewport({ scale });

                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');
                    canvas.width = Math.floor(scaled.width);
                    canvas.height = Math.floor(scaled.height);

                    await page.render({ canvasContext: ctx, viewport: scaled }).promise;

                    out.push(canvas.toDataURL('image/jpeg', quality));
                    page.cleanup(); canvas.width = canvas.height = 0;

                    const p = base + Math.round(i / pdf.numPages * (100 - base)); // 20% -> 100%
                    onProgress && onProgress(Math.min(p, 100));
                }
                try { pdf.cleanup(); } catch(e){}
                return out;
            }


            var flip = null;
            var destroyFlip = function(){
                if (flip) { try { flip.destroy(); } catch(e){} flip = null; }
                var el = document.getElementById('flipbook');
                if (el) el.innerHTML = '';
            };

            // render toàn bộ trang PDF thành dataURL JPEG
            async function pdfToImages(pdfUrl, opts = {}){
                const pdf = await pdfjsLib.getDocument({
                    url: pdfUrl,
                    withCredentials: false,   // nếu file private, set true & bật CORS/cookie
                }).promise;

                const out = [];
                const targetWidth = opts.targetWidth || 1100; // chiều rộng ảnh mong muốn
                const quality = opts.quality || 0.9;          // JPEG quality 0..1

                for (let i=1; i<=pdf.numPages; i++){
                    const page = await pdf.getPage(i);

                    // scale theo targetWidth (giữ tỉ lệ)
                    const viewport = page.getViewport({ scale: 1 });
                    const scale = targetWidth / viewport.width;
                    const scaled = page.getViewport({ scale });

                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d', { willReadFrequently: false });

                    canvas.width = Math.floor(scaled.width);
                    canvas.height = Math.floor(scaled.height);

                    await page.render({ canvasContext: ctx, viewport: scaled }).promise;

                    const dataUrl = canvas.toDataURL('image/jpeg', quality);
                    out.push(dataUrl);

                    // cập nhật progress UI
                    vm.progress = Math.round((i/pdf.numPages)*100);
                    $scope.$applyAsync();

                    // giải phóng
                    page.cleanup();
                    canvas.width = canvas.height = 0;
                }

                try { pdf.cleanup(); } catch(e){}
                return out;
            }

            function initFlipFromSources(sources){
                destroyFlip();

                const el = document.getElementById('flipbook');
                sources.forEach(function(src){
                    const page = document.createElement('div');
                    page.className = 'page';
                    page.innerHTML =
                        '<div class="page-content"><img src="'+src+'" loading="lazy" style="width:100%;height:100%;object-fit:contain"/></div>';
                    el.appendChild(page);
                });

                flip = new St.PageFlip(el, {
                    width: 550, height: 733,      // base size  (tỉ lệ trang)
                    size: 'stretch',              // responsive theo khung .apc-flip
                    minWidth: 315, maxWidth: 2400,
                    minHeight: 400, maxHeight: 3000,
                    maxShadowOpacity: 0.3,
                    showCover: false,
                    mobileScrollSupport: true
                });

                flip.loadFromHTML(document.querySelectorAll('#flipbook .page'));

                flip.on('flip', (e) => {
                    $scope.$applyAsync(function(){ vm.page = e.data + 1; });
                });

                vm.total = flip.getPageCount();
                vm.page  = flip.getCurrentPageIndex() + 1;

                // update kích thước khi resize
                window.addEventListener('resize', function(){ flip && flip.update(); }, { passive:true });
                $scope.$applyAsync();
            }

            vm.next = function(){ flip && flip.flipNext(); };
            vm.prev = function(){ flip && flip.flipPrev(); };

            // Public API: gọi khi có URL PDF
            vm.loadPdf = async function (pdfUrl) {
                vm.loading = true; vm.progress = 0;
                try {
                    vm.progress = 5; $scope.$applyAsync();            // bắt đầu fetch
                    const bytes = await fetchPdfBytes(pdfUrl);
                    vm.progress = 15; $scope.$applyAsync();           // fetched xong

                    const images = await pdfToImagesFromBytes(
                        bytes,
                        { targetWidth: 1400, quality: 0.9 },
                        function (percent) { vm.progress = percent; $scope.$applyAsync(); }
                    );

                    initFlipFromSources(images);                       // khởi tạo flipbook
                    vm.progress = 100; $scope.$applyAsync();
                } catch (e) {
                    console.error(e);
                    toastr.error('Không tải được PDF: ' + (e.message || ''));
                } finally {
                    // cho overlay mờ đi một nhịp cho mượt (tùy thích)
                    setTimeout(function(){
                        vm.loading = false;
                        $scope.$applyAsync();
                    }, 150);
                }
            };
            // DEMO: gọi thử 1 file PDF (đổi URL thành file của bạn)
            vm.loadPdf('/audio/temp.pdf');

            // dọn dẹp khi rời view
            $scope.$on('$destroy', destroyFlip);





            vm.minZoom = 1; vm.maxZoom = 2.5; vm.zoom = 1;

            var viewportEl = null, canvasEl = null;
            var tx = 0, ty = 0;            // translate hiện tại
            var startX = 0, startY = 0;    // vị trí bắt đầu pan
            var isPanning = false;

            function clamp(val, min, max){ return Math.min(max, Math.max(min, val)); }

            vm.applyZoom = function(){
                // khi zoom thay đổi, cần giữ trang trong khung: clamp translate
                const scale = vm.zoom;
                const vp = viewportEl.getBoundingClientRect();
                const contentW = vp.width * scale;
                const contentH = vp.height * scale;

                // biên pan tối đa (không cho kéo ra khỏi viewport)
                const maxX = Math.max(0, contentW - vp.width);
                const maxY = Math.max(0, contentH - vp.height);
                tx = clamp(tx, 0, maxX);
                ty = clamp(ty, 0, maxY);

                canvasEl.style.transform = `translate(${-tx}px, ${-ty}px) scale(${scale})`;

                // bật/tắt chế độ zooming để đổi cursor + khóa click flip
                document.body.classList.toggle('apc-zooming', scale > 1);

                // Khi đang zoom, khóa lật bằng click (chỉ dùng nút Prev/Next)
                const flipRoot = document.getElementById('flipbook');
                if (flipRoot){
                    flipRoot.style.pointerEvents = (scale > 1) ? 'none' : 'auto';
                }
            };

            vm.zoomIn = function(){ vm.zoom = clamp((vm.zoom + 0.15), vm.minZoom, vm.maxZoom); vm.applyZoom(); $scope.$applyAsync(); };
            vm.zoomOut= function(){ vm.zoom = clamp((vm.zoom - 0.15), vm.minZoom, vm.maxZoom); vm.applyZoom(); $scope.$applyAsync(); };
            vm.zoomReset=function(){ vm.zoom = 1; tx = ty = 0; vm.applyZoom(); $scope.$applyAsync(); };

            // Pan bằng chuột (drag) khi đang zoom
            function onDown(e){
                if (vm.zoom <= 1) return;
                isPanning = true;
                canvasEl.classList.add('apc-panning');
                startX = (e.touches ? e.touches[0].clientX : e.clientX) + tx;
                startY = (e.touches ? e.touches[0].clientY : e.clientY) + ty;
                e.preventDefault();
            }
            function onMove(e){
                if (!isPanning) return;
                const vp = viewportEl.getBoundingClientRect();
                const scale = vm.zoom;
                const contentW = vp.width * scale;
                const contentH = vp.height * scale;
                const maxX = Math.max(0, contentW - vp.width);
                const maxY = Math.max(0, contentH - vp.height);
                const cx = (e.touches ? e.touches[0].clientX : e.clientX);
                const cy = (e.touches ? e.touches[0].clientY : e.clientY);
                tx = clamp(startX - cx, 0, maxX);
                ty = clamp(startY - cy, 0, maxY);
                canvasEl.style.transform = `translate(${-tx}px, ${-ty}px) scale(${scale})`;
            }
            function onUp(){ isPanning = false; canvasEl.classList.remove('apc-panning'); }

            // Double click/tap: toggle zoom 1 <-> 1.8 ở tâm click
            function onDblClick(e){
                const vp = viewportEl.getBoundingClientRect();
                const targetZoom = (vm.zoom > 1) ? 1 : 1.8;
                // tính điểm focus để pan vào chỗ double click
                const focusX = (e.clientX - vp.left) + tx;
                const focusY = (e.clientY - vp.top)  + ty;
                const ratio = targetZoom / vm.zoom;
                vm.zoom = clamp(targetZoom, vm.minZoom, vm.maxZoom);
                // scale quanh góc trái, nên translate cần đổi theo tỉ lệ
                tx = focusX * (ratio - 1) + tx;
                ty = focusY * (ratio - 1) + ty;
                vm.applyZoom();
                $scope.$applyAsync();
            }

            // Ctrl + wheel để zoom
            function onWheel(e){
                if (!e.ctrlKey) return; // chỉ zoom khi giữ Ctrl để tránh xung đột scroll
                e.preventDefault();
                const delta = (e.deltaY > 0 ? -0.15 : 0.15);
                vm.zoom = clamp(vm.zoom + delta, vm.minZoom, vm.maxZoom);
                vm.applyZoom();
                $scope.$applyAsync();
            }

            // Khởi tạo sau khi DOM có viewport/canvas
            $timeout(function(){
                viewportEl = document.getElementById('apcZoomViewport');
                canvasEl   = document.getElementById('apcZoomCanvas');

                if (viewportEl && canvasEl){
                    // Mouse
                    viewportEl.addEventListener('mousedown', onDown);
                    window.addEventListener('mousemove', onMove);
                    window.addEventListener('mouseup', onUp);
                    viewportEl.addEventListener('dblclick', onDblClick);
                    viewportEl.addEventListener('wheel', onWheel, { passive:false });

                    // Touch
                    viewportEl.addEventListener('touchstart', onDown, { passive:false });
                    window.addEventListener('touchmove', onMove, { passive:false });
                    window.addEventListener('touchend', onUp);
                }
            }, 0);

            // Cleanup
            $scope.$on('$destroy', function(){
                window.removeEventListener('mousemove', onMove);
                window.removeEventListener('mouseup', onUp);
                window.removeEventListener('touchmove', onMove);
                window.removeEventListener('touchend', onUp);
                if (viewportEl){
                    viewportEl.removeEventListener('mousedown', onDown);
                    viewportEl.removeEventListener('dblclick', onDblClick);
                    viewportEl.removeEventListener('wheel', onWheel);
                    viewportEl.removeEventListener('touchstart', onDown);
                }
            });
        })

    </script>
@endpush
