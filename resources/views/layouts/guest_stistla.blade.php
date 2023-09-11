<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('stisla/assets/modules/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('stisla/assets/modules/izitoast/css/iziToast.min.css')}}">

    <!-- font-awesome-n -->
{{--	<link rel="stylesheet" type="text/css" href="{{ asset('stisla/assets/modules/fontawesome/css/all.css') }}">--}}
	<!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('stisla/assets/modules/jquery-selectric/selectric.css')}}">
    @stack("stylesheets")
    <link rel="stylesheet" href="{{asset('stisla/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('stisla/assets/css/components.css')}}">
	<!-- Start GA -->

</head>

<body>
<div id="app">
	{{$slot}}
</div>

<!-- General JS Scripts -->
{{--<script src="{{ asset('js/app.js') }}"></script>--}}

<script src="{{asset('stisla/assets/modules/jquery.min.js')}}"></script>
<script src="{{asset('stisla/assets/modules/popper.js')}}"></script>
<script src="{{asset('stisla/assets/modules/tooltip.js')}}"></script>
<script src="{{asset('stisla/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('stisla/assets/js/stisla.js')}}"></script>
<script src="{{asset('stisla/assets/modules/izitoast/js/iziToast.min.js')}}"></script>


<!-- JS Libraies -->
<script src="{{asset('stisla/assets/modules/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
<script src="{{asset('stisla/assets/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>
<!-- Page Specific JS File -->

@stack("scripts")
@includeIf("_partials.izitoast")
<!-- Template JS File -->
<script src="{{asset('stisla/assets/js/scripts.js')}}"></script>
<script src="{{asset('stisla/assets/js/custom.js')}}"></script>
</body>
</html>
