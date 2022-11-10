<?php

namespace App\Http\Controllers;

use App\Http\Requests\DashboardRequest;
use App\Models\Movimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(DashboardRequest $request)
    {
        $filters = $request->validated();

        $ano = $filters["ano"] ?? now()->format("Y");
        $mes = $filters["mes"] ?? now()->format("m");

        $debitos = DB::table('Movimento')
            ->selectRaw('YEAR(DataMovimento) AS Ano, MONTH(DataMovimento) AS Mes, SUM(Valor * -1) AS ValorDebito, 0 AS ValorCredito')
            ->where('Valor', '<', 0)
            ->groupBy(['Ano', 'Mes']);

        $creditos = DB::table('Movimento')
            ->selectRaw('YEAR(DataMovimento) AS Ano, MONTH(DataMovimento) AS Mes, 0 AS ValorDebito, SUM(Valor) AS ValorCredito')
            ->unionAll($debitos)
            ->where('Valor', '>', 0)
            ->groupBy(['Ano', 'Mes']);

        $movimentos = DB::table('Tabelas')
            ->fromSub($creditos, 'Tabelas')
            ->select('Ano', 'Mes', DB::raw('SUM(ValorCredito) AS ValorCredito, SUM(ValorDebito) AS ValorDebito'))
            ->selectRaw(
                'CASE Mes
                    WHEN 1 THEN "Janeiro"
                    WHEN 2 THEN  "Fevereiro"
                    WHEN 3 THEN  "Março"
                    WHEN 4 THEN  "Abril"
                    WHEN 5 THEN  "Maio"
                    WHEN 6 THEN  "Junho"
                    WHEN 7 THEN  "Julho"
                    WHEN 8 THEN  "Agosto"
                    WHEN 9 THEN  "Setembro"
                    WHEN 10 THEN "Outubro"
                    WHEN 11 THEN "Novembro"
                    WHEN 12 THEN "Dezembro" END AS MesExtenso'
            )
            ->groupBy(['Ano', 'Mes', 'MesExtenso'])
            ->orderBy('Ano')
            ->orderBy('Mes')
            ->get();

        $creditos = Movimento::where('Valor', '>', 0)
            ->whereYear('DataMovimento', $ano)
            ->whereMonth('DataMovimento', $mes)
            ->sum('Valor');

        $debitos = Movimento::where('Valor', '<', 0)
            ->whereYear('DataMovimento', $ano)
            ->whereMonth('DataMovimento', $mes)
            ->sum('Valor');

        $saldo = $creditos + $debitos;
        $totalizador = [
            "Credito" => $creditos,
            "Debito" => $debitos,
            "Saldo" => $saldo,
            "Movimentos" => $movimentos,
        ];

        return Inertia::render('Dashboard', [
            "Totalizador" => $totalizador,
            "Filtros" => $filters
        ]);
    }
}
