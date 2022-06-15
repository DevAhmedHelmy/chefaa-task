<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Models\Pharmacy;
use Illuminate\Console\Command;
use App\Models\PharmacyProducts;
use Illuminate\Support\Facades\DB;

class ProductsSearchCheapest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:search-cheapest {product_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command that takes product id and returns cheapest 5 pharmacies';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $product_id = $this->argument('product_id');
        $data = DB::table('products')->join('pharmacy_product', 'products.id', '=', 'pharmacy_product.product_id')
            ->join('pharmacies', 'pharmacy_product.pharmacy_id', '=', 'pharmacies.id')
            ->select('pharmacies.name as pharmacy', 'pharmacy_product.price', 'products.title as product')
            ->where('products.id', $product_id)
            ->orderBy('pharmacy_product.price', 'asc')
            ->groupBy('pharmacies.id')
            ->limit(5)
            ->get();
        $pharmacies = $data->map(function ($item) {
            return [
                'pharmacy' => $item->pharmacy,
                'product' => $item->product,
                'price' => $item->price
            ];
        });
        dd($pharmacies);
    }
}
