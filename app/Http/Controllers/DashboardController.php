<?php

namespace App\Http\Controllers;

use App\Http\Requests\DashboardRequest;
use App\Models\Movimento;
use Carbon\Carbon;
use DateTimeImmutable;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __construct(private Movimento $movimento)
    {
    }

    public function index(DashboardRequest $request)
    {
        $filters = $request->validated();

        $filtroDatas = [];
        if (isset($filters["data_inicio"]) && isset($filters["data_final"])) {
            $filtroDatas = [
                Carbon::createFromFormat('d/m/Y', $filters["data_inicio"])->format('Y-m-d'),
                Carbon::createFromFormat('d/m/Y', $filters["data_final"])->format('Y-m-d')
            ];
        } else {
            $filtroDatas =  [
                now()->format('Y-m-d'),
                now()->format('Y-m-d')
            ];
        }


        $totalizador = $this->movimento->getDashboard(
            new DateTimeImmutable($filtroDatas[0]),
            new DateTimeImmutable($filtroDatas[1])
        );

        return Inertia::render('Dashboard', [
            "Totalizador" => $totalizador,
            "Filtros" => $filters
        ]);
    }
}
