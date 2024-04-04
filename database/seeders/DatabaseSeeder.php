<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    private $permission = [
        'role-list',
        'role-create',
        'role-edit',
        'role-delete',
        'permission-list',
        'permission-create',
        'permission-edit',
        'permission-delete',
    ];

    public function run(): void
    {
        foreach ($this->permission as $permission) {
            Permission::create(['name' => $permission]);
        }

        $user = User::create([
            'username' => 'admin',
            'fullname' => 'administrator',
            'password' => Hash::make('Bontang123#'),
        ]);

        $role = Role::create(['name' => 'admin']);
        $permissions = Permission::pluck('uuid', 'uuid')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->uuid]);

    }
}
