<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CekResiController extends Controller
{
    public $title = 'Cek Resi';

    public function index()
    {
        return view('app.resi.index', [
            'title' => $this->title,
            'lists' => Http::get('https://api.binderbyte.com/v1/list_courier?api_key=f584da5e67c0332e738d035482b1f709c337d93e00e2ca7eda4379806862bb5c'),
        ]);
        // $response = Http::get('https://api.binderbyte.com/v1/track?api_key=f584da5e67c0332e738d035482b1f709c337d93e00e2ca7eda4379806862bb5c&courier=sicepat&awb=005239792405');

        // return $response['data'];
    }

    public function show(Request $request)
    {
        $response = Http::get('https://api.binderbyte.com/v1/track?api_key=f584da5e67c0332e738d035482b1f709c337d93e00e2ca7eda4379806862bb5c&courier='.$request->expedition.'&awb='.$request->receipt_number);

        return view('app.resi.show', [
            'title' => 'Detail '.$this->title,
            'expedition' => $request->expedition,
            'receipt_number' => $request->receipt_number,
            'response' => $response,
        ]);

    }
}
