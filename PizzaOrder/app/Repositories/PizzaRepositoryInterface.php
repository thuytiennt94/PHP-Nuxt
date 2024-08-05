<?php
namespace App\Repositories;

interface PizzaRepositoryInterface {
    public function getAll();
    public function findById($id);
    public function create(array $data);
    public function edit ($id, array $data);
}
