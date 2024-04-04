<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\IncomingDocument;
use App\Models\OutgoingDocument;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DocumentReportController extends Controller
{
    protected $title = 'Laporan Dokumen';

    public function index()
    {
        return view('app.report.index', [
            'title' => $this->title,
            'categories' => Category::all(),
        ]);
    }

    public function show(Request $request)
    {
        if ($request->document == 'masuk') {
            $pdf = PDF::loadview('app.report.result', [
                'document' => $request->document,
                'year' => $request->year,
                'datas' => IncomingDocument::with(['category', 'storage', 'user'])->whereHas('category', function (Builder $query) use ($request) {
                    $query->whereYear('date_in', $request->year)->where('category_id', $request->category);
                })->get(),
            ]);

            return $pdf->stream();

        }
        if ($request->document == 'keluar') {
            $pdf = PDF::loadview('app.report.result', [
                'document' => $request->document,
                'year' => $request->year,
                'datas' => OutgoingDocument::with(['category', 'user'])->whereHas('category', function (Builder $query) use ($request) {
                    $query->whereYear('date_out', $request->year)->where('category_id', $request->category);
                })->get(),
            ]);

            return $pdf->stream();

        }
    }
}
