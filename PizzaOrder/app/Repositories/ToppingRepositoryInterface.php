<?php
namespace App\Repositories;

interface ToppingRepositoryInterface {
    public function getAll();
    public function findById($id);
    public function create(array $data);

}
