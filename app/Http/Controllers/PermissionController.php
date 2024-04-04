<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PermissionController extends Controller
{
    protected $title = 'Data Permission';

    public function index(): View
    {
        return view('app.permission.index', [
            'title' => $this->title,
            'datas' => Permission::all(),
        ]);
    }

    public function create(): View
    {
        return view('app.permission.create', ['title' => 'Tambah '.$this->title]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(['name' => 'required|unique:'.Permission::class]);

        DB::beginTransaction();
        try {
            Permission::create($validated);
            DB::commit();

            return back()->with('message', 'Data berhasil ditambahkan.');
        } catch (\Exception $e) {
            throw $e;
            DB::rollBack();
        }
    }

    public function edit(Permission $permission): View
    {
        return view('app.permission.edit', [
            'title' => 'Ubah '.$this->title,
            'data' => $permission,
        ]);
    }

    public function update(Request $request, Permission $permission): RedirectResponse
    {
        $validated = $request->validate(['name' => 'required|unique:permissions,name,'.$permission->uuid.',uuid']);

        DB::beginTransaction();
        try {
            $permission->update($validated);
            DB::commit();

            return to_route('permission.index')->with('message', 'Data berhasil dirubah.');
        } catch (\Exception $e) {
            throw $e;
            DB::rollBack();
        }
    }

    public function destroy(Permission $permission): RedirectResponse
    {
        $roles = Role::all();
        DB::beginTransaction();
        try {
            foreach ($roles as $role) {
                $role->revokePermissionTo($permission);
            }
            $permission->delete();
            DB::commit();

            return to_route('permission.index')->with('message', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            throw $e;
            DB::rollBack();
        }
    }
}
