<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Pharmacy;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::factory(50000)->make([
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
        ]);
        $chunkProduct = $products->chunk(5000);
        foreach ($chunkProduct as $chunk) {
            Product::insert($chunk->toArray());
        }

        $pharmacies = Pharmacy::factory(20000)->make([
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
        ]);
        $chunkPharmacy = $pharmacies->chunk(1000);
        foreach ($chunkPharmacy as $chunk) {
            Pharmacy::insert($chunk->toArray());
        }


        Product::pluck('id')->each(function ($id) {
            $pharmacies = Pharmacy::pluck('id')->random(rand(1, 10));
            $pharmacies->each(function ($pharmacy) use ($id) {
                Pharmacy::find($pharmacy)->products()->attach([
                    $id => [
                        'price' => rand(20.5, 250.6),
                        'quantity' => rand(1, 100),
                    ],
                ]);
            });
        });


    }
}
