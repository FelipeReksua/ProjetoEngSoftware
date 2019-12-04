<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoa;

class RankedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoas = Pessoa::where('contemplado', false)->get();
        return view('ranking.list')->with(
            array(
                'page' => 'Ranking',
                'pessoas' => $pessoas
            )
        );
    }

    public function cadastro()
    {
        return view('ranking.create')->with(
            array(
                'page' => 'Cadastrar pessoa'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {;
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'city' => 'required',
            'state' => 'required',
            'employee' => 'required',
            'cpf' => 'required',
            'childrens' => 'required|integer'
        ]);

        $source = array('.', ',');
        $replace = array('', '.');
        $valor = str_replace($source, $replace, $request->get('renda'));

        $pontos = 0;

        foreach (range(100000, 0, 200) as $idx => $number) {
            if ($valor <= $number && $valor >= $number - 200) {
                $pontos = $idx * 5;
                continue;
            }
        }

        if ($request->get('childrens') > 0) {
            $pontos = $pontos + $request->get('childrens') * 10;
        }

        if ($request->get('social_project') == 'Sim') {
            $pontos = $pontos + 20;
        }

        $pessoa = new Pessoa([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'city' => $request->get('city'),
            'state' => $request->get('state'),
            'employee' => $request->get('employee'),
            'job_title' => $request->get('job_title'),
            'cpf' => $request->get('cpf'),
            'pontos' => $pontos,
            'renda' => $valor,
            'phone' => $request->get('phone'),
            'childrens' => $request->get('childrens'),
            'social_project' => $request->get('social_project')
        ]);

        $pessoa->save();
        return redirect('/ranking')->with(
            array(
                'page' => 'Ranking'
            )
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pessoa = Pessoa::find($id);
        if ($pessoa)
            return view('ranking.edit', array('pessoa' => $pessoa, 'page' => 'Editar cadastro'));
        else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'city' => 'required',
            'state' => 'required',
            'employee' => 'required',
            'cpf' => 'required',
            'childrens' => 'required|integer'
        ]);

        $source = array('.', ',');
        $replace = array('', '.');
        $valor = str_replace($source, $replace, $request->get('renda'));

        $pontos = 0;

        foreach (range(100200, 0, 200) as $idx => $number) {
            if ($valor <= $number && $valor >= $number - 200) {
                $pontos = $idx * 5;
                continue;
            }
        }

        if ($request->get('childrens') > 0) {
            $pontos = $pontos + $request->get('childrens') * 10;
        }

        if ($request->get('social_project') == 'Sim') {
            $pontos = $pontos + 20;
        }

        $pessoa = Pessoa::find($id);
        $pessoa->first_name =  $request->get('first_name');
        $pessoa->last_name = $request->get('last_name');
        $pessoa->email = $request->get('email');
        $pessoa->city = $request->get('city');
        $pessoa->state = $request->get('state');
        $pessoa->employee = $request->get('employee');
        $pessoa->job_title = $request->get('job_title');
        $pessoa->cpf = $request->get('cpf');
        $pessoa->renda = $valor;
        $pessoa->pontos = $pontos;
        $pessoa->phone = $request->get('phone');
        $pessoa->childrens = $request->get('childrens');
        $pessoa->social_project = $request->get('social_project');

        $pessoa->save();

        return redirect('/ranking')->with(
            array(
                'page' => 'Ranking',
                'success' => 'Cadastro atualizado!'
            )
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pessoa = Pessoa::find($id);
        $pessoa->delete();

        return redirect('/ranking')->with('success', 'Cadastro deletado!');
    }
}
