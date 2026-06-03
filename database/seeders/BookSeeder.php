<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            'title' => 'Buku 1',
            'author' => 'penulis 1',
            'year' => 2025,
            'publisher' => 'Labtif',
            'city' => 'Cianjur',
            'cover' => 'kosong',
            'bookshelf_id' => 1,
        ]);

        DB::table('books')->insert([
            'title' => 'Buku 2',
            'author' => 'penulis 2',
            'year' => 2026,
            'publisher' => 'Labtif',
            'city' => 'Cianjur',
            'cover' => 'kosong',
            'bookshelf_id' => 1,
        ]);

        DB::table('books')->insert([
            'title' => 'Buku 3',
            'author' => 'penulis 3',
            'year' => 2024,
            'publisher' => 'Gramedia',
            'city' => 'Jakarta',
            'cover' => 'kosong',
            'bookshelf_id' => 1,
        ]);

        DB::table('books')->insert([
            'title' => 'Buku 4',
            'author' => 'penulis 4',
            'year' => 2023,
            'publisher' => 'Erlangga',
            'city' => 'Surabaya',
            'cover' => 'kosong',
            'bookshelf_id' => 2,
        ]);

        DB::table('books')->insert([
            'title' => 'Buku 5',
            'author' => 'penulis 5',
            'year' => 2025,
            'publisher' => 'Mizan',
            'city' => 'Bandung',
            'cover' => 'kosong',
            'bookshelf_id' => 2,
        ]);

        DB::table('books')->insert([
            'title' => 'Buku 6',
            'author' => 'penulis 6',
            'year' => 2022,
            'publisher' => 'Bentang',
            'city' => 'Yogyakarta',
            'cover' => 'kosong',
            'bookshelf_id' => 1,
        ]);

        DB::table('books')->insert([
            'title' => 'Buku 7',
            'author' => 'penulis 7',
            'year' => 2026,
            'publisher' => 'Kompas',
            'city' => 'Jakarta',
            'cover' => 'kosong',
            'bookshelf_id' => 2,
        ]);

        DB::table('books')->insert([
            'title' => 'Buku 8',
            'author' => 'penulis 8',
            'year' => 2021,
            'publisher' => 'Labtif',
            'city' => 'Cianjur',
            'cover' => 'kosong',
            'bookshelf_id' => 1,
        ]);

        DB::table('books')->insert([
            'title' => 'Buku 9',
            'author' => 'penulis 9',
            'year' => 2024,
            'publisher' => 'Gava Media',
            'city' => 'Yogyakarta',
            'cover' => 'kosong',
            'bookshelf_id' => 2,
        ]);

        DB::table('books')->insert([
            'title' => 'Buku 10',
            'author' => 'penulis 10',
            'year' => 2025,
            'publisher' => 'Penerbit Andi',
            'city' => 'Yogyakarta',
            'cover' => 'kosong',
            'bookshelf_id' => 1,
        ]);
    }
}
