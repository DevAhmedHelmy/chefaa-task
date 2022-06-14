<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Models\Pharmacy;
use Illuminate\Support\Facades\Storage;
use App\Repositories\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    public function getAll()
    {
        return $this->product->paginate();
    }
    public function getPharmacies()
    {
        return  Pharmacy::all();
    }
    public function getById($id)
    {
        $product = $this->product->findOrFail($id);
        $product->load('pharmacies');
        return $product;
    }

    public function create($request)
    {
        $data = $request->all();
        $req = $request->except('_token', 'prices', 'pharmacies', 'quantities');
        if (isset($_request['image']) && $_request['image']) {
            $req['image'] = $this->uploadImage($data);
        }
        $product = $this->product->create($req);
        $product->pharmacies()->sync($this->customSync($data, $product->id));
        return $product;
    }
    public function update($id, $request)
    {
        $product = $this->product->findOrFail($id);
        $data = $request->all();
        $req = $request->except('_token', 'prices', 'pharmacies', 'quantities');
        if (isset($_request['image']) && $_request['image']) {
            Storage::delete('public/' . $product->image);
            $req['image'] = $this->uploadImage($data);
        }
        $product->update($req);
        $product->pharmacies()->sync($this->customSync($data, $product->id));
        return $product;
    }

    public function delete($id)
    {
        $this->product->findOrFail($id)->delete();
        return true;
    }

    public function search($request)
    {
        return $this->product->select("id", "title")->where("title", "LIKE", "%{$request->search}%")->get();
    }

    private function customSync($data, $product_id)
    {
        $customData = [];
        foreach ($data['pharmacies'] as $key => $value) {
            $customData[$value] = [
                'product_id' => $product_id,
                'pharmacy_id' => $value,
                'price' => $data['prices'][$key],
                'quantity' => $data['quantities'][$key],
            ];
        }
        return $customData;
    }

    private function uploadImage($request)
    {
        $request->file('image')->store('public/images');
        return request()->file('image')->hashName();
    }
}
