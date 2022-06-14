<?php
namespace App\Repositories\Eloquent;
use App\Models\Product;
use App\Models\Pharmacy;
use Illuminate\Support\Facades\Storage;
use App\Repositories\PharmacyRepositoryInterface;

class PharmacyRepository implements PharmacyRepositoryInterface
{
    private $pharmacy;

    public function __construct(Pharmacy $pharmacy)
    {
        $this->pharmacy = $pharmacy;
    }
    public function getAll()
    {
        return $this->pharmacy->paginate();
    }
    public function getProducts()
    {
        return  Product::all();
    }
    public function getById($id)
    {
        $pharmacy = $this->pharmacy->findOrFail($id);
        $pharmacy->load('products');
        return $pharmacy;
    }

    public function create($request)
    {
        $data = $request->all();
        $req = $request->except('_token', 'prices', 'products', 'quantities');
        if (isset($_request['logo']) && $_request['logo']) {
            $req['logo'] = $this->uploadImage($data);
        }
        $pharmacy = $this->pharmacy->create($req);
        $pharmacy->products()->sync($this->customSync($data, $pharmacy->id));
        return $pharmacy;
    }
    public function update($id, $request)
    {
        $pharmacy = $this->pharmacy->findOrFail($id);
        $data = $request->all();
        $req = $request->except('_token', 'prices', 'products', 'quantities');
        if (isset($_request['logo']) && $_request['logo']) {
            Storage::delete('public/' . $pharmacy->logo);
            $req['logo'] = $this->uploadImage($data);
        }
        $pharmacy->update($req);
        $pharmacy->products()->sync($this->customSync($data, $pharmacy->id));
        return $pharmacy;
    }

    public function delete($id)
    {
        $this->pharmacy->findOrFail($id)->delete();
        return true;
    }

    public function search($request)
    {
        return $this->pharmacy->select("id", "title")->where("title", "LIKE", "%{$request->search}%")->get();
    }

    private function customSync($data, $pharmacy_id)
    {

        $customData = [];
        foreach ($data['products'] as $key => $value) {
            $customData[$value] = [
                'pharmacy_id' => $pharmacy_id,
                'product_id' => $value,
                'price' => $data['prices'][$key],
                'quantity' => $data['quantities'][$key],
            ];
        }
        return $customData;
    }

    private function uploadImage($request)
    {
        $request->file('logo')->store('public/images');
        return request()->file('logo')->hashName();
    }
}

