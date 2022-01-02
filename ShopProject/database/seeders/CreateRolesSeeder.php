<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'User']);

        $user = User::create([
            'name' => 'Domyslne konto',
            'email' => 'admin@admin',
            'password' => Hash::make('adminPassword'),
        ]);
        $user->assignRole('Admin');
        
        $user->save();
    }
}
