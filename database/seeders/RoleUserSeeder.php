<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1,
        ]);

        $countUsers = User::all()->count();
        $countRoles = Role::all()->count();

        for ($i = 2; $i <= $countUsers; $i++) {
            DB::table('role_user')->insert([
                'role_id' => rand(2, $countRoles),
                'user_id' => $i,
            ]);
        }
    }
}
