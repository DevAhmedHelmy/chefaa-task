<?php
namespace App\Repositories;
interface PharmacyRepositoryInterface{
    public function getAll();

    public function getProducts();

    public function getById($id);

    public function create($data);

    public function update($id, $data);

    public function delete($id);

    public function search($request);

}
