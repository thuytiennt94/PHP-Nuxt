<?php
namespace App\Repositories;

use App\Models\Crust;

class CrustRepository implements CrustRepositoryInterface {
    /**
     * Summary of getAll
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll() {
        return Crust::all();
    }


    /**
     * Summary of findById
     * @param mixed $id
     * @return Crust|Crust[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function findById($id) {
        return Crust::find($id);
    }

    public function create(array $data) {
        return Crust::create($data);
    }
}
