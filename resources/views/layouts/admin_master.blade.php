<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="description" content="Jobick : Job Admin Bootstrap 5 Template" />
	<meta property="og:title" content="Jobick : Job Admin Bootstrap 5 Template" />
	<meta property="og:description" content="Jobick : Job Admin Bootstrap 5 Template" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>@yield('title')</title>

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png" />
	<link rel="stylesheet" href="{{asset('vendor/select2/css/select2.min.css')}}">
	<link href="{{asset('vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
	<link href="{{asset('vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
	<!-- Datatable -->
    <link href="{{asset('vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
	<!-- Style css -->
	<link href="{{asset('vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
	 <!-- Toastr -->
	 <link rel="stylesheet" href="{{asset('vendor/toastr/css/toastr.min.css')}}">
	 <!-- react -->
	 <script src="{{ asset('js/app.js') }}" defer></script>
	
</head>
<body>
	@include('layouts.admin_navbar');
	@include('layouts.admin_header');
	@include('layouts.admin_sidebar');
	@yield('content');
	@include('layouts.admin_footer');

        <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('vendor/global/global.min.js')}}"></script>
	<script src="{{asset('vendor/chart.js/Chart.bundle.min.js')}}"></script>
	<script src="{{asset('vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{asset('vendor/select2/js/select2.full.min.js')}}"></script>
	<script src="{{asset('js/plugins-init/select2-init.js')}}"></script>
	
	<!-- Apex Chart -->
	<script src="{{asset('vendor/apexchart/apexchart.js')}}"></script>
	<script src="{{asset('vendor/chart.js/Chart.bundle.min.js')}}"></script>
	
	<!-- Chart piety plugin files -->
    <script src="{{asset('vendor/peity/jquery.peity.min.js')}}"></script>
	
	<!-- Dashboard 1 -->
	<script src="{{asset('js/dashboard/dashboard-1.js')}}"></script>
	
	<script src="{{asset('vendor/owl-carousel/owl.carousel.js')}}"></script>
	
    <script src="{{asset('js/custom.min.js')}}"></script>
	<script src="{{asset('js/dlabnav-init.js')}}"></script>
	
    <!-- Datatable -->
    <script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/plugins-init/datatables.init.js')}}"></script>

	 <!-- Toastr -->
	 <script src="{{asset('vendor/toastr/js/toastr.min.js')}}"></script>
	 <!-- All init script -->
	 <script src="{{asset('js/plugins-init/toastr-init.js')}}"></script>

	 <!-- update comfirm order page start -->
		
		<script>
			// function datastatus()
			// {
			// 	var id =document.getElemnentById('UnderToProcess').val;
			// 	alert(id);
			// }
			$(document).ready(function () {
				$(document).on('click', '.updateStatus', function(){
					var Comorder_Tid= $(this).closest('.status').find('.Comorder_Tid').val();
					// alert(Comorder_Tid);
					$.ajax({
						url: "{{url('admin/resturant/updatestatus')}}",
						type:'post',
						data:{
							'_token': '{{csrf_token()}}',
							'Comorder_Tid':Comorder_Tid,
						},
						datatype:'json',
						// alert(data);
						success: function(results){
							alert("Cooking Status Update");
							window.location.reload();
						},
						error: function(results){
							alert("Errors")
							window.location.reload();
						}
						
					});
					
				});
			});
		</script>
	
	 <!-- end comfirm order page -->
	
	
</body>
</html>