<?php

namespace App\Services;
use App\Repositories\Eloquent\PharmacyRepository;
class PharmacyService
{
    protected $pharmacyRepository;

    public function __construct(PharmacyRepository $pharmacyRepository)
    {
        $this->pharmacyRepository = $pharmacyRepository;
    }
    public function getAll()
    {
        return $this->pharmacyRepository->getAll();
    }

    public function getProducts()
    {
        return $this->pharmacyRepository->getProducts();
    }

    public function getById($id)
    {
        return $this->pharmacyRepository->getById($id);
    }

    public function create($data)
    {
        return $this->pharmacyRepository->create($data);
    }

    public function update($id, $data)
    {
        return $this->pharmacyRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->pharmacyRepository->delete($id);
    }
    public function search($request)
    {
        return $this->pharmacyRepository->search($request);
    }

}
