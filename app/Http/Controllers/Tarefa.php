<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\status;
use App\tarefas;
use Illuminate\Support\Facades\Hash;
use Validator;
use Session;
use DateTime;

class Tarefa extends Controller
{
    public function index(){

        $login = Session::get('Login');
        $user = user::all();
        $status = status::all();
    	return view('novatarefa', compact('user','login','status'));

    }

    public function cadastro(Request $request){

        $validador = Validator::make($request->all(), [

           
            'titulo' => 'required',
            'dtPrev' => 'required',
            'dono' => 'required',
            'descr' => 'required',
            'status' => 'required'
            
        ],[

           
            'titulo.required'=>'O título é obrigatório ',
            'dtPrev.required'=>'A data prevista é obrigatória ',
            'dono.required'=>'O dono é obrigatório ',
            'descr.required'=>'A descição é obrigatória ',
            'status.required'=>'O status é obrigatório '
            
        ]);

         if ($validador->fails()) {

            $erros = $validador->errors();

            return json_encode($erros, JSON_UNESCAPED_UNICODE);


            
        }else{

            $titulo = $request->titulo;
            $dtPrev = $request->dtPrev;
            $dono = $request->dono;
            $descr = $request->descr;
            $status = $request->status;

             $tarefa = new tarefas();

             if (isset($tarefa)) {

                $tarefa->titulo = $titulo;
                $tarefa->dt_prevista = $dtPrev;
                $tarefa->id_usuario = $dono;
                $tarefa->descricao = $descr;
                $tarefa->id_status = $status;               
                $tarefa->save();                                    

                return  $tarefa;     
            }

             return "Erro no cadastro!"; 

        }


    }

    public function atualizarStatus(Request $request){

        $idtarefa = $request->idtarefa;
        $idstatus = $request->idstatus;
        $iduser   = $request->iduser;
        $novadata = new DateTime();    
        $dataatual = $novadata->format('Y-m-d H:i:s');


         $tarefa =  tarefas::find($idtarefa);

         if (isset($tarefa)) {

            
            $tarefa->id_status = $idstatus; 
            $tarefa->id_usu_alt = $iduser;
            $tarefa->dt_alt = $dataatual;               
            $tarefa->save();                                    

            return  $tarefa;     
        }

         return "Erro no cadastro!";       

    }


    public function atualizarColaborador(Request $request){

        $idtarefa = $request->idtarefa;
        $idcolabo = $request->idcolabo;
        $iduser   = $request->iduser;
        $novadata = new DateTime();    
        $dataatual = $novadata->format('Y-m-d H:i:s');

        //echo $dataatual .  ' ' . $iduser;
        //exit;


         $tarefa =  tarefas::find($idtarefa);

         if (isset($tarefa)) {

            
            $tarefa->id_usuario = $idcolabo; 
            $tarefa->id_usu_alt = $iduser;
            $tarefa->dt_alt = $dataatual;               
            $tarefa->save();                                    

            return  $tarefa;     
        }

         return "Erro no cadastro!";       

    }

     public function editartarefa(Request $request){

        $idtarefa = $request->idtarefa;
        $titulo = $request->titulo;
        $dtPrev = $request->dtPrev;
        $descr = $request->descr;        
        $iduser   = $request->iduser;
        $novadata = new DateTime();    
        $dataatual = $novadata->format('Y-m-d H:i:s');

        //echo $dataatual .  ' ' . $iduser;
        //exit;


         $tarefa =  tarefas::find($idtarefa);

         if (isset($tarefa)) {

            
            $tarefa->titulo = $titulo;
            $tarefa->dt_prevista = $dtPrev; 
            $tarefa->descricao = $descr; 
            $tarefa->id_usu_alt = $iduser;
            $tarefa->dt_alt = $dataatual;               
            $tarefa->save();                                    

            return  $tarefa;     
        }

         return "Erro no cadastro!";       

    }

    public function excluirtarefa(Request $request){

        $idtarefa = $request->idtarefa;   

         $tarefa =  tarefas::find($idtarefa);

         if (isset($tarefa)) {            
                         
            $tarefa->delete();                                    

            return  $tarefa;     
        }

         return "Erro no cadastro!";       

    }


  
}
