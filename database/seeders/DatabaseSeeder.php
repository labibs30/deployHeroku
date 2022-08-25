<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Product;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'M Labib Alfaraby',
            'username' => 'labibalfa',
            'email' => 'labibddada@gmail.com',
            'password' => bcrypt('12345')
        ]);
        // \App\Models\User::factory(10)->create();
        User::factory(1)->create();
        Product::factory(10)->create();
    }
}
