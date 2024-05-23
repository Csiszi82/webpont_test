<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('cities')->insert([
            [
                "name"      => "London",
                "latitude"  => 51.5085,
                "longitude" => -0.1257,
            ],
            [
                "name"      => "Budapest",
                "latitude"  => 47.4979937,
                "longitude" => 19.0403594,
            ],
            [
                "name" => "Szeged",
                "latitude" => 46.2546312,
                "longitude" => 20.1486016,
            ],
        ]);

    }
}
