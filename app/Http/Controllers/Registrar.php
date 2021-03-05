<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Illuminate\Support\Facades\Hash;
use Validator;

class Registrar extends Controller
{
    public function index(){

    	return view('registro');

    }


    public function cadastro(Request $request){

    	$regras = [

    		'nome' => 'required',
			'CPF' => 'required',
			'email' => 'required',
			'Telefone' => 'required',
			'Senha' => 'required',
			'confirmacaosenha' => 'required'
    	];

    	$mensagens = [
    		'nome.required'=>'O nome é requerido ',
			'CPF.required'=>'O CPF é requerido ',
			'email.required'=>'O email é requerido ',
			'Telefone.required'=>'O Telefone é requerido ',
			'Senha.required'=>'A Senha é requerida ',
			'confirmacaosenha.required'=>'A confirmação de senha  é requerida '

    	];


    	$request->validate($regras,$mensagens);

    	$nome = $request->input('nome');
        $CPF = $request->input('CPF');
        $email = $request->input('email');
        $Telefone = $request->input('Telefone');
        $Senha = $request->input('Senha');
        $confirmacaosenha = $request->input('confirmacaosenha');

        $user = user::where('cpf', '=', "$CPF")
                ->get();
        $juser = json_encode($user); 

        if($juser !== '[]'){   

            return redirect()->back()->with('error', 'Atenção!!! cpf existente');    

        }

        $user = user::where('email', '=', "$email")
                    ->get();

        $juser = json_encode($user); 

        if($juser !== '[]'){ 


            return redirect()->back()->with('error', 'Atenção!!! email existente'); 
            

        }

        if($Senha == $confirmacaosenha){

        	$user = new user();
        	$user->nome = $nome;
        	$user->cpf = $CPF;
        	$user->email = $email;
        	$user->telefone = $Telefone;
        	$user->senha = Hash::make($Senha); 
        	$user->save();

            return redirect('/login');

        }
    }

    public function editverificarcpf(Request $request){

        $iduser = $request->iduser;
        $cpf = $request->cpf;
        $user = user::where('cpf', '=', "$cpf")
                ->get();
        $juser = json_encode($user); 

        if($juser !== '[]' ){   

            if(intval($user[0]->id) !== intval($iduser)){

                return $user;

            }

        }        

    }

    public function editverificaremail(Request $request){

        $iduser = $request->iduser;
        $email = $request->email;
        $user = user::where('email', '=', "$email")
                ->get();
        $juser = json_encode($user); 

        if($juser !== '[]' ){   

            if(intval($user[0]->id) !== intval($iduser)){

                return $user;

            }

        }        

    }

    public function alterarcadastro(Request $request){

        $validador = Validator::make($request->all(), [

            'nome' => 'required',
            'cpf' => 'required',
            'email' => 'required'
            
        ],[

            'nome.required'=>'O nome é obrigatório ',
            'cpf.required'=>'O CPF é obrigatório ',
            'email.required'=>'O email é obrigatório '
            
        ]);

         if ($validador->fails()) {

            $erros = $validador->errors();

            return json_encode($erros, JSON_UNESCAPED_UNICODE);


            
        }else{

            $iduser = $request->iduser;
            $nome = $request->nome;
            $cpf = $request->cpf;
            $email = $request->email;
            $telefone = $request->telefone;
            $senha = $request->senha;
            $confirmSenha = $request->confirmSenha;

            $user = user::where('cpf', '=', "$cpf")
                ->get();
            $juser = json_encode($user); 

            if($juser !== '[]' && intval($user[0]->id) !== intval($iduser) ){   

                return 'cpf existente';

            }else{  

                $user = user::where('email', '=', "$email")
                    ->get();
                $juser = json_encode($user); 

                if($juser !== '[]' && intval($user[0]->id) !== intval($iduser) ){   

                    return 'email existente';

                }else{    

                    if($senha !== null && $confirmSenha !== null && $senha !== $confirmSenha){

                        return 'errorconfirmasenha';

                    }else{

                    

                        if($senha !== null && $confirmSenha !== null && $senha == $confirmSenha){                   

                             $user = user::find($iduser);

                             if (isset($user)) {

                                if($nome !== null){
                                    $user->nome = $nome;
                                }

                                if($cpf !== null){
                                    $user->cpf = $cpf;
                                }

                                if($telefone !== null){
                                    $user->telefone = $telefone;
                                }

                                if($email !== null){
                                    $user->email = $email;
                                }                
                                
                                $user->senha = Hash::make($senha); 
                                $user->save();                                    

                                return  $user;     
                            }

                             return "Erro no cadastro!"; 

                        }else{

                            $user = user::find($iduser);

                            if (isset($user)) {

                                if($nome !== null){
                                    $user->nome = $nome;
                                }

                                if($cpf !== null){
                                    $user->cpf = $cpf;
                                }

                                if($telefone !== null){
                                    $user->telefone = $telefone;
                                }

                                if($email !== null){
                                    $user->email = $email;
                                }                   
                               
                                $user->save();                                    

                                return  $user;     
                            }

                            return "Erro no cadastro!"; 

                        }  
                    }                              
                } 
            }                     

        }

    }
}
