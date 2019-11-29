<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContempladoController extends Controller
{
    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function contemplar(Request $request)
    {
        dump('aqui');
        dump($request->get('beneficio'));
        
        die();
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
}
