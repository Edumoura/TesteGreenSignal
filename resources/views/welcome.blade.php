@extends('layout.app')
@section('body')

<style type="text/css">
    p {        
        font-weight: 700;
        font-size: 1.1rem;        
        color: #fff;
    }    
</style>

<div class="container" style="background-color: #F5FFFA;margin-top: 68px;">
@if(isset($user))
@foreach($user as $u)
<input type="hidden" name="iduser" id="iduser" value="{{$u->id}}">
@endforeach 

    <div class="row">
        <div class="col-md-12">
            <h3 class="titulo"><span style="display: block;margin-top: -10px;">Informações cadastrais</span></h3>            
        </div>         
        <div class="col-md-12">
            <form  class="formulario" id="formAlterUser" style="display: none;">
                <div class="row">

@foreach($user as $u)
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Nome</label>
                            <input  type="text" style="width:250px;border: 2px solid #808080;" placeholder="Informe" id="nome" name="nome" class="form-control" value="{{$u->nome}}">         
                            <div id="invalid_nome" style="color: #FF7F50;" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">CPF</label>
                            <input  type="text" style="width:250px;border: 2px solid #808080;" placeholder="Informe" id="CPF" name="CPF" class="form-control" value="{{$u->cpf}}">         
                            <div id="invalid_CPF" style="color: #FF7F50;" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">E-mail</label>
                            <input  type="text" style="width:250px;border: 2px solid #808080;" placeholder="Informe" id="email" name="email" class="form-control" value="{{$u->email}}">         
                            <div id="invalid_email" style="color: #FF7F50;" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Telefone</label>
                            <input  type="text" style="width:250px;border: 2px solid #808080;" placeholder="Informe" id="telefone" name="telefone" class="form-control" value="{{$u->telefone}}">         
                            <div id="invalid_telefone" style="color: #FF7F50;" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Senha</label>
                            <input  type="password" style="width:250px;border: 2px solid #808080;" placeholder="Informe" id="senha" name="senha" class="form-control">         
                            <div id="invalid_senha" style="color: #FF7F50;" class="invalid-feedback"></div>
                        </div>
                    </div>
                     <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Confirmação de senha</label>
                            <input  type="password" style="width:250px;border: 2px solid #808080;" placeholder="Informe" id="confirmacaosenha" name="confirmacaosenha" class="form-control">         
                            <div id="invalid_confirmacaosenha" style="color: #FF7F50;" class="invalid-feedback"></div>
                        </div>
                    </div>
