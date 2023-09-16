<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{config('app.name')}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Simagro , Agriculture , Projet agricole" name="keywords">
    <meta content="Simagro est une entreprise qui fait dans les projets agricoles" name="description">
    <meta property="og:title" content="Simagro Sarl" />
    <meta property="og:site_name" content="Simagro Sarl" />
    <meta property="og:url" content="https://simagro.cm" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Confie vos projets aux expert" />
    <meta property="og:image" content="https://simagro.onrender.com/favicon.jpg" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <!-- Favicon -->
    <link href="{{asset('favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
{{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{asset('fonts/font-awesome/css/font-awesome.css')}}">
    <!-- Libraries Stylesheet -->
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body>
@routes
<!-- Spinner Start -->
<x-ui.spinner/>
<!-- Spinner End -->
<!-- Topbar Start -->
@if(View::hasSection("ui-topbar") and !View::hasSection("no-ui-topbar"))
    @yield("ui-topbar")
@else
    <x-ui.top-bar/>
@endif
<!-- Topbar End -->

<!-- Navbar & Carousel Start -->
<div class="container-fluid position-relative p-0">
    @include("_partials.nav")
    @if(View::hasSection("header-carousel"))
        @yield("header-carousel")
    @else
        @include("_partials.header-carousel")
    @endif

</div>
<!-- Navbar & Carousel End -->


<!-- Full Screen Search Start -->
<x-ui.search-fullscreen/>
<!-- Full Screen Search End -->

@yield("content")



<!-- Footer Start -->
@include("_partials.footer")
<!-- Footer End -->


<!-- Back to Top -->
<x-ui.back-to-top/>


<!-- JavaScript Libraries -->
<script src="{{asset('lib/jquery/jquery.min.js')}}"></script>
<script src="{{asset('lib/bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('lib/wow/wow.min.js')}}"></script>
<script src="{{asset('lib/easing/easing.min.js')}}"></script>
<script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('lib/counterup/counterup.min.js')}}"></script>
<script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('js/main.js')}}"></script>
</body>

</html>
