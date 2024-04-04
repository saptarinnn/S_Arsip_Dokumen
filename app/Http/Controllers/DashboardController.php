<?php

namespace App\Http\Controllers;

use App\Models\IncomingDocument;
use App\Models\OutgoingDocument;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $incomings = [];
        $outgoing = [];
        for ($i = 1; $i <= 12; $i++) {
            array_push($incomings, count(IncomingDocument::whereMonth('date_in', $i)->whereYear('date_in', date('Y'))->get()));
        }
        for ($i = 1; $i <= 12; $i++) {
            array_push($outgoing, count(OutgoingDocument::whereMonth('date_out', $i)->whereYear('date_out', date('Y'))->get()));
        }
        $labels = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
            'Oktober', 'November', 'Desember',
        ];

        return view('app.index', [
            'incomings' => $incomings,
            'outgoing' => $outgoing,
            'labels' => $labels,
            'datas' => IncomingDocument::with(['category', 'storage', 'user'])->get(),
        ]);
    }
}
