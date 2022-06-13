<?php

namespace App\Services;

use App\Repositories\Eloquent\ProductRepository;

class ProductService
{
    protected $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAll()
    {
        return "getAll";
    }

    public function getPharmacies()
    {
        return $this->productRepository->getPharmacies();
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
