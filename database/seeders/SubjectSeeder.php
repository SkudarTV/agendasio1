<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::insert([['name'=>'Bloc 1 Réseau'],['name'=>'Bloc 1 Développement'],['name'=>'Bloc 2 SISR'],['name'=>'Bloc 2 SLAM'],
            ['name'=>'Bloc 3'],['name'=>'Maths'],['name'=>'Maths option'],['name'=>'CEJM'],['name'=>'CGEF'],['name'=>'Espagnol'],['name'=>'Anglais'],]);
    }
}