@endforeach               
                </div>  
                <div class="col-md-12">
                    <button type="button" class="btn btn-success" id="btn_Alterar">Alterar</button>                    
                </div>             
            </form>            
        </div> 
        <div class="col-md-12" id="diverrosenha" style="background-color:#FFA07A;color:#FFFAFA;padding: 5px; margin-top:5px;display: none;">
            <span id="errosenha"></span>
        </div>
        <div class="col-md-12" id="divsuccess" style="background-color:#5F9EA0;color:#FFFAFA;padding: 5px; margin-top:5px;display: none;">
            <span id="success"></span>
        </div>
        <div class="col-md-12"style=" margin-top: 15px;"> 
         <span class="subtitulo">Atualizar Cadastro</span><br>     
           <button style="margin-top: 15px;" type="button" id="btn_Atual"  class="btn btn-warning" href="">Atualizar</button>                  
        </div>              
    </div>    
       
    <div class="row" style="margin-top: 10px;">
         <div class="col-md-12">            
            <h3 class="titulo"><span style="display: block;margin-top: -10px;">Tarefas</span></h3>
         </div>
        <div class="col-md-6">
            <span class="subtitulo">Cadastrar nova tarefa</span><br>
            <a type="button" style="margin-top: 15px;" class="btn btn-primary" href="{{route('novatarefa')}}">Cadastrar</a>
            
        </div>

        <div class="col-md-12" style="margin-top: 15px;">
        <span class="subtitulo">Tabela de tarefas do Usuário </span>
            <table class="table">
                <thead style="background-color: #8FBC8F;color: #fff;font-weight: 700;">
                    <tr>
                        <th>Título</th>
                        <th>Data prevista</th>
                        <th>Status</th>
                        <th>Colaborador</th>
                        <th colspan="4">Ações</th>  
                    </tr>
                </thead>
                <tbody style="background-color: #FFF;">
                     @foreach($tarefas as $t) 

                    <tr>
                        <td data-id="{{$t->id}}" data-titulo="{{$t->titulo}}" id="tdTitulo">{{$t->titulo}}</td>
                         <td data-dt="{{$t->dt_prevista}}">{{\Carbon\Carbon::parse($t->dt_prevista)->format('d/m/Y')}}</td>                       
                        <td>
                            <select style="border: none;" id="status">
                                @foreach($status as $st)
                                @if($st->id == $t->id_status)
                                <option style="background-color: #8FBC8F;"  value="{{$st->id}}">{{$st->status_nome}}</option>
                                @endif
                                @endforeach 
                                @foreach($status as $st)
                                @if($st->id !== $t->id_status)
                                <option  value="{{$st->id}}">{{$st->status_nome}}</option>
                                @endif                                
                                @endforeach                                
                            </select> 
                        </td>
                        <td>                            
                            <select style="border: none;" id="colabo">
                                @foreach($users as $us)
                                @if($us->email == $login)
                                <option style="background-color: #8FBC8F;" value="{{$us->id}}">{{$us->nome}}</option>
                                @endif
                                @endforeach
                                @foreach($users as $us)
                                @if($us->email !== $login)
                                <option  value="{{$us->id}}">{{$us->nome}}</option>
                                @endif
                                @endforeach                                
                            </select>                           
                        </td>
                        <td data-descricao="{{$t->descricao}}">
                            <button type="button" id="btnVer" class="btn btn-info">Ver</button>
                        
                        </td>
                        <td>
                            <button type="button" id="btnEditar" class="btn btn-warning">Editar</button>
                        
                        </td>
                        <td>
                             <button type="button" id="btnRemover" class="btn btn-danger">Remover</button>
                        
                        </td>
                    </tr>
                    @endforeach                    
                </tbody>
                
            </table>           
            
        </div>
        <div class="col-md-12" id="diverroedit" style="background-color:#FFA07A;color:#FFFAFA;padding: 5px; margin-top:5px;display: none;">
          <span id="erro"></span>
        </div>
        <div class="col-md-12" id="divsuccessedit" style="background-color:#5F9EA0;color:#FFFAFA;padding: 5px; margin-top:5px;display: none;">
          <span id="successedit"></span>
        </div> 
        <div class="col-md-12" style="margin-top: 15px;">
        <span class="subtitulo">Tabela de tarefas enviadas a outro colaborador </span>
            <table class="table">
                <thead style="background-color: #8FBC8F;color: #fff;font-weight: 700;">
                    <tr>
                        <th>Título</th>
                        <th>Data prevista</th>
                        <th>Status</th>
                        <th>Colaborador</th>
                        <th colspan="4">Ações</th>
                        
                    </tr>
                </thead>
                <tbody style="background-color: #FFF;">
                   
                     @foreach($tarefasall as $t)                      
                     @if($t->id_usu_alt == $user[0]->id && $t->id_usu_alt != $t->id_usuario)
                     

                    <tr>
                        <td data-id="{{$t->id}}" id="tdTitulo">{{$t->titulo}}</td>
                         <td>{{\Carbon\Carbon::parse($t->dt_prevista)->format('d/m/Y')}}</td>                       
                        <td> @foreach($status as $st)
                             @if($st->id == $t->id_status)
                            {{$st->status_nome}}
                             @endif
                             @endforeach                           
                        </td>
                        <td>
                            @foreach($users as $us)
                            @if($us->id == $t->id_usuario)
                            {{$us->nome}}  
                            @endif
                            @endforeach                        
                                                     
                        </td>
                        <td data-descricao="{{$t->descricao}}">
                            <button type="button" id="btnVer" class="btn btn-info">Ver</button>
                        
                        </td>                        
                    </tr>
                    @endif
                    @endforeach                    
                </tbody>
                
            </table>           
            
        </div>        
    </div>  
