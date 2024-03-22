<?php

namespace Database\Seeders;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin= new Role ();
        $role_admin->name = 'admin';
        $role_admin->description = "Admin User";
        $role_admin->save();

        $role_user= new Role();
        $role_user->name = 'user';
        $role_user->description= "Ord User";
        $role_user->save();

    }
}
