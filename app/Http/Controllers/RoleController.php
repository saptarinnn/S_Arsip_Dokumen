<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    protected $title = 'Data Role';

    public function index(): View
    {
        return view('app.role.index', [
            'title' => $this->title,
            'datas' => Role::all(),
        ]);
    }

    public function create(): View
    {
        return view('app.role.create', [
            'title' => 'Tambah '.$this->title,
            'datas' => Permission::all(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'permission' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $role = Role::create(['name' => $request->name]);
            $role->syncPermissions($request->permission);
            DB::commit();

            return to_route('role.index')->with('message', 'Data berhasil ditambahkan.');
        } catch (\Exception $e) {
            throw $e;
            DB::rollBack();
        }
    }

    public function show(Role $role): View
    {
        return view('app.role.show', [
            'title' => 'Detail '.$this->title,
            'data' => $role,
        ]);
    }

    public function edit(Role $role): View
    {
        return view('app.role.edit', [
            'title' => 'Ubah '.$this->title,
            'role' => $role,
            'datas' => Permission::all()->toArray(),
            'role_name' => $role->permissions->pluck('name')->toArray(),
        ]);
    }

    public function update(Request $request, Role $role): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'permission' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $role->update(['name' => $request->name]);
            $role->syncPermissions($request->permission);
            DB::commit();

            return to_route('role.index')->with('message', 'Data berhasil dirubah.');
        } catch (\Exception $e) {
            throw $e;
            DB::rollBack();
        }
    }

    public function destroy(Role $role): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $role->delete();
            DB::commit();

            return to_route('role.index')->with('message', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            throw $e;
            DB::rollBack();
        }
    }
}
