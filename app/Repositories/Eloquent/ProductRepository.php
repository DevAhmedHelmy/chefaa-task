<?php

namespace App\Repositories\Eloquent;

use App\Models\Pharmacy;
use App\Repositories\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll()
    {
        return "getAll";
    }
    public function getPharmacies()
    {
        return  Pharmacy::all();
    }
    public function getById($id)
    {
        return "getById";
    }

    public function create($data)
    {
        return "create";
    }

    public function update($id, $data)
    {
        return "update";
    }

    public function delete($id)
    {
        return "delete";
    }

}

