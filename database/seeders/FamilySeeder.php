<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Family;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Family::insert([
            ['nama' => 'Budi', 'jenis_kelamin' => 'Laki-laki', 'parent_id' => null],
            ['nama' => 'Dedi', 'jenis_kelamin' => 'Laki-laki', 'parent_id' => 1],
            ['nama' => 'Dodi', 'jenis_kelamin' => 'Laki-laki', 'parent_id' => 1],
            ['nama' => 'Dede', 'jenis_kelamin' => 'Laki-laki', 'parent_id' => 1],
            ['nama' => 'Dewi', 'jenis_kelamin' => 'Perempuan', 'parent_id' => 1],
            ['nama' => 'Feri', 'jenis_kelamin' => 'Laki-laki', 'parent_id' => 2],
            ['nama' => 'Farah', 'jenis_kelamin' => 'Perempuan', 'parent_id' => 2],
            ['nama' => 'Gugus', 'jenis_kelamin' => 'Laki-laki', 'parent_id' => 3],
            ['nama' => 'Gandi', 'jenis_kelamin' => 'Laki-laki', 'parent_id' => 3],
            ['nama' => 'Hani', 'jenis_kelamin' => 'Perempuan', 'parent_id' => 4],
            ['nama' => 'Hana', 'jenis_kelamin' => 'Perempuan', 'parent_id' => 4],
        ]);
    }
}
