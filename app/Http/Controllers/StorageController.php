<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorageRequest;
use App\Models\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class StorageController extends Controller
{
    protected $title = 'Data Brankas';

    public function index(): View
    {
        return view('app.storages.index', [
            'title' => $this->title,
            'datas' => Storage::all(),
        ]);
    }

    public function create(): View
    {
        return view('app.storages.create', ['title' => 'Tambah '.$this->title]);
    }

    public function store(StorageRequest $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $validated = $request->validated();
            Storage::create($validated);
            DB::commit();

            return to_route('storages.index')->with('message', 'Data berhasil ditambahkan.');
        } catch (\Exception $e) {
            throw $e;
            DB::rollBack();
        }
    }

    public function edit(Storage $storage): View
    {
        return view('app.storages.edit', [
            'title' => 'Ubah '.$this->title,
            'data' => $storage,
        ]);
    }

    public function update(StorageRequest $request, Storage $storage): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $storage->update($validated);
            DB::commit();

            return to_route('storages.index')->with('message', 'Data berhasil dirubah.');
        } catch (\Exception $e) {
            throw $e;
            DB::rollBack();
        }
    }

    public function destroy(Storage $storage): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $storage->delete();
            DB::commit();

            return to_route('storages.index')->with('message', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            throw $e;
            DB::rollBack();
        }
    }
}
