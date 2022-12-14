<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //untuk mengosongkan tabel
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableForeignKeyConstraints();

        $data=[
            'komik', 'novel' , 'fantasy' , 'fiction', 'mystery', 'horror', 'romance', 'western'
        ];
        foreach ($data as $key => $value) {
            Category::insert([
                'name' => $value
            ]);
        }
    }
}
