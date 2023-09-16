<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{config('site.description')}}">
    <meta name="author" content="{{config('site.author.name')}}">
    <meta name="keywords" content="{{config('site.keys')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{asset('_kitadmin/img/icons/icon-48x48.png')}}"/>
    <title>{{config('app.name')}}</title>
{{--    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">--}}
    @stack("stylesheets")
    <link href="{{asset('_kitadmin/css/app.css')}}" rel="stylesheet">

</head>

<body>
<div class="wrapper">
    @if(View::hasSection("sidebar"))
        @yield("sidebar")
    @else
        @includeIf("layouts.kitadmin._partials.sidebar")
    @endif


    <div class="main">
        @if(View::hasSection("navbar"))
            @yield("navbar")
        @else
            @include("layouts.kitadmin._partials.navbar")
        @endif

        <main class="content">
            @yield("content")
        </main>

        @if(View::hasSection("footer"))
            @yield("footer")
        @else
            @include("layouts.kitadmin._partials.footer")
        @endif
    </div>
</div>

<script type="text/javascript" src="{{ asset('lib/jquery/jquery.min.js') }} "></script>
@stack("scripts")
<script src="{{asset('_kitadmin/js/app.js')}}"></script>
</body>

</html>
