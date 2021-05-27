<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <!-- datepickerのCSSとjQuery -->
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>

    <!-- カレンダーの日本語化 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js" type="text/javascript"></script>
</head>
<body>
    
<header>
    <div>
        <a href="/calendar"><img src="{{asset('/assets/img/Space-1.png')}}"></a>
        <p class="display-none">〒000-0000<br>大阪府大阪市○○町1-2-3</p>
        <p class="display-none">TEL<br><span class="orange">012-3456-7890</span></p>
    </div>
    @yield('login-button')
</header>
    
@yield('fast-view')

@yield('top-page')
    
<div id="content">
    @yield('content')
</div>
    
<footer>
    <img src="{{asset('/assets/img/Space-1.png')}}">
    <ul>
        <li><i class="fab fa-twitter"></i><span>Twitter</span></li>
        <li><i class="fab fa-facebook"></i><span>Facebook</span></li>
        <li><i class="fab fa-instagram"></i><span>Instagram</span></li>
    </ul>
</footer>
@yield('script')
</body>
</html>