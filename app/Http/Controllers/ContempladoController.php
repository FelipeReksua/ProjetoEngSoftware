<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contemplado;

class ContempladoController extends Controller
{
    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function contemplar(Request $request)
    {
        $contemplado = new Contemplado([
            'data' => new \DateTime(),
            'pessoa_id' => $request->get('pessoa_id'),
            'beneficio' => $request->get('beneficio')
        ]);

        $pessoa = $contemplado->pessoa;
        $pessoa->contemplado = true;

        $contemplado->save();
        $pessoa->save();
        return redirect('/ranking')->with(
            array(
                'page' => 'Ranking'
            )
        );
    }

    public function index()
    {
        $contemplados = Contemplado::all();
        return view('ranking.contemplados')->with(
            array(
                'page' => 'Contemplados',
                'contemplados' => $contemplados
            )
        );
    }

    public function destroy($id)
    {
        $contemplado = Contemplado::find($id);
        $contemplado->delete();

        return redirect('/ranking/contemplados')->with('success', 'Cadastro deletado!');
    }
}
