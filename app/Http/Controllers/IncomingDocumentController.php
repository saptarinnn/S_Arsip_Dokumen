<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\IncomingDocument;
use App\Models\Storage;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage as Sto;
use Illuminate\View\View;

class IncomingDocumentController extends Controller
{
    protected $title = 'Transaksi Dokumen Masuk';

    public function index(): View
    {
        return view('app.incoming_document.index', [
            'title' => $this->title,
            'datas' => IncomingDocument::with(['category', 'storage', 'user'])->get(),
        ]);
    }

    public function create(): View
    {
        return view('app.incoming_document.create', [
            'title' => 'Tambah '.$this->title,
            'categories' => Category::all(),
            'storages' => Storage::all(),
            'users' => User::all(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        /* Validation */
        $validated = $request->validate([
            'document_code' => 'required|max:10',
            'date_in' => 'required|date',
            'category_id' => 'required',
            'storage_id' => 'required',
            'file' => 'required|file|mimes:pdf',
            'user_id' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $path = $request->file('file')->store('masuk');

            $incomingDocument = IncomingDocument::create($validated);
            $incomingDocument->update([
                'file' => $path,
            ]);
            DB::commit();

            return to_route('incoming-document.index')->with('message', 'Data berhasil ditambahkan.');
        } catch (\Exception $e) {
            throw $e;
            DB::rollBack();
        }
    }

    public function destroy(IncomingDocument $incoming_document): RedirectResponse
    {
        DB::beginTransaction();
        try {
            if (Sto::exists($incoming_document->file)) {
                Sto::delete($incoming_document->file);
            }
            $incoming_document->delete();

            DB::commit();

            return to_route('incoming-document.index')->with('message', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            throw $e;
            DB::rollBack();
        }
    }
}
