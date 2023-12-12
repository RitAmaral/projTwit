<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    //comentario controller necessário para users criarem comentarios e para que sejam armazenados na base de dados e exibidos na pagina inicial
    public function index()
    {
        $comentarios = DB::table('tb_comentarios')
            ->get();
            return view('welcome');
    }

    public function create()
    {
        
    }

    //store comment in database
    public function store(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            $comentario = $request->input('comentario');

            //save comment in database
            Comentario::create([
                'comentario' => $comentario,
                'id' => $user->id,
            ]);
            return redirect()->route('welcome');
        } else {
            //no login made by user, redirect to login page
            return redirect()->route('login');
        }
    }

    public function destroy(string $id_comentario)
    {
        $comentario=Comentario::find($id_comentario); 
        $comentario->delete();
        return redirect() -> route('welcome');
    }
}
