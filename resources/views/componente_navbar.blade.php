<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
  <div class="row">
    <div class="col-md-4" style="margin-right: 10px;">
      <a class="navbar-brand" href="{{url('/')}}">GreenSignal</a>
      
    </div>
     
    <div class="col-md-3">
       Usuário:<div class="dropdown">
      <a   id="dropdownMenuButton" style="color:#4F4F4F;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <u>
         <h6 style="margin-left: -10px;margin-right: 10px;"> {{$perfil = Session::get('Login') }}</h6>
      </u>
      </a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a type="button" class="btn btn-warning"  id="logout" href="{{route('logout')}}">Sair</a>             
      </div>
    </div>  
    </div>   
  </div>
  
  
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav mr-auto ">
      <li class="nav-item">
        <a class="nav-link" href="{{url('/')}}">Home</a>
      </li>

    </ul>  
  </div>
 
</nav>

@section('navJs')
<script type="text/javascript">

  $('#dropdownMenuButton').css('cursor','pointer');
  
  $('#dropdownMenuButton').mouseover(function(){

     $('#dropdownMenuButton').css('color','#6495ED'); 
  });

   $('#dropdownMenuButton').mouseout(function(){

     $('#dropdownMenuButton').css('color','#4F4F4F');   

  });

   
  
  
</script>
@endsection