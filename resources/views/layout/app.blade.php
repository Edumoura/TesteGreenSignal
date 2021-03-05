<!DOCTYPE html>
<html>
<head>
	<title>Green Signal</title>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{csrf_token()}}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

	<link rel="stylesheet"  href="{{ asset('css/app.css')}}"> 

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body data-spy="scroll" data-target="collapse" data-offset="80" style="background-color: #fff">

	<div lass="container">
		@component('componente_navbar')
		@endcomponent		
		<main role="main">
			@hasSection('body')
			    @yield('body')
			@endif              
		</main>
		
	</div>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 
     <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>	
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	 @hasSection('AtualizarCadastroJs')
        @yield('AtualizarCadastroJs')
      @endif
     @hasSection('navJs')
        @yield('navJs')
     @endif 
    @hasSection('tarefaJs')
        @yield('tarefaJs')
     @endif  
	 
</body>
</html>