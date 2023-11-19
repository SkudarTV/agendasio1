<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Group;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create(['name'=>'Admin','email'=>'admin@test.fr','role'=>Role::ADMIN]);
        \App\Models\User::factory(10)->create();

        $this->call([
            GroupSeeder::class,
            SubjectSeeder::class,
            TaskSeeder::class,
        ]);

        User::find(1)->groups()->attach(1,['role'=>Role::STUDENT]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
