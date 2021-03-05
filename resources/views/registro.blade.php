<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{csrf_token()}}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">  

	<link rel="stylesheet"  href="{{ asset('css/app.css')}}"> 

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>	
	<div class="container" style="margin-top: 68px;height: 370px;">
		 <div class="row" style="margin-top: 120px; padding: 10px;">
	        <div class="col-md-12">
	            <h3 class="titulo"><span style="display: block;margin-top: -10px;">Novo Registro</span></h3>
	        </div>	    
			<div class="col-md-12">
				 <form  class="formulario" method="post" action="{{route('cadastro')}}" id="formregistro" name="formregistro">
				 	 @csrf
				 	<div class="row" style="max-width: 1200px; max-height: 500px;  overflow-y: auto;">
	                    <div class="col-md-4">
	                        <div class="form-group">
	                            <label for="">Nome<span style="color: #FFA07A;">*</span></label>
	                            <input  type="text" style="width:250px;border: 2px solid #808080;" placeholder="Informe" id="nome" name="nome" class="form-control">
	                            @if($errors->has('nome'))
	                            <div id="divnome"  style="color: #FFA07A;display: block;">
	                            	{{ $errors->first('nome')}}	        	
	                            </div>  
	                            @endif	                            
	                        </div>                    
	                    </div>  
	                    <div class="col-md-4">
	                        <div class="form-group">
	                            <label for="">CPF<span style="color: #FFA07A;">*</span></label>
	                            <input  type="text" style="width:250px;border: 2px solid #808080;" placeholder="Informe" id="CPF" name="CPF" class="form-control">
	                             @if($errors->has('CPF'))
	                            <div id="divCPF" style="color: #FFA07A;display: block;">
	                            	{{ $errors->first('CPF')}}	        	
	                            </div>  
	                            @endif	                            
	                        </div>                    
	                    </div>
	                    <div class="col-md-4">
	                        <div class="form-group">
	                            <label for="">E-mail<span style="color: #FFA07A;">*</span></label>
	                            <input  type="email" style="width:250px;border: 2px solid #808080;" placeholder="Informe" id="email" name="email" class="form-control">
	                            @if($errors->has('email'))
	                            <div id="divemail" style="color: #FFA07A;display: block;">
	                            	{{ $errors->first('email')}}	        	
	                            </div>  
	                            @endif	                              
	                        </div>                    
	                    </div>
	                    <div class="col-md-4">
	                        <div class="form-group">
	                            <label for="">Telefone<span style="color: #FFA07A;">*</span></label>
	                            <input  type="text" style="width:250px;border: 2px solid #808080;" placeholder="Informe" id="Telefone" name="Telefone" class="form-control">
	                            @if($errors->has('Telefone'))
	                            <div id="divTelefone" style="color: #FFA07A;display: block;">
	                            	{{ $errors->first('Telefone')}}	        	
	                            </div>  
	                            @endif	                           
	                        </div>                    
	                    </div>   
	                    <div class="col-md-4">
	                        <div class="form-group">
	                            <label for="">Senha<span style="color: #FFA07A;">*</span></label>
	                            <input  type="password" style="width:250px;border: 2px solid #808080;" placeholder="Informe" id="Senha" name="Senha" class="form-control">
	                            @if($errors->has('Senha'))
	                            <div id="divSenha" style="color: #FFA07A;display: block;">
	                            	{{ $errors->first('Senha')}}	        	
	                            </div>  
	                            @endif	                              
	                        </div>
	                    </div>    
	                    <div class="col-md-4">     
	                        <label for="">Confirmação de senha<span style="color: #FFA07A;">*</span></label>
	                            <input  type="password" style="width:250px;border: 2px solid #808080;" placeholder="Informe" id="confirmacaosenha" name="confirmacaosenha" class="form-control">
	                             @if($errors->has('confirmacaosenha'))
	                            <div id="divconfirmacaosenha" style="color: #FFA07A;display: block;">
	                            	{{ $errors->first('confirmacaosenha')}}	        	
	                            </div>  
	                            @endif                                               
	                    </div>
	                    
				 	</div>
				 	<div class="row">
				        <div class="col-md-4" style="margin-bottom: 7px; margin-left:0px;margin-top: 10px; ">
				            <button type="submit" id="btn_registrar"  class="btn btn-info" style="margin-bottom: 7px; margin-left: 0px; ">registrar
					         </button> 				         
					         <button type="button" id="limpar" class="btn btn-warning" style="margin-bottom: 7px; margin-left: 0px; ">Limpar
					         </button>  
					         <a type="button" href="{{url('/login')}}"  class="btn btn-primary" style="margin-bottom: 7px; margin-left: 0px; ">Login
					         </a>  
				        </div>		                                              
				    </div>
				 </form>
				  @if (\Session::has('error'))
                  <div id="error" style="background-color:#FF7F50;color:#FFFAFA;padding: 5px; margin-top:5px;margin-left: 0px;display: block;">
                    <ul>
                      <li>{!! \Session::get('error') !!}</li>
                    </ul>
                  </div>

              @endif 					    			 				
			</div>				
		</div>		
	</div>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>     
     <!-- Popper JS -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>	
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	 <script type="text/javascript">

	 	$(document).ready(function(){
	 		$('#nome').attr('value', sessionStorage.getItem("nome"));
	 		$('#CPF').attr('value', sessionStorage.getItem("CPF"));
	 		$('#email').attr('value', sessionStorage.getItem("email"));
	 		$('#Telefone').attr('value', sessionStorage.getItem("Telefone"));
	 		$('#Senha').attr('value', sessionStorage.getItem("Senha"));
	 		$('#confirmacaosenha').attr('value', sessionStorage.getItem("confirmacaosenha"));

	 	});

	 	$('#nome').click(function(){

	 		$('#nome').val('');
	 		$('#divnome').css('display','none');

	 	});

	 	$('#nome').blur(function(){

	 		sessionStorage.setItem("nome", $('#nome').val());

	 	});

	 	$('#CPF').click(function(){

	 		$('#CPF').val('');
	 		$('#divCPF').css('display','none');
	 		$('#error').css('display','none');

	 	});

	 	$('#CPF').blur(function(){

	 		sessionStorage.setItem("CPF", $('#CPF').val());

	 	});

	 	$('#email').click(function(){

	 		$('#email').val('');
	 		$('#divemail').css('display','none');
	 		$('#error').css('display','none');

	 	});

	 	$('#email').blur(function(){

	 		sessionStorage.setItem("email", $('#email').val());

	 	});

	 	$('#Telefone').click(function(){

	 		$('#Telefone').val('');
	 		$('#divTelefone').css('display','none');

	 	});

	 	$('#Telefone').blur(function(){

	 		sessionStorage.setItem("Telefone", $('#Telefone').val());

	 	});

	 	$('#Senha').click(function(){

	 		$('#Senha').val('');
	 		$('#divSenha').css('display','none');

	 	});

	 	$('#Senha').blur(function(){

	 		sessionStorage.setItem("Senha", $('#Senha').val());

	 	});

	 	$('#confirmacaosenha').click(function(){

	 		$('#confirmacaosenha').val('');
	 		$('#divconfirmacaosenha').css('display','none');

	 	});

	 	$('#confirmacaosenha').blur(function(){

	 		sessionStorage.setItem("confirmacaosenha", $('#confirmacaosenha').val());

	 	});

	 	$('#limpar').click(function(){

	 		$('#nome').val('');
            $('#CPF').val('');
            $('#email').val('');
            $('#Telefone').val('');
            $('#Senha').val('');
            $('#confirmacaosenha').val('');
            $('#error').css('display','none');
            $('#divnome').css('display','none');
			$('#divCPF').css('display','none');
			$('#divemail').css('display','none');
			$('#divTelefone').css('display','none');
			$('#divSenha').css('display','none');
			$('#divconfirmacaosenha').css('display','none');
            sessionStorage.clear();

	 	});

	 	
	 	

	 	
	 	
	 </script>
	 
</body>
</html>