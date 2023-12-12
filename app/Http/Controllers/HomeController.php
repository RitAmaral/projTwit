<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use Illuminate\Support\Facades\DB; //database

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {        
        $users = DB::table('users')
            ->get();   
        $comentarios = DB::table('tb_comentarios')
            ->join('users', 'tb_comentarios.id', '=', 'users.id')
            ->select('tb_comentarios.*', 'users.name')
            ->get();       

        $dados = [
            'users' => $users,
            'comentarios' => $comentarios,
        ];

        return view('welcome', $dados);
    }

    public function show()
    {      
        $users = DB::table('users')
            ->get();   
        $comentarios = DB::table('tb_comentarios')
            ->join('users', 'tb_comentarios.id', '=', 'users.id')
            ->select('tb_comentarios.*', 'users.name')
            ->get();       

        $dados = [
            'users' => $users,
            'comentarios' => $comentarios,
        ];

        return view('welcome', $dados);
    }

    public function edit(string $id)
    {
        $users = DB::table('users');
        return view('edit',
            ['user'=>$users]);
    }
}
