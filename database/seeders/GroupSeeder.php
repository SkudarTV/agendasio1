<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Group::insert( [['name'=>'SIO1'],['name'=>'SIO1 Gr A'],['name'=>'SIO1 Gr B'],['name'=>'SIO1 Opt Maths'],['name'=>'SIO1 Opt Esp']]);
    }
}
