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
        $pessoas = Pessoa::all();
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
            'first_name'=>'required',
            'last_name'=>'required'
        ]);

        $contato = new Pessoa([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'job_title' => $request->get('job_title'),
            'city' => $request->get('city'),
            'country' => $request->get('country')
        ]);
        $contato->save();
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
        $contact = Contato::find($id);
        if ($contact)
            return view('contatos.edit', compact('contact'));
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
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email:rfc,dns'
        ]);

        $contact = Contato::find($id);
        $contact->first_name =  $request->get('first_name');
        $contact->last_name = $request->get('last_name');
        $contact->email = $request->get('email');
        $contact->job_title = $request->get('job_title');
        $contact->city = $request->get('city');
        $contact->country = $request->get('country');
        $contact->save();

        return redirect('/contatos')->with(
            array(
                'page' => 'Ranking',
                'success' => 'Contato atualizado!'
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
        $contact = Contato::find($id);
        $contact->delete();

        return redirect('/contatos')->with('success', 'Contato apagado!');
    }
}
