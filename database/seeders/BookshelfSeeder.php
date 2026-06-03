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
            [
                //key => value
                'code' => 'R002',
                'name' => 'Rak Fiksi'
            ],
            [
                //key => value
                'code' => 'R003',
                'name' => 'Rak Geografi'
            ],
            [
                //key => value
                'code' => 'R004',
                'name' => 'Rak Jaringan'
            ],
            [
                //key => value
                'code' => 'R005',
                'name' => 'Rak Perkantoran'
            ],
            [
                //key => value
                'code' => 'R006',
                'name' => 'Rak Akuntansi'
            ],
            [
                //key => value
                'code' => 'R007',
                'name' => 'Rak Geologi'
            ],
            [
                //key => value
                'code' => 'R008',
                'name' => 'Rak Ilmu Komputer'
            ],
            [
                //key => value
                'code' => 'R009',
                'name' => 'Rak Fisika'
            ],
            [
                //key => value
                'code' => 'R010',
                'name' => 'Rak Kimia'
            ],
        ]);
    }
}
