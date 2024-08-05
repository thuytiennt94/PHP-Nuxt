<?php
namespace App\Repositories;

interface CrustRepositoryInterface {
    public function getAll();
    public function findById($id);
    public function create(array $data);

}
