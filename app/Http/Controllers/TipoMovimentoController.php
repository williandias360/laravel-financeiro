<?php

namespace App\Http\Controllers;

use App\Models\TipoMovimento;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TipoMovimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoMovimentos = TipoMovimento::all();
        return Inertia::render("TipoMovimento", [
            "ListaTipoMovimento" => $tipoMovimentos
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoMovimento  $tipoMovimento
     * @return \Illuminate\Http\Response
     */
    public function show(TipoMovimento $tipoMovimento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoMovimento  $tipoMovimento
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoMovimento $tipoMovimento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoMovimento  $tipoMovimento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoMovimento $tipoMovimento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoMovimento  $tipoMovimento
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoMovimento $tipoMovimento)
    {
        //
    }
}
