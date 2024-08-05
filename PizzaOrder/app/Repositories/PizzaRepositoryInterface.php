<?php
namespace App\Repositories;

interface PizzaRepositoryInterface {
    public function getAll();
    public function findById($id);
    public function create(array $data);
}
