<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RolesAndAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['superadmin','admin','ketua','sekretaris','koor_divisi','anggota'];
        foreach ($roles as $r) Role::firstOrCreate(['name' => $r]);

        // bikin 1 akun superadmin (ubah email/pass sesuai kamu)
        $admin = User::firstOrCreate(
            ['email' => 'himati@undiknas.ac'],
            ['name' => 'Super Admin', 'password' => Hash::make('adminhima')]
        );
        $admin->assignRole('superadmin');
    }
}
