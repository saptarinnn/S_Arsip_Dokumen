<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    protected $title = 'Data Pengguna';

    public function index(): View
    {
        return view('app.user.index', [
            'title' => $this->title,
            'datas' => User::all(),
        ]);
    }

    public function create(): View
    {
        return view('app.user.create', [
            'title' => 'Tambah '.$this->title,
            'roles' => Role::all(),
        ]);
    }

    public function store(UserRequest $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $user = User::create([
                'username' => $request->username,
                'fullname' => $request->fullname,
                'password' => Hash::make($request->password),
            ]);
            $user->assignRole($request->role);
            DB::commit();

            return to_route('user.index')->with('message', 'Data berhasil ditambahkan.');
        } catch (\Exception $e) {
            throw $e;
            DB::rollBack();
        }
    }

    public function edit(User $user): View
    {
        return view('app.user.edit', [
            'title' => 'Ubah '.$this->title,
            'data' => $user,
            'roles' => Role::all(),
        ]);
    }

    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $user->update([
                'username' => $request->username,
                'fullname' => $request->fullname,
                'password' => $user->password,
            ]);
            $user->syncRoles($request->role);
            DB::commit();

            return to_route('user.index')->with('message', 'Data berhasil dirubah.');
        } catch (\Exception $e) {
            throw $e;
            DB::rollBack();
        }
    }

    public function destroy(User $user): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $user->delete();
            DB::commit();

            return to_route('user.index')->with('message', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            throw $e;
            DB::rollBack();
        }
    }
}
