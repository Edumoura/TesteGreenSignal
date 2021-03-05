<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControler;
use App\Http\Controllers\Registrar;
use App\Http\Controllers\Tarefa;
use App\user;
use App\tarefas;
use App\status;
use Session;

Route::get('/', function () {

	$login = Session::get('Login');

	if ($login !== null) {

		$user = user::where('email', '=', "$login")
		        ->get();
		$users = user::all();   
		$tarefas = user::where('email', '=', "$login")
		           ->join('tarefas','users.id', '=', 'tarefas.id_usuario')
		           ->get();	

		$tarefasall = tarefas::all();	         
		$status = status::all();
        $login = Session::get('Login');    		    		

		 return view('welcome', compact('user','users','tarefas','login','status','tarefasall'));

	}else{
		  return redirect('/login');	

	}
   
});

Route::get('/logout', function (Request $request) {

	
	 Session::flush();	
     return redirect('/login');	

})->name('logout');

Route::get('/login', [AuthControler::class, 'index'])->name('login');
Route::post('/login/do', [AuthControler::class, 'login'])->name('trataLogin');
Route::get('/login/recuperar', [AuthControler::class, 'recuperarSenha'])->name('recuperarLogin');

Route::post('/recuperar/verificar', [AuthControler::class, 'verificarusuario'])->name('verificar');

Route::get('/registrar', [Registrar::class, 'index'])->name('registrar');
Route::post('/registrar/cadastrar', [Registrar::class, 'cadastro'])->name('cadastro');

Route::get('/tarefa', [Tarefa::class, 'index'])->name('novatarefa');