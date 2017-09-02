<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
   <title>
   	@yield('title')
   </title>
   <!-- CSRF Token -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="frontend/img/favicon/favicon-144x144.html">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="frontend/img/favicon/favicon-72x72.html">
	<link rel="apple-touch-icon-precomposed" href="frontend/img/favicon/favicon-54x54.html">
	{{Html::style('bootstrap/css/bootstrap.min.css')}}
	{{Html::style('frontend/css/style.css')}}
	{{Html::style('frontend/css/responsive.css')}}
	{{Html::style('font-awesome/font-awesome.min.css')}}
	{{Html::style('frontend/css/custom-style.css')}}
	{{Html::script('frontend/js/jquery.js')}}

</head>
<body>
<div class="bg">
	<div class="container">
		@yield('content')
	</div>

<nav class="site-navigation navigation">
	<div class="container">
		
			<div class="row">
				<div class="col-sm-12">
					<div class="site-nav-inner pull-left">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				        	<span class="sr-only">Toggle navigation</span>
				        	<span class="icon-bar"></span>
				        	<span class="icon-bar"></span>
				        	<span class="icon-bar"></span>
		    			</button>
	
		    			<div class="collapse navbar-collapse navbar-responsive-collapse">
		    				<ul class="nav navbar-nav">
						   <li>
			                  <a href="#" >Home</a>								
			               </li>
			             
			                 <li>
			                  <a  href="#">Terms Of Use</a>
								
			               </li>
			                <li>
			                  <a  href="#">Privacy Policy</a>
								
			               </li>

			                  <li>
			                  <a  href="#">Contact Us</a>
								
			               </li>
	 
			            </ul>
		    			</div>
					</div>					
				</div>
			</div>
		</div>
	</nav>
</div>
{{Html::script('bootstrap/js/bootstrap.min.js')}}
{{ Html::script('js/main.js') }}
{{ Html::script('plugins/datatables/jquery.dataTables.min.js') }}
{{ Html::script('plugins/datatables/dataTables.bootstrap.min.js') }}
{{ Html::script('plugins/datepicker/bootstrap-datepicker.js') }}
{{ Html::script('plugins/timepicker/bootstrap-timepicker.min.js') }}

{{ Html::script('plugins/daterangepicker/daterangepicker.js') }}
{{--{{Html::script('frontend/js/custom.js')}}--}}
</div>
</body>
</html>