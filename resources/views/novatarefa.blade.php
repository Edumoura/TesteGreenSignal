@extends('layout.app')
@section('body')
<div class="container" style="margin-top: 68px;height: 370px;">
    <div class="row" style="margin-top: 120px; padding: 10px;">
        <div class="col-md-12">
            <h3 class="titulo"><span style="display: block;margin-top: -10px;">Nova Tarefa</span></h3>            
        </div>         
        <div class="col-md-12">
            <form class="formulario" id="formNovaTarefa">
                <div class="row">

                  
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Título da tarefa<span style="color: red;">*</span></label>
                            <input  type="text" style="width:250px;border: 2px solid #808080;" placeholder="Informe" id="titulo" name="titulo" class="form-control">         
                            <div id="invalid_titulo" style="color: #FF7F50;" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Data prevista para conclusão<span style="color: red;">*</span></label>
                            <input  type="date" style="width:250px;border: 2px solid #808080;" placeholder="Informe" id="dtPrev" name="dtPrev" class="form-control">         
                            <div id="invalid_dtPrev" style="color: #FF7F50;" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Dono da tarefa<span style="color: red;">*</span></label><br>
                            <select id="dono" style="width:250px;height: 40px;">
                                @if(isset($user))
                                @foreach($user as $u) 
                                @if($u->email == $login)
                                <option value="{{$u->id}}">{{$u->nome}}</option>
                                @endif
                                @endforeach 
                                @foreach($user as $u)
                                @if($u->email !== $login) 
                                <option value="{{$u->id}}">{{$u->nome}}</option>
                                @endif
                                @endforeach               
                                @endif  
                                
                            </select>                                     
                            <div id="invalid_dono" style="color: #FF7F50;" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Descrição da tarefa<span style="color: red;">*</span></label>
                            <textarea rows="2" style="padding: 10px; background-color: #fff;width:250px;border: 2px solid #808080;" placeholder="Informe" id="descr" name="descr" class="form-control"></textarea>   
                            <div id="invalid_descr" style="color: #FF7F50;" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Status da tarefa<span style="color: red;">*</span></label><br>
                            <select id="status" style="width:250px;height: 40px;">
                                @if(isset($status))
                                @foreach($status as $st) 
                                 <option value="{{$st->id}}">{{$st->status_nome}}</option>
                                @endforeach               
                                @endif  
                                
                            </select>                                     
                            <div id="invalid_status" style="color: #FF7F50;" class="invalid-feedback"></div>
                        </div>
                    </div>                           
                </div>  
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary" id="btn_salvar">Salvar</button>  
                    <a type="button" href="{{url('/')}}"  class="btn btn-primary" >Voltar
                         </a>                   
                </div>             
            </form>            
        </div> 
        <div class="col-md-12" id="diverro" style="background-color:#FFA07A;color:#FFFAFA;padding: 5px; margin-top:5px;display: none;">
            <span id="erro"></span>
        </div>
        <div class="col-md-12" id="divsuccess" style="background-color:#5F9EA0;color:#FFFAFA;padding: 5px; margin-top:5px;display: none;">
            <span id="success"></span>
        </div>                      
    </div>      
    
</div>

@endsection
@section('tarefaJs')
<script type="text/javascript">

    $('#titulo').click(function(){
        $('#titulo').val('');
        $('#invalid_titulo').css('display', 'none');
    });

    $('#dtPrev').click(function(){
        $('#dtPrev').val('');
        $('#invalid_dtPrev').css('display', 'none'); 
    });

    $('#descr').click(function(){
        $('#descr').val('');
        $('#invalid_descr').css('display', 'none');
    });

    $('#btn_salvar').click(function(){

        dados = {

            titulo: $('#titulo').val(),
            dtPrev: $('#dtPrev').val(),
            dono: $('#dono').val(),
            descr: $('#descr').val(),
            status: $('#status').val()

        }

        $.post('api/cadastrar/tarefa', dados, function(data){

            console.log(data);
            if(data == "Erro no cadastro"){ 

                $('#diverro').css('display','block');
                $('#erro').text('Atenção!Erro no cadastro, informar para o suporte!');                                  


            }else{  
           

                if(data.id){   

                $('#divsuccess').css('display','block');
                $('#success').text('Dados cadastrados com sucesso!');              



                $(function() {

                  setTimeout(function(){ 

                   window.location.replace("{{url('/')}}");

                  },1000);

                }); 
                                 

                    

                }else{                     

                    var jdados = JSON.parse(data);                    

                    if(jdados['titulo'] !== undefined){
                      erroordem = jdados['titulo'][0];
                      $('#invalid_titulo').css('display', 'block');
                      $('#invalid_titulo').text(erroordem);
                      $('#invalid_titulo').addClass('is-invalid');

                    }else{

                      $('#invalid_titulo').css('display', 'none');         

                    }

                    if(jdados['dtPrev'] !== undefined){
                      erroordem = jdados['dtPrev'][0];
                      $('#invalid_dtPrev').css('display', 'block');
                      $('#invalid_dtPrev').text(erroordem);
                      $('#invalid_dtPrev').addClass('is-invalid');

                    }else{

                      $('#invalid_dtPrev').css('display', 'none');         

                    }   

                    if(jdados['dono'] !== undefined){
                      erroordem = jdados['dono'][0];
                      $('#invalid_dono').css('display', 'block');
                      $('#invalid_dono').text(erroordem);
                      $('#invalid_dono').addClass('is-invalid');

                    }else{

                      $('#invalid_dono').css('display', 'none');         

                    } 

                    if(jdados['descr'] !== undefined){
                      erroordem = jdados['descr'][0];
                      $('#invalid_descr').css('display', 'block');
                      $('#invalid_descr').text(erroordem);
                      $('#invalid_descr').addClass('is-invalid');

                    }else{

                      $('#invalid_descr').css('display', 'none');         

                    }  

                    if(jdados['status'] !== undefined){
                      erroordem = jdados['status'][0];
                      $('#invalid_status').css('display', 'block');
                      $('#invalid_status').text(erroordem);
                      $('#invalid_status').addClass('is-invalid');

                    }else{

                      $('#invalid_status').css('display', 'none');         

                    }                    

                }    

            }

        });



    });

   
    
</script>
@endsection