<?php

namespace App\Http\Controllers\Admin;

use App\Artigo;
use App\Http\Requests\ArtigoStoreFormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtigosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaMigalhas = json_encode([
          ['titulo' => 'Home', 'link' => route('home')],
          ['titulo' => 'Lista Artigos']
        ]);

//        $listaArtigos = json_encode([
//           ['id' => 1, 'titulo' => 'Home', 'descricao' => 'Página Inicial', 'data' => '2018-11-12 03:40:52'],
//           ['id' => 2, 'titulo' => 'PHP', 'descricao' => 'É melhor que java', 'data' => '2018-12-18 09:15:20'],
//           ['id' => 3, 'titulo' => 'Angular', 'descricao' => 'É uma bosta', 'data' => '2017-12-31 15:02:02'],
//        ]);
        $artigos = Artigo::buscaParaTabela();
        $listaArtigos = json_encode($artigos);

        return view('admin.artigos.index',
            compact('listaMigalhas', 'listaArtigos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArtigoStoreFormRequest $request)
    {
        Artigo::create($request->all());
        return redirect()->back();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
