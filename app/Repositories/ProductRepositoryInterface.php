<?php
namespace App\Repositories;
interface ProductRepositoryInterface{

    public function getAll();
    public function getPharmacies();
    public function getById($id);

    public function create($data);

    public function update($id, $data);

    public function delete($id);
}
