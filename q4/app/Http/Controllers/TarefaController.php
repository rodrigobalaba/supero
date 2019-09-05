<?php
namespace App\Http\Controllers;

use App\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{

    public function index()
    {
        return Tarefa::where('active', 1)->orderBy('prior')->get();
    }

	public function store(Request $request)
    {
		$tarefa = Tarefa::find($request->id);
		if(!$tarefa)
			$tarefa = new Tarefa($request->all());
		else
			$tarefa->fill($request->all());

		$tarefa->save();

        return response()->json([
            'id' => $tarefa->id,
            'titulo' => $tarefa->titulo
        ]);
	}
}