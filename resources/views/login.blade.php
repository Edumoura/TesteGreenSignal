<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>

     <link rel="stylesheet"  href="{{ asset('css/app.css')}}">

  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<body>

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

    height: 350px;
    background: #fff;
    align-items: center
}

</style>
<div class="wrapper fadeInDown">
    <div class="row justify-content-center align-items-center">
        <div class="col-4">            
            <div class="card" style=" height: 410px;">
                <div class="card-body">                 
                    <div class="divtitulo" class="col-md-12">
                        <h3><u>Green Signal</u></h3>
                    </div>
                   
                    <div class="container-fluid">
                        <div class="formd">
                            <br>
                            <br>
                            <form method="post" action="{{route('trataLogin')}}" id="formlogin" name="formlogin">
                                @csrf
                                    <div class="form-group">
                                        <input  type="text" class="form-control" name="user" id="user" placeholder="E-mail" required value="<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];}?>" >
                                    </div>                                   
                                    <br>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Senha" required value="<?php if(isset($_COOKIE['senha'])){echo base64_decode($_COOKIE['senha']);}?>">
                                    </div>
                                    <input name="Lembrame" value="1" type="checkbox">Lembra-me
                                    <br>
									@if (\Session::has('error'))
                                        <span id="spanerro" style="background-color:#FFA07A;color:#FFFAFA;padding: 5px; margin-top:5px;">{!! \Session::get('error') !!}</span>							
									@endif 
                                    <br>                                  
                                    <button style="margin-top: 2px;" type="submit" id="sendlogin" class="btn btn-primary">Acessar</button>
                                    <br>
									<a href="{{route('recuperarLogin')}}">Esqueceu a senha</a> <br>
									<a href="{{route('registrar')}}">Registrar</a>   
                            </form>
                        </div>    
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

         sessionStorage.clear(); 

         $('#user').click(function(){
            $('#user').val('');
            $('#spanerro').css('display','none');
         });

          $('#password').click(function(){
            $('#password').val('');
            $('#spanerro').css('display','none');
         });  
  


    </script>
</body>
</html>