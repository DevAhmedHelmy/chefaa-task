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
        return "getAll";
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
