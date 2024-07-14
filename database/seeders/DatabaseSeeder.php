<?php

namespace Database\Seeders;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\TokoModel;
use App\Models\User;
use Database\Factories\productFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(2)->create();

        User::create([
            'name' => 'Nikko Syafikri',
            'email' => 'nikko@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
            'name' => 'Sobri Saputra',
            'email' => 'sobri@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
            'name' => 'Satrio Bagas ',
            'email' => 'satrio@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        CategoryModel::create([
            'nama' => 'Komputer',
            'image' => 'komp.png'
        ]);
        CategoryModel::create([
            'nama' => 'Fashion',
            'image' => 'fashion.png'
        ]);
        CategoryModel::create([
            'nama' => 'Handphone',
            'image' => 'hp.png'
        ]);
        CategoryModel::create([
            'nama' => 'Peralatan Rumah',
            'image' => 'rumah.png'
        ]);
        CategoryModel::create([
            'nama' => 'Elektronik',
            'image' => 'elek.png'
        ]);

        TokoModel::create([
            'users_id' => 1,
            'nama' => 'Nikko Chan Store',
            'image' => 'undraw_profile.svg',
            'notlpn' => '082257789541',
            'desc' => 'Toko ini terpercaya karena dikelola oleh Nikko sang Buaya'
        ]);
        TokoModel::create([
            'users_id' => 2,
            'nama' => 'Sobri Botak Store',
            'image' => 'undraw_profile.svg',
            'notlpn' => '082229979283',
            'desc' => 'Menyediakan berbagai macam suplemen untuk kita'
        ]);

        ProductModel::factory(1000)->create();
    }
}
