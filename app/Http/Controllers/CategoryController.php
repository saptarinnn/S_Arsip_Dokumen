<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CategoryController extends Controller
{
    protected $title = 'Data Kategori';

    public function index(): View
    {
        return view('app.category.index', [
            'title' => $this->title,
            'datas' => Category::all(),
        ]);
    }

    public function create(): View
    {
        return view('app.category.create', [
            'title' => 'Tambah '.$this->title,
        ]);
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $validated = $request->validated();
            Category::create($validated);
            DB::commit();

            return to_route('category.index')->with('message', 'Data berhasil ditambahkan.');
        } catch (\Exception $e) {
            throw $e;
            DB::rollBack();
        }
    }

    public function edit(Category $category): View
    {
        return view('app.category.edit', [
            'title' => 'Ubah '.$this->title,
            'data' => $category,
        ]);
    }

    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $category->update($validated);
            DB::commit();

            return to_route('category.index')->with('message', 'Data berhasil dirubah.');
        } catch (\Exception $e) {
            throw $e;
            DB::rollBack();
        }
    }

    public function destroy(Category $category): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $category->delete();
            DB::commit();

            return to_route('category.index')->with('message', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            throw $e;
            DB::rollBack();
        }
    }
}