@endif                                   
  
</div>

<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleDescri" style="display: none;">Descrição da Tarefa</h5>
         <h5 class="modal-title" id="titleEdit" style="display: none;">Editar Tarefa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="p_descri" style="display: none;"></p>
        <div class="row" id="rowEdit" style="display: none;padding: 10px;">
            <form  class="formulario">
                <input type="hidden" name="idtarefaedit" id="idtarefaedit">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Título da tarefa<span style="color: red;">*</span></label>
                        <input  type="text" style="width:250px;border: 2px solid #808080;" placeholder="Informe" id="titulo" name="titulo" class="form-control">         
                        <div id="invalid_titulo" style="color: #CD853F;" class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Data prevista para conclusão<span style="color: red;">*</span></label>
                        <input  type="date" style="width:250px;border: 2px solid #808080;" placeholder="Informe" id="dtPrev" name="dtPrev" class="form-control">         
                        <div id="invalid_dtPrev" style="color: #CD853F;" class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Descrição da tarefa<span style="color: red;">*</span></label>
                        <textarea rows="2" style="padding: 10px; background-color: #fff;width:250px;border: 2px solid #808080;" placeholder="Informe" id="descr" name="descr" class="form-control"></textarea>   
                        <div id="invalid_descr" style="color: #CD853F;" class="invalid-feedback"></div>
                    </div>
                </div> 
                <div class="col-md-12">
                    <button type="button" class="btn btn-warning" id="btn_edit">Alterar</button>                    
                </div>   
                
            </form>            
        </div>
      </div>
      <div class="modal-footer">       
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection
@section('AtualizarCadastroJs')
<script type="text/javascript">

    $('#nome').click(function(){
         $('#nome').val('');
         $('#invalid_nome').css('display', 'none'); 

    });

    $('#CPF').click(function(){

        $('#CPF').val('');
        $('#invalid_CPF').css('display', 'none'); 

    });

    $('#CPF').blur(function(){

        dados = {

              iduser : $('#iduser').val(),
              cpf: $('#CPF').val()
        }

        $.post('api/alterar/verificar/cpf', dados, function(data){ 

              //console.log(data)           

            if(data.length >= 1){

                erroordem = "Ja existe um usuário com este CPF!";
                $('#invalid_CPF').css('display', 'block');
                $('#invalid_CPF').text(erroordem);
                $('#CPF').val('');


            }

        })


    });

    $('#email').click(function(){
        
        $('#email').val('');
        $('#invalid_email').css('display', 'none');       

    });

     $('#email').blur(function(){

        dados = {

              iduser : $('#iduser').val(),
              email: $('#email').val()
        }

        $.post('api/alterar/verificar/email', dados, function(data){ 

              //console.log(data)           

            if(data.length >= 1){

                erroordem = "Ja existe um usuário com este email!";
                $('#invalid_email').css('display', 'block');
                $('#invalid_email').text(erroordem);
                $('#email').val('');
                


            }

        })


    });

     $('#telefone').click(function(){
         $('#telefone').val('');

    });

     $('#senha').click(function(){

        $('#senha').val('');
        $('#diverrosenha').css('display','none'); 
        $('#invalid_confirmacaosenha').css('display', 'none');       
        $('#invalid_senha').css('display', 'none');

    });

    $('#confirmacaosenha').click(function(){

        $('#confirmacaosenha').val('');
        $('#diverrosenha').css('display','none');
        $('#invalid_confirmacaosenha').css('display', 'none');
        $('#invalid_senha').css('display', 'none');

    });


   


    $('#btn_Atual').click(function(){

          $('#diverrosenha').css('display','none');

        if($('#formAlterUser').css('display') == 'none'){
            $('#formAlterUser').css('display','block');
        }else{
            $('#formAlterUser').css('display','none');
        }

    });

    $('#btn_Alterar').click(function(){              

        if($('#senha').val() !== '' && $('#confirmacaosenha').val() == ''){

            $('#invalid_confirmacaosenha').css('display', 'block');
            $('#invalid_confirmacaosenha').text('Não foi confimada a senha!');

        }else if($('#senha').val() == '' && $('#confirmacaosenha').val() !== ''){

            $('#invalid_senha').css('display', 'block');
            $('#invalid_senha').text('Não foi passada a senha!');

        }else{  
             $('#invalid_confirmacaosenha').css('display', 'none');
             $('#invalid_senha').css('display', 'none');

            dados = {

                iduser : $('#iduser').val(),
                nome: $('#nome').val(),
                cpf: $('#CPF').val(),
                email: $('#email').val(),
                telefone: $('#telefone').val(),
                senha: $('#senha').val(),
                confirmSenha: $('#confirmacaosenha').val()  
            }

            $.post('api/alterar/cadastro/usuario', dados, function(data){

                console.log(data); 
                if(data !== 'cpf existente' && data !== 'email existente'){



                    if(data == 'errorconfirmasenha'){

                        $('#diverrosenha').css('display','block');
                        $('#errosenha').text('Senhas difentes!');

                    }else{

                        $('#diverrosenha').css('display','none');            

                        if(data == "Erro no cadastro"){  
                                       


                        }else{  
                       

                            if(data.id){ 

                            $('#divsuccess').css('display','block');
                            $('#success').text('Dados Alterados com sucesso!'); 



                            $(function() {

                              setTimeout(function(){ 

                               window.location.replace("{{url('/')}}");

                              },1000);

                            }); 
                                             

                                

                            }else{                     

                                var jdados = JSON.parse(data);

                                if(jdados['nome'] !== undefined){
                                  erroordem = jdados['nome'][0];
                                  $('#invalid_nome').css('display', 'block');
                                  $('#invalid_nome').text(erroordem);
                                  $('#invalid_nome').addClass('is-invalid');

                                }else{

                                  $('#invalid_nome').css('display', 'none');         

                                }                    

                                if(jdados['cpf'] !== undefined){
                                  erroordem = jdados['cpf'][0];
                                  $('#invalid_CPF').css('display', 'block');
                                  $('#invalid_CPF').text(erroordem);
                                  $('#invalid_CPF').addClass('is-invalid');

                                }else{

                                  $('#invalid_CPF').css('display', 'none');         

                                }

                                if(jdados['email'] !== undefined){
                                  erroordem = jdados['email'][0];
                                  $('#invalid_email').css('display', 'block');
                                  $('#invalid_email').text(erroordem);
                                  $('#invalid_email').addClass('is-invalid');

                                }else{

                                  $('#invalid_email').css('display', 'none');         

                                }                    

                            }    

                        }

                     }   

                 }  
            });
        } 

          

    });

    $(document).on('click', '#btnVer', function(e) {

        e.preventDefault;
        var id = $(this).closest('tr').find('td[data-id]').data('id');
        var descricao = $(this).closest('tr').find('td[ data-descricao]').data('descricao');

        $('.modal').modal(); 
        $('#p_descri').css('display','block')
        $('#p_descri').text(descricao);   

        $('#rowEdit').css('display','none'); 
        $('#titleDescri').css('display','block');
        $('#titleEdit').css('display','none');   

        $('.modal-body').css('background-color','#556B2F'); 

       

    
        

     }); 

    $(document).on('click', '#btnEditar', function(e) {

        $('#p_descri').css('display','none');
        $('#rowEdit').css('display','block'); 
        $('#titleDescri').css('display','none');
        $('#titleEdit').css('display','block'); 
        $('.modal-body').css('background-color','#2F4F4F'); 
        e.preventDefault;
        var id = $(this).closest('tr').find('td[data-id]').data('id');
        var titulo = $(this).closest('tr').find('td[data-titulo]').data('titulo');
        var dt = $(this).closest('tr').find('td[data-dt]').data('dt');
        var descricao = $(this).closest('tr').find('td[ data-descricao]').data('descricao');

       $('#idtarefaedit').val(id);
       $('#titulo').val(titulo);
       $('#dtPrev').val(dt);
       $('#descr').val(descricao);
       $('.modal').modal(); 
     }); 

     $(document).on('click', '#btnRemover', function(e) {

        e.preventDefault;
        var id = $(this).closest('tr').find('td[data-id]').data('id');
        Swal.queue([{
          title: 'Excluir a tarefa!',
          confirmButtonText: 'OK',
          showCancelButton: 'Cancel',
          text:
            'Tem certeza que quer excluir a tarefa?',
          showLoaderOnConfirm: true,
          showCancelButton: true,
          preConfirm: () => {

             dado = {
                idtarefa : id
            }

            $.post('api/excluir/tarefa', dado, function(data){

                 console.log(data);
                 if(data == "Erro no cadastro"){  

                    $('#diverroedit').css('display','block');
                    $('#erro').text('Atenção!Erro no cadastro, informar para o suporte!');
                                       


                }else{  

                    $('#diverroedit').css('display','none');
                    $('#divsuccessedit').css('display','block');
                    $('#successedit').text('Tarefa excluida com sucesso!'); 

                    $(function() {

                      setTimeout(function(){ 

                       window.location.replace("{{url('/')}}");

                      },1000);

                    }); 
                                

                }

            });  
          }

        }])       

     });

     $(document).on('change', '#status', function(e) {

        e.preventDefault;
        var id = $(this).closest('tr').find('td[data-id]').data('id');          
                 iduser

        dados = {
            idtarefa : id,
            idstatus : $(this,'#status').val(),
            iduser : $('#iduser').val()
        }

        $.post('api/atualizar/status',dados, function(data){

             console.log(data);
             if(data == "Erro no cadastro"){  

                $('#diverroedit').css('display','block');
                $('#erro').text('Atenção!Erro no cadastro, informar para o suporte!');
                                   


            }else{  

                $('#diverroedit').css('display','none');
                $('#divsuccessedit').css('display','block');
                $('#successedit').text('Status alterado com sucesso!'); 

                $(function() {

                  setTimeout(function(){ 

                   window.location.replace("{{url('/')}}");

                  },1000);

                }); 
                            

            }

        })

     }); 

     $(document).on('change', '#colabo', function(e) {

        e.preventDefault;
        var id = $(this).closest('tr').find('td[data-id]').data('id');
        //alert(id  + ' ' + $(this,'#colabo').val());

         dados = {
            idtarefa : id,
            idcolabo : $(this,'#colabo').val(),
            iduser : $('#iduser').val()
        }

        $.post('api/atualizar/colaborador',dados, function(data){

           console.log(data);
             if(data == "Erro no cadastro"){  

                $('#diverroedit').css('display','block');
                $('#erro').text('Atenção!Erro no cadastro, informar para o suporte!');
                                   


            }else{  

                $('#diverroedit').css('display','none');
                $('#divsuccessedit').css('display','block');
                $('#successedit').text('Colaborador alterado com sucesso!'); 

                $(function() {

                  setTimeout(function(){ 

                   window.location.replace("{{url('/')}}");

                  },1000);

                }); 
                            

            }

        })


     });  

     $('#btn_edit').click(function(){

        dados = {

            iduser   : $('#iduser').val(),        
            idtarefa : $('#idtarefaedit').val(),
            titulo   : $('#titulo').val(),
            dtPrev   : $('#dtPrev').val(),
            descr    : $('#descr').val()

        }

        $.post('api/editar/tarefa', dados, function(data){

             console.log(data);
             $('.modal').modal('hide'); 
             if(data == "Erro no cadastro"){  

                $('#diverroedit').css('display','block');
                $('#erro').text('Atenção!Erro no cadastro, informar para o suporte!');
                                   


            }else{  

                $('#diverroedit').css('display','none');
                $('#divsuccessedit').css('display','block');
                $('#successedit').text('Dados alterados com sucesso!'); 

                $(function() {

                  setTimeout(function(){ 

                   window.location.replace("{{url('/')}}");

                  },1000);

                }); 
                            

            }

        })

     })

     
    
</script>
@endsection