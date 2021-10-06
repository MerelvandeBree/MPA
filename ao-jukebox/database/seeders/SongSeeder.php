<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Integer;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('songs')->insert([
            'song' => Str::random(10),
            'artist' => Str::random(10),
            'length' => rand(0.01,5.00),
            'genre_id' => rand(1,5)
        ]);
    }
}
