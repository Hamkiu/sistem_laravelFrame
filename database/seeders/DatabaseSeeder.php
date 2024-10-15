<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('test@example.com'),
        ]);

        DB::table('task')->insert([
            'nama_task' => 'Baharu'
        ]);

        DB::table('form')->insert([
            'nama_form' => 'Hello',
            'isi_form' => 'hhhhhhhhhahahahha hahahha',
            'gambar_form' => 'lorem.jpg',
            'id_task' => 1
        ]);

        DB::table('admins')->insert([
            ['name' => 'Admin', 'email' => 'admin@email.com', 'password' =>bcrypt('admin'), 'role' => 'admin'],
            ['name' => 'Author', 'email' => 'author@email.com', 'password' =>bcrypt('author'), 'role' => 'author'],
        ]);
    }
}
