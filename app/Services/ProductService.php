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
        return $this->productRepository->getAll();
    }

    public function getPharmacies()
    {
        return $this->productRepository->getPharmacies();
    }

    public function getById($id)
    {
        return $this->productRepository->getById($id);
    }

    public function create($data)
    {
        return $this->productRepository->create($data);
    }

    public function update($id, $data)
    {
        return $this->productRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->productRepository->delete($id);
    }
    public function search($request)
    {
        return $this->productRepository->search($request);
    }
}
