<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="/site/css/plugins.css">
    <link type="text/css" rel="stylesheet" href="/site/css/style.css?v=2.1">
    <link type="text/css" rel="stylesheet" href="/site/css/color.css">
    <!--=============== favicons ===============-->
    <link rel="shortcut icon" type="image/x-icon" href="{{@$config->favicon->path ?? ''}}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{@$config->favicon->path ?? ''}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{@$config->favicon->path ?? ''}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{@$config->favicon->path ?? ''}}">

    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow">
    <meta name="revisit-after" content="1 days" />
    <meta name="generator" content="@yield('title')" />
    <meta name="rating" content="General">
    <meta name="application-name" content="{{ $config->web_title }}" />
    <meta name="theme-color" content="#ed3235" />
    <meta name="msapplication-TileColor" content="#ed3235" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-title" content="index.html" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="@yield('image')">
    <meta property="og:site_name" content="{{ url()->current() }}">
    <meta property="og:image:alt" content="{{ $config->web_title }}">
    <meta itemprop="description" content="@yield('description')">
    <meta itemprop="image" content="@yield('image')">
    <meta itemprop="url" content="{{ url()->current() }}">

    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="{{ url()->current() }}" />

    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'vi',includedLanguages:'en,hi,vi,zh-CN', }, 'translate_select');
        }
    </script>
    <style>
        .VIpgJd-ZVi9od-aZ2wEe-wOHMyf-ti6hGc {
            display: none !important;
        }
        #goog-gt-tt {
            display: none !important;
        }
        .skiptranslate{
            display: none;
            top: 0;
        }
        .goog-te-banner-frame{display: none !important;}
        .goog-text-highlight { background: none !important; box-shadow: none !important;}
        .goog-te-banner-frame.skiptranslate {
            display: none !important;
        }
        body {
            position: revert!important;
            top: 0px !important;
        }
    </style>

    <style>
        /* Ẩn mọi phần tử có ng-cloak cho tới khi Angular biên dịch xong */
        [ng-cloak], [data-ng-cloak], [x-ng-cloak],
        .ng-cloak, .data-ng-cloak, .x-ng-cloak {
            display: none !important;
        }

        .invalid-feedback {
            color: #dc3545;
        }
    </style>

</head>
