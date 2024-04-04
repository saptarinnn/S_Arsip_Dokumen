<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OutgoingDocument;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage as Sto;
use Illuminate\View\View;

class OutgoingDocumentController extends Controller
{
    protected $title = 'Transaksi Dokumen Keluar';

    public function index(): View
    {
        return view('app.outgoing_document.index', [
            'title' => $this->title,
            'datas' => OutgoingDocument::with(['category', 'user'])->get(),
        ]);
    }

    public function create(): View
    {
        return view('app.outgoing_document.create', [
            'title' => 'Tambah '.$this->title,
            'categories' => Category::all(),
            'users' => User::all(),
            'lists' => Http::get('https://api.binderbyte.com/v1/list_courier?api_key=f584da5e67c0332e738d035482b1f709c337d93e00e2ca7eda4379806862bb5c'),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'document_code' => 'required|max:10',
            'date_out' => 'required|date',
            'category_id' => 'required',
            'file' => 'required|file|mimes:pdf',
            'user_id' => 'required',
            'expedition' => 'required',
            'receipt_number' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $path = $request->file('file')->store('keluar');

            $outgoingDocument = OutgoingDocument::create($validated);
            $outgoingDocument->update([
                'file' => $path,
            ]);
            DB::commit();

            return to_route('outgoing-document.index')->with('message', 'Data berhasil ditambahkan.');
        } catch (\Exception $e) {
            throw $e;
            DB::rollBack();
        }
    }

    public function destroy(OutgoingDocument $outgoing_document): RedirectResponse
    {
        DB::beginTransaction();
        try {
            if (Sto::exists($outgoing_document->file)) {
                Sto::delete($outgoing_document->file);
            }
            $outgoing_document->delete();

            DB::commit();

            return to_route('outgoing-document.index')->with('message', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            throw $e;
            DB::rollBack();
        }
    }
}
