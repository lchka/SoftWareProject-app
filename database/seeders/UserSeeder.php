<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'user')->first();

        // Seed admin user
        $adminEmail = "N00222003@iadt.ie";
        $existingAdmin = User::where('email', $adminEmail)->first();

        if (!$existingAdmin) {
            $admin = new User();
            $admin->name = 'Lili Hofmanova';
            $admin->email = $adminEmail;
            $admin->password = bcrypt('password');
            $admin->save();
            $admin->roles()->attach($role_admin);
        }

        // Seed regular user
        $regularEmail = "uggy@gmail.com";
        $existingUser = User::where('email', $regularEmail)->first();

        if (!$existingUser) {
            $user = new User();
            $user->name = "Ugne Sipavicuite";
            $user->email = $regularEmail;
            $user->password = bcrypt('password');
            $user->save();
            $user->roles()->attach($role_user);
        }

        // Using factory to create users with decisions
        User::factory()
            ->times(3)
            ->hasDecisions(4)
            ->create();
    }
}
