<!DOCTYPE html>
<html>
<head>
	<title>Esqueceu a senha</title>

    <link rel="stylesheet"  href="{{ asset('css/app.css')}}"> 

	
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>

<style>
.card {
        
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;   
    margin-top: 100px;
    margin-bottom: auto;
    width: 400px;
    background-color: rgba(0,0,0,0.5) !important;
}

.card-body {
    width: 300px;
    height:  190px;
    background: #fff;
    align-items: center;   
   
}
</style>
<body>
<div class="wrapper fadeInDown">
    <div class="row justify-content-center align-items-center">
        <div class="col-4">            
            <div class="card" style=" height: 200px;">
                <div class="card-body">                 
                    <div class="divtitulo" class="col-md-12">
                        <h3><u>Green Signal</u></h3>
                    </div>
                   
                    <div class="container-fluid">
			 	  	 <form class="form" method="post" action="{{route('verificar')}}" id="formRecupera" name="formRecupera">
			 	  	 	 @csrf
			 	  	 	 <label>CPF</label><br>
			 	  	 	 <input type="text" name="cpf" id="cpf" placeholder="Informe seu CPF!"><br>
			 	  	 	 <button type="submit" class="btn btn-info" style="margin-top: 10px;">Enviar</button>
                         <a type="button" style="margin-top: 10px;" href="{{url('/login')}}"  class="btn btn-primary">Login
                         </a>                         	
			 	  	 	 @if (\Session::has('error'))
                            <span id="spanerro" style="background-color:#FFA07A;color:#FFFAFA;padding: 5px; margin-top:5px;display: block;">{!! \Session::get('error') !!}
                            </span>                            
                        @endif                       
						@if (\Session::has('sucess'))
                         <span id="sucess" style="background-color:#E6E6FA;color:#708090;padding: 5px; margin-top:5px;display: block;">{!! \Session::get('sucess') !!}
                         </span>		
						@endif 			 	  	 			 	  	 	
			 	  	 </form>
			 	  </div>                 
                </div>
            </div>
        </div>
    </div>
</div>


     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>     
     <!-- Popper JS -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>  
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     <script type="text/javascript">
         $('#cpf').click(function(){
            $('#cpf').val('');
            $('#spanerro').css('display','none');
            $('#sucess').css('display','none');
         });
     </script>

</body>
</html>