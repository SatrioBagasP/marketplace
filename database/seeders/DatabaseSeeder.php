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
        User::factory(2)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
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
            'nama' => 'Toko Pertama',
            'image' => 'test',
            'notlpn' => '081336180467',
            'desc' => 'LOL'
        ]);
        TokoModel::create([
            'users_id' => 2,
            'nama' => 'Toko Ke Dua',
            'image' => 'test',
            'notlpn' => '082229979283',
            'desc' => 'LOL'
        ]);

        ProductModel::factory(1000)->create();
    }
}
