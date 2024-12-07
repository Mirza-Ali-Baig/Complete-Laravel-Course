<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Load Data Using JSON File
        $jsonData=File::get(path: 'database/json/products.json');
        $products=json_decode($jsonData,true);

        foreach ($products as $product){
            Product::create([
                "name"=>$product['name'],
                "category"=>$product['category'],
                "price"=>$product['price'],
                "description"=>$product['description'],
                "image"=>$product['image']
            ]);
        }
    }
}
