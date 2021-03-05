<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
//use App\Mail\NovoAcesso;
session_start();

class AuthControler extends Controller
{
   public function index(){

   	 return view('login');

   }

   public function login(Request $request){

   	$email = $request->user;
    $senha = $request->password;
    $Lembrame = $request->Lembrame;

    
	    $user = user::where('email', '=', "$email")
	            ->get();    

	    $juser = json_encode($user);

	    if($juser == '[]'){

			return redirect()->back()->with('error', 'Usuário e/ou senha incorreto(s)!');  
		}

		$hash = $user[0]->senha;

		if (password_verify($senha, $hash)) {

			 if ($Lembrame == 1) {			 	

                $cookie_name = "email";
				$cookie_value = $email;
				setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 

				$cookie_name = "senha";
				$cookie_value = base64_encode($senha);
				setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
	            
			 	
			 }	


			 session(['Login' => $email]);
		     return redirect('/');	

		} else {

		   return redirect()->back()->with('error', 'Usuário e/ou senha incorreto(s)!'); 
		} 

		  

   }

   public function recuperarSenha(){

   	    return view('recuperar');

   }

   public function verificarusuario(Request $request){

        $cpf = $request->input('cpf');

        $user = user::where('cpf', '=', "$cpf")
            ->get(); 

        $juser = json_encode($user);

	    if($juser == '[]'){

			return redirect()->back()->with('error', 'Usuário não encontrado!');  
		}   

		$idUser = $user[0]->id;

		$seq1 = mt_rand(0, 100);
		$seq2 = mt_rand(0, 1000);
		$seq3 = mt_rand(0, 10000);
		$senhatemporaria = $seq1. $seq2 . $seq3;
		//echo $senhatemporaria;

		$useralter = user::find($idUser);
		$useralter->senha = Hash::make($senhatemporaria);
		$useralter->save();	

		$_SESSION["email"] =  $user[0]->email; 
		$data = array('senha'=>$senhatemporaria);
        Mail::send('email.acesso',$data,function($message){

       	$message->to($_SESSION["email"]);

       	$message->subject('Green Signal');

       });    

       return redirect()->back()->with('sucess', 'Favor verificar email com a senha de acesso!');


   }

}
