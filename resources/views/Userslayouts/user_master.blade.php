<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
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
	 <!-- <script src="{{-- asset('js/app.js') --}}" defer></script> -->
	 <link rel="stylesheet" href="{{asset('css/custom.css')}}">
	 <!-- fountawsom -->
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css" integrity="sha512-RvQxwf+3zJuNwl4e0sZjQeX7kUa3o82bDETpgVCH2RiwYSZVDdFJ7N/woNigN/ldyOOoKw8584jM4plQdt8bhA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    @include('Userslayouts.user_navbar')
	@include('Userslayouts.user_header')
	@include('Userslayouts.user_sidebar')
	@yield('content')
	{{--@include('Userslayouts.user_footer')--}}


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
	 <script src="{{asset('vendor/jquery-steps/build/jquery.steps.min.js')}}"></script>
	 <script src="{{asset('vendor/jquery-validation/jquery.validate.min.js')}}"></script>
	 <!-- Form validate init -->
	 <script src="{{asset('js/plugins-init/jquery.validate-init.js')}}"></script>
	 <script src="{{asset('vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
     
	 <!-- Form Steps -->
	 <script src="{{asset('vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js')}}"></script>
	 <script>
		function sum() { 
            var txtFirstNumberValue = document.getElementById('txt1').value;
            var txtSecondNumberValue = document.getElementById('txt2').value;
            var result = parseInt(parseInt(txtFirstNumberValue)*parseInt(txtSecondNumberValue))/100;
            // f*a/100
			if (!isNaN(result)) {
                document.getElementById('txt3').value = result;
            }
        }
	</script>
	 <!-- start quantity -->
	 <script>
		$(document).ready(function () {

			$('.increment-btn').click(function (e) {
				e.preventDefault();
				var incre_value = $(this).parents('.quantity').find('.qty-input').val();
				var value = parseInt(incre_value, 10);
				value = isNaN(value) ? 0 : value;
				if(value<10){
					value++;
					$(this).parents('.quantity').find('.qty-input').val(value);
				}
			});
			$('.decrement-btn').click(function (e) {
				e.preventDefault();
				var decre_value = $(this).parents('.quantity').find('.qty-input').val();
				var value = parseInt(decre_value, 10);
				// var id = $(this).parents('.quantity').find('.MenuItem_Tid').val();
				// alert(id);
				value = isNaN(value) ? 0 : value;
				if(value>0){
					value--;
					$(this).parents('.quantity').find('.qty-input').val(value);
				}
			});
			
			// update quantity using ajax.
			$(document).on('click', '.updateQuantity', function(){
				var quantity= $(this).closest('.product').find('.qty-input').val();
				var MenuItem_Tid = $(this).closest('.product').find('.MenuItem_Tid').val();
				var detail = {
					'_token': '{{csrf_token()}}',
					'quantity' :quantity,
					'MenuItem_Tid':MenuItem_Tid,
				}
				$.ajax({
					url: "{{url('user/updatetoitem')}}",
					type: 'post',
					data:detail,
					success: function (response) { 
						// alert(response);
						// alert('Add Quantity');
						// window.location.reload();
						// alertify.set('notifier','position','top-right');
						// alertify.success(response.status);
					}
				});
			
			});
			// end update qty.
			// <!-- end quantity -->
		});
	 </script>
	
	<!-- <script>
		// start store temp order data. 
		$(document).ready(function () {
			$(document).on('click', '.storetemdata', function(){
				var quantity= $(this).closest('.temstore').find('.qty-input').val();
				var MenuItem_Tid = $(this).closest('.temstore').find('.MenuItem_Tid').val();
				var Category_Tid = $(this).closest('.temstore').find('.Category_Tid').val();
				var category_name = $(this).closest('.temstore').find('.category_name').val();
				var item_name = $(this).closest('.temstore').find('.item_name').val();
				var price = $(this).closest('.temstore').find('.price').val();
				var shopid= $(this).closest('.temstore').find('.shopid').val();
				var UserMobile = $(this).closest('.temstore').find('.UserMobile').val();

				// alert(category_name);
				// $.ajaxSetup({
				// 	headers: {
				// 		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				// 	}
				// });
				$.ajax({
					url: "{{url('user/store')}}",
					type:'post',
					data:{
						'_token': '{{csrf_token()}}',
						'quantity':quantity,
						'MenuItem_Tid':MenuItem_Tid,
						'Category_Tid':Category_Tid,
						'category_name':category_name,
						'item_name':item_name,
						'price':price,
						'shopid':shopid,
						'UserMobile':UserMobile
					},
					datatype:'json',
					// alert(data);
					success: function(result){
						alert("Data Save: " + result);
					},
					error: function(result){
						alert("Error")
					}
				});
				
			});
		});
		// end store temp order data. 
	</script> -->
	<!-- start tem order update qty -->
	<script>
		$(document).ready(function () {
			$(document).on('click', '.UpdateTemOrder', function(){
				var quantity= $(this).closest('.tempupdate').find('.qty-input').val();
				var UserMobile = $(this).closest('.tempupdate').find('.UserMobile').val();
				alert(UserMobile);
				$.ajax({
					url: "{{url('user/UpdateTemOrder')}}",
					type:'post',
					data:{
						'_token': '{{csrf_token()}}',
						'quantity':quantity,
						'UserMobile':UserMobile
					},
					datatype:'json',
					// alert(data);
					success: function(results){
						alert("update Save: " + results);
					},
					error: function(results){
						alert("Errors")
					}
				});
				
			});
		});
	</script>
	<!-- end tem order qty -->
</body>
</html>