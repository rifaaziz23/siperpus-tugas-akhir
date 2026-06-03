<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookshelfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //data FAKER
        DB::table('bookshelves')->insert([
            [
                //key => value
                'code' => 'R001',
                'name' => 'Rak Novel'
            ],
        ]);
    }
}
