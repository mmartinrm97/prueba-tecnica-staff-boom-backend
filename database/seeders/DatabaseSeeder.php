<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\Task;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::factory()->create([
            'name' => 'Administrador',
        ]);

        Role::factory()->create([
            'name' => 'Usuario',
        ]);

         \App\Models\User::factory(50)->create();

         \App\Models\User::factory()->create([
             'role_id' => '1', // 'Administrador
             'name' => 'Admin User',
             'email' => 'admin@example.com',
         ]);

        \App\Models\User::factory()->create([
            'role_id' => '2', // 'Usuario'
            'name' => 'Standard User',
            'email' => 'standard@example.com',
        ]);

         Task::factory(500)->create();
    }
}
