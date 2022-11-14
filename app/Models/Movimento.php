<?php

namespace App\Models;

use DateTimeImmutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Movimento extends Model
{
    use HasFactory;

    protected $table = "Movimento";

    protected $fillable = [
        "Descricao",
        "Valor",
        "DataMovimento"
    ];

    public function tipoMovimento()
    {
        return $this->hasOne(TipoMovimento::class);
    }

    public function getDashboard(DateTimeImmutable $dataInicio, DateTimeImmutable $dataFinal)
    {
        $filtroData = [$dataInicio, $dataFinal];

        $debitos = DB::table('Movimento')
            ->selectRaw('YEAR(DataMovimento) AS Ano, MONTH(DataMovimento) AS Mes, SUM(Valor * -1) AS ValorDebito, 0 AS ValorCredito')
            ->whereBetween('DataMovimento', $filtroData)
            ->where('Valor', '<', 0)
            ->groupBy(['Ano', 'Mes']);

        $creditos = DB::table('Movimento')
            ->selectRaw('YEAR(DataMovimento) AS Ano, MONTH(DataMovimento) AS Mes, 0 AS ValorDebito, SUM(Valor) AS ValorCredito')
            ->unionAll($debitos)
            ->whereBetween('DataMovimento', $filtroData)
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
            ->whereBetween('DataMovimento', $filtroData)
            ->sum('Valor');

        $debitos = Movimento::where('Valor', '<', 0)
            ->whereBetween('DataMovimento', $filtroData)
            ->sum('Valor');

        $saldo = $creditos + $debitos;
        return [
            "Credito" => $creditos,
            "Debito" => $debitos,
            "Saldo" => $saldo,
            "Movimentos" => $movimentos,
        ];
    }
}
