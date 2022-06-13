<?php
namespace App\Repositories\Eloquent;
use App\Repositories\PharmacyRepositoryInterface;

class PharmacyRepository implements PharmacyRepositoryInterface
{
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

